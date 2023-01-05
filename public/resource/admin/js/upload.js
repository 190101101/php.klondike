function imageupload() {
    
    var file = _("uploadimage").files[0];
    
    var formdata = new FormData();
    
    formdata.append("uploadimage", file);
    
    var ajax = new XMLHttpRequest();
    
    ajax.upload.addEventListener("progress", progressHandler, false);
    
    ajax.open("POST", "");
    
    ajax.send(formdata);
}

function progressHandler(event) {
    
    _("uploadstatus").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    
    var percent = (event.loaded / event.total) * 100;
    
    _("progressBar").value = Math.round(percent);
}

function _(el) {
    return document.getElementById(el);
}
/*-------------------*/

function fileupload() {
    
    var file = _("uploadfile").files[0];
    
    var formdata = new FormData();
    
    formdata.append("uploadfile", file);
    
    var ajax = new XMLHttpRequest();
    
    ajax.upload.addEventListener("progress", progressHandlerfile, false);
    
    ajax.open("POST", "");
    
    ajax.send(formdata);
}

function progressHandlerfile(event) {
    
    _("uploadstatusfile").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    
    var percent = (event.loaded / event.total) * 100;
    
    _("progressBarfile").value = Math.round(percent);
}

function _(el) {
    return document.getElementById(el);
}