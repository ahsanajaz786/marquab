/*
*  Copyright (c) 2015 The WebRTC project authors. All Rights Reserved.
*
*  Use of this source code is governed by a BSD-style license
*  that can be found in the LICENSE file in the root of the source
*  tree.
*/

// This code is adapted from
// https://rawgit.com/Miguelao/demos/master/mediarecorder.html

'use strict';

/* globals MediaRecorder */

const mediaSource = new MediaSource();
mediaSource.addEventListener('sourceopen', handleSourceOpen, false);
let mediaRecorder;
let recordedBlobs;
let sourceBuffer;

const errorMsgElement = document.querySelector('span#errorMsg');
const recordedVideo = document.querySelector('video#play-video');
const recordButton = document.querySelector('button#record');
recordButton.addEventListener('click', () => {
    if (recordButton.textContent === 'Start Recording') {
        startRecording();
    } else {
        stopRecording();
        recordButton.textContent = 'Start Recording';
        playButton.disabled = false;
        playButton.classList.remove('disabled')
        downloadButton.disabled = false;
        downloadButton.classList.remove('disabled')
    }
});

const playButton = document.querySelector('button#play');
playButton.addEventListener('click', () => {
    const superBuffer = new Blob(recordedBlobs, {type: 'video/webm'});
    recordedVideo.src = null;
    recordedVideo.srcObject = null;
    recordedVideo.src = window.URL.createObjectURL(superBuffer);
    recordedVideo.controls = true;
    recordedVideo.style.display = 'inline-block';
    recordedVideo.play();
});

const downloadButton = document.querySelector('button#download');
downloadButton.addEventListener('click', () => {
    const blob = new Blob(recordedBlobs, {type: 'video/webm'});
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.style.display = 'none';
    a.href = url;
    a.download = 'test.webm';
    document.body.appendChild(a);
    a.click();
    setTimeout(() => {
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
    }, 100);
});

function handleSourceOpen(event) {
    console.log('MediaSource opened');
    sourceBuffer = mediaSource.addSourceBuffer('video/webm; codecs="vp8"');
    console.log('Source buffer: ', sourceBuffer);
}

function handleDataAvailable(event) {
    //console.log('handleDataAvailable', event);
    if (event.data && event.data.size > 0) {
        recordedBlobs.push(event.data);
    }
}

function startRecording() {
    recordedBlobs = [];
    let options = {mimeType: 'video/webm;codecs=vp9'};
    if (!MediaRecorder.isTypeSupported(options.mimeType)) {
        console.error(`${options.mimeType} is not Supported`);
        errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
        options = {mimeType: 'video/webm;codecs=vp8'};
        if (!MediaRecorder.isTypeSupported(options.mimeType)) {
            console.error(`${options.mimeType} is not Supported`);
            errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
            options = {mimeType: 'video/webm'};
            if (!MediaRecorder.isTypeSupported(options.mimeType)) {
                console.error(`${options.mimeType} is not Supported`);
                errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
                options = {mimeType: ''};
            }
        }
    }

    try {
        mediaRecorder = new MediaRecorder(window.stream, options);
    } catch (e) {
        console.error('Exception while creating MediaRecorder:', e);
        errorMsgElement.innerHTML = `Exception while creating MediaRecorder: ${JSON.stringify(e)}`;
        return;
    }

    console.log('Created MediaRecorder', mediaRecorder, 'with options', options);
    recordButton.textContent = 'Stop Recording';
    playButton.disabled = true;
    playButton.classList.add('disabled')
    downloadButton.disabled = true;
    downloadButton.classList.add('disabled')
    mediaRecorder.onstop = (event) => {
    };
    mediaRecorder.ondataavailable = handleDataAvailable;
    mediaRecorder.start(10); // collect 10ms of data
}

function stopRecording() {
    mediaRecorder.stop();
}

function handleSuccess(stream) {
    recordButton.disabled = false;
    recordButton.classList.remove('disabled')
    console.log('getUserMedia() got stream:', stream);
    window.stream = stream;

    const gumVideo = document.querySelector('video#video-recorder');
    gumVideo.srcObject = stream;
}

function stopCamera(){
    stopStreamedVideo(document.querySelector('video#video-recorder'));
    //stopRecording()
}

function stopStreamedVideo(videoElem) {
    let stream = videoElem.srcObject;
    let tracks = stream.getTracks();
    tracks.forEach(function(track) {
        track.stop();
    });
    videoElem.srcObject = null;
    document.querySelector('button#stop').style.display = 'none';
    document.querySelector('button#start').style.display = 'inline-block';
    document.querySelector('#video-recorder-wrapper').style.display = 'none';
}

async function init(constraints) {
    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        document.querySelector('video#video-recorder').style.display = 'inline-block';
        document.querySelector('button#stop').style.display = 'inline-block';
        document.querySelector('button#start').style.display = 'none';
        errorMsgElement.innerHTML = ''
        handleSuccess(stream);
    } catch (e) {
        console.error('navigator.getUserMedia error:', e);
        if(e.toString() == 'NotAllowedError: Permission denied')
            errorMsgElement.innerHTML = `Permission denied. Please allow permission for camera and microphone.`;
        else
            errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
    }
}

document.querySelector('button#start').addEventListener('click', async () => {
    const hasEchoCancellation = true //document.querySelector('#echoCancellation').checked;
    const constraints = {
        audio: {
            echoCancellation: {exact: hasEchoCancellation}
        },
        video: {
            width: 1280, height: 720
        }
    };
    console.log('Using media constraints:', constraints);
    await init(constraints);
    document.querySelector('#video-recorder-wrapper').style.display = 'inline-block';
});
