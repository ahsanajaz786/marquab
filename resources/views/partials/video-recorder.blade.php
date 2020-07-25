<div id="webrtc-recorder">

    <div class="row">
        <div class="col-md-6" id="video-recorder-wrapper"><video id="video-recorder" style="display: none;" playsinline autoplay muted></video></div>
        <div class="col-md-6" id="play-video-wrapper"><video id="play-video" style="display: none;" controls></video></div>
    </div>

    <div>
        <button type="button" class="btn btn-primary" id="start">Start Camera</button>
        <button type="button" class="btn btn-primary" id="stop" style="display: none" onclick="stopCamera()">Stop Camera</button>
        <button type="button" class="btn btn-primary" id="record" disabled>Start Recording</button>
        <button type="button" class="btn btn-primary" id="play" disabled>Play</button>
        <button type="button" class="btn btn-success" id="download" disabled>Download</button>
    </div>

    <div>
        <span id="errorMsg"></span>
    </div>

</div>
