function fileDragHandler(fileDrag, fileSelect, messageBody, selectVariable, limit = 5) {


    fileSelect.addEventListener('change', fileSelectHandler, false);
    fileDrag.addEventListener('dragover', fileDragHover, false);
    fileDrag.addEventListener('dragleave', fileDragHover, false);
    fileDrag.addEventListener('drop', fileSelectHandler, false);


    function fileDragHover(e) {

        e.stopPropagation();
        e.preventDefault();

        fileDrag.className = (e.type === 'dragover' ? 'hover' : 'file-upload');
    }

    function fileSelectHandler(e) {
        // Fetch FileList object
        var files = e.target.files || e.dataTransfer.files;

        // Cancel event and hover styling
        fileDragHover(e);

        if (files.length) {
            parseFile(files[0]);
            uploadFile(files[0]);
        }

        // if multiple files
        // for (var i = 0, f; f = files[i]; i++) {
        // }
    }

    function output(msg) {
        messageBody.innerHTML = msg;
    }

    function parseFile(file) {
        output(
            '<ul>'
            + '<li>Name: <strong>' + encodeURI(file.name) + '</strong></li>'
            + '<li>Type: <strong>' + file.type + '</strong></li>'
            + '<li>Size: <strong>' + (file.size / (1024 * 1024)).toFixed(2) + ' MB</strong></li>'
            + '</ul>'
        );
    }

    function uploadFile(file) {

        var fileSizeLimit = 1024 * 1024 * limit;

        if (file.size <= fileSizeLimit) {
            window[selectVariable] = file
        } else {
            output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
        }
    }

}
