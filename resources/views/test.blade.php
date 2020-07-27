@extends('layouts.app')
@section('head')

@endsection
@section('content')
    <form id="file-upload-form">
        <input id="file-upload" type="file" name="fileUpload"/>
        <label for="file-upload" id="file-drag">
            Select a file to upload
            <br/>OR
            <br/>Drag a file into this box

            <br/><br/><span id="file-upload-btn" class="button">Add a file</span>
        </label>

        <output for="file-upload" id="messages"></output>
    </form>
    <form id="file-upload-form-2">
        <input id="file-upload-2" type="file" name="fileUpload"/>
        <label for="file-upload-2" id="file-drag-2">
            Select a file to upload
            <br/>OR
            <br/>Drag a file into this box

            <br/><br/><span id="file-upload-btn-2" class="button">Add a file</span>
        </label>

        <output for="file-upload-2" id="messages-2"></output>
    </form>
    <button onclick="showFiles()">abcd</button>
@endsection
@section('footer')
    <script src="{{asset('js/jquery2.3.2.min.js')}}"></script>
    <script src="{{asset('js/drag-and-drop.js')}}"></script>
    <script>

        var selectedProfile = {} // global selected files
        var selectedVideos = {} // global selected files

        var fileSelect = document.getElementById('file-upload'),
            fileDrag = document.getElementById('file-drag'),
            messageBody = document.getElementById('messages'),
            limit = 10

        var fileSelect2 = document.getElementById('file-upload-2'),
            fileDrag2 = document.getElementById('file-drag-2'),
            messageBody2 = document.getElementById('messages-2')

        fileDragHandler(fileDrag, fileSelect, messageBody, "selectedProfile", limit)
        fileDragHandler(fileDrag2, fileSelect2, messageBody2, "selectedVideos", limit)

        function showFiles(){
            console.log(selectedProfile)
            console.log(selectedVideos)
        }


    </script>
    <style>
        body {
            font-family: sans-serif;
        }

        .button {
            background: #005f95;
            border: none;
            border-radius: 3px;
            color: white;
            display: inline-block;
            font-size: 19px;
            font-weight: bolder;
            letter-spacing: 0.02em;
            padding: 10px 20px;
            text-align: center;
            text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.75);
            text-decoration: none;
            text-transform: uppercase;
            transition: all 0.2s;
        }

        .btn:hover {
            background: #4499c9;
        }

        .btn:active {
            background: #49ADE5;
        }

        input[type="file"] {
            display: none;
        }

        #file-drag, #file-drag-2  {
            border: 2px dashed #555;
            border-radius: 7px;
            color: #555;
            cursor: pointer;
            display: block;
            font-weight: bold;
            margin: 1em 0;
            padding: 3em;
            text-align: center;
            transition: background 0.3s, color 0.3s;
        }

        #file-drag:hover, #file-drag-2:hover {
            background: #ddd;
        }

        #file-drag:hover,
        #file-drag.hover,
        #file-drag-2:hover,
        #file-drag-2.hover{
            border-color: #3070A5;
            border-style: solid;
            box-shadow: inset 0 3px 4px #888;
            color: #3070A5;
        }

        #file-upload-btn,#file-upload-btn-2 {
            margin: auto;
        }

        #file-upload-btn:hover,#file-upload-btn-2:hover {
            background: #4499c9;
        }

        #file-upload-form,#file-upload-form-2 {
            margin: auto;
            width: 40%;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
    </style>
@endsection
