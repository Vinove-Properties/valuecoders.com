let fdropArea = document.getElementById("drop-area");
function fpreventDefaults(e){
    e.preventDefault(), e.stopPropagation();
}
function fhighlight(e){
    fdropArea.classList.add("highlight");
}
function funhighlight(e){
    fdropArea.classList.remove("active");
}
function fhandleDrop(e){
    fhandleFiles(e.dataTransfer.files);
}
["dragenter", "dragover", "dragleave", "drop"].forEach((e) => {
    fdropArea.addEventListener(e, fpreventDefaults, !1), document.body.addEventListener(e, fpreventDefaults, !1);
}),
["dragenter", "dragover"].forEach((e) => {
    fdropArea.addEventListener(e, fhighlight, !1);
}),
["dragleave", "drop"].forEach((e) => {
    fdropArea.addEventListener(e, funhighlight, !1);
}),
fdropArea.addEventListener("drop", fhandleDrop, !1);

function fsetFileError(e){
    let t = document.getElementById("ffile-type-error");
    (t.innerHTML = e),
    setTimeout(function(){
        t.innerHTML = "";
    }, 3e3);
}

function fhandleFiles(e, t){
    console.log(e);
    fsetFileError("");
    let a = document.getElementById("fuplcounter");
    if (parseInt(a.value) >= 10) return void fsetFileError("You can not upload more then 10 media files.");
    let n = e.length + parseInt(a.value);
    if (parseInt(n) > 10) return void fsetFileError("You can not upload more then 10 media files.");
    let o = document.getElementById("fUploadedfilename").value;
    if(o){
        if (o.split(",").length > 10) return void fsetFileError("You can not upload more then 10 media files.");
    }
    if( e.length > 10 ){
        fsetFileError("You can not upload more then 10 media files.")
    }else{
        e = [...e];
        e.forEach(fuploadFile);
    }    
}

function fremoveMe(e, t) {
    let a = document.getElementById("fuplcounter");
    fsetFileError("");
    const n = new XMLHttpRequest();
    n.open("GET", pxlObj.web_url+"/delete_file.php?delete=1&imageName=" + t, !0),
        (n.onreadystatechange = function () {
            if (4 == this.readyState && 200 == this.status) {
                let o = parseInt(a.value);
                o--, (a.value = o);
                var n = document.getElementById("fUploadedfilename").value;
                (newStr = n.replace(t, "")),
                    (document.getElementById("fUploadedfilename").value = newStr),
                    console.log(this.responseText),
                    e.parentNode.remove(),
                    0 == a.value && document.getElementById("fgloader").classList.remove("show-me");
            }
        }),
        n.send();
}

function fuploadFile(e, t) {
    fsetFileError("");
    let a = document.getElementById("fuplcounter");
    if (parseInt(a.value) >= 10) return void fsetFileError("You can not upload more then 10 media files.");
    let n = document.getElementById("fgloader");
    n.classList.add("show-me"), n.classList.add("active");
    if (e.size / 1024 / 1024 > 20) return fsetFileError("ERROR Uploaded document exceeds the maximum size limit of 20 MB"), void n.classList.remove("active");
    var o = new FormData();
    o.append("file", e);
    var r = new XMLHttpRequest();
    r.open("POST", pxlObj.web_url+"/file-uploader.php", !0),
    (r.onload = function (t) {
        if (200 == r.status) {
            let t = JSON.parse(r.responseText);
            if ((console.log(t), 1 == t.status)) {
                let n = parseInt(a.value);
                n++, (a.value = n);
                let o = document.getElementById("fUploadedfilename").value;
                document.getElementById("fUploadedfilename").value = "" == o ? t.file : o + t.file;
                let r = new FileReader();
                r.readAsDataURL(e),
                (r.onloadend = function () {
                    let a = document.createElement("div"),
                        n = "";
                    switch ((console.log(e.type), e.type)) {
                        case "application/pdf":
                            n = pxlObj.tpl_url+"/dev-img/pdf_gy.png";
                            break;
                        case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                        case "text/plain":
                            n = pxlObj.tpl_url+"/dev-img/doc_gy.png";
                            break;
                        case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
                        case "application/vnd.ms-excel":
                            n = pxlObj.tpl_url+"/dev-img/xls_gy.png";
                            break;
                        case "image/vnd.adobe.photoshop":
                            n = pxlObj.tpl_url+"/dev-img/psd_gy.png";
                            break;
                        case "application/x-zip-compressed":
                        case "application/zip":
                            n = pxlObj.tpl_url+"/dev-img/zip_gy.png";
                            break;
                        default:
                            n = pxlObj.tpl_url+"/dev-img/def-thumb.png";
                    }
                    e.size > 1e7 && "image/jpeg" == e.type
                    ? (n = pxlObj.tpl_url+"/dev-img/jpg_gy.png")
                    : e.size > 1e7 && "image/png" == e.type && (n = pxlObj.tpl_url+"/dev-img/png_gy.png"),
                    (a.innerHTML = '<img src="' + n + '" height="55" width="55"><button type="button" onclick="return fremoveMe(this,this.value);" value="' + t.file + '">X</button></span>'),
                    document.getElementById("fgallery").appendChild(a);
                });
            } else fsetFileError(t.message);
        } else console.log("error");
        n.classList.remove("active");
    }),
    r.send(o);
}



/*Footer Form Validation*/
/*
let fudropArea = document.getElementById("fu-drop");
function fupreventDefaults(e){
    e.preventDefault(), e.stopPropagation();
}
function fuhighlight(e){
    fudropArea.classList.add("highlight");
}
function fuunhighlight(e){
    fudropArea.classList.remove("active");
}
function fhandleDrop(e){
    fuhandleFiles(e.dataTransfer.files);
}
["dragenter", "dragover", "dragleave", "drop"].forEach((e) => {
    fudropArea.addEventListener(e, fupreventDefaults, !1), document.body.addEventListener(e, fupreventDefaults, !1);
}),
["dragenter", "dragover"].forEach((e) => {
    fudropArea.addEventListener(e, fuhighlight, !1);
}),
["dragleave", "drop"].forEach((e) => {
    fudropArea.addEventListener(e, fuunhighlight, !1);
}),
fudropArea.addEventListener("drop", fhandleDrop, !1);

function fusetFileError(e){
    let t = document.getElementById("fufile-type-error");
    (t.innerHTML = e),
    setTimeout(function(){
        t.innerHTML = "";
    }, 3e3);
}

function fuhandleFiles(e, t){
    console.log(e);
    fusetFileError("");
    let a = document.getElementById("fuuplcounter");
    if (parseInt(a.value) >= 10) return void fsetFileError("You can not upload more then 10 media files.");
    let n = e.length + parseInt(a.value);
    if (parseInt(n) > 10) return void fsetFileError("You can not upload more then 10 media files.");
    let o = document.getElementById("fuUploadedfilename").value;
    if(o){
        if (o.split(",").length > 10) return void fusetFileError("You can not upload more then 10 media files.");
    }
    if( e.length > 10 ){
        fusetFileError("You can not upload more then 10 media files.")
    }else{
        e = [...e];
        e.forEach(fuuploadFile);
    }    
}

function furemoveMe(e, t) {
    let a = document.getElementById("fuuplcounter");
    fsetFileError("");
    const n = new XMLHttpRequest();
    n.open("GET", pxlObj.web_url+"/delete_file.php?delete=1&imageName=" + t, !0),
        (n.onreadystatechange = function () {
            if (4 == this.readyState && 200 == this.status) {
                let o = parseInt(a.value);
                o--, (a.value = o);
                var n = document.getElementById("fuUploadedfilename").value;
                (newStr = n.replace(t, "")),
                    (document.getElementById("fuUploadedfilename").value = newStr),
                    console.log(this.responseText),
                    e.parentNode.remove(),
                    0 == a.value && document.getElementById("fugloader").classList.remove("show-me");
            }
        }),
        n.send();
}

function fuuploadFile(e, t){
    fusetFileError("");
    let a = document.getElementById("fuuplcounter");
    if (parseInt(a.value) >= 10) return void fusetFileError("You can not upload more then 10 media files.");
    let n = document.getElementById("fugloader");
    n.classList.add("show-me"), n.classList.add("active");
    if (e.size / 1024 / 1024 > 20) return fusetFileError("ERROR Uploaded document exceeds the maximum size limit of 20 MB"), void n.classList.remove("active");
    var o = new FormData();
    o.append("file", e);
    var r = new XMLHttpRequest();
    r.open("POST", pxlObj.web_url+"/file-uploader.php", !0),
    (r.onload = function (t) {
        if (200 == r.status) {
            let t = JSON.parse(r.responseText);
            if ((console.log(t), 1 == t.status)) {
                let n = parseInt(a.value);
                n++, (a.value = n);
                let o = document.getElementById("fuUploadedfilename").value;
                document.getElementById("fuUploadedfilename").value = "" == o ? t.file : o + t.file;
                let r = new FileReader();
                r.readAsDataURL(e),
                (r.onloadend = function () {
                    let a = document.createElement("div"),
                        n = "";
                    switch ((console.log(e.type), e.type)) {
                        case "application/pdf":
                            n = pxlObj.tpl_url+"/dev-img/pdf_gy.png";
                            break;
                        case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                        case "text/plain":
                            n = pxlObj.tpl_url+"/dev-img/doc_gy.png";
                            break;
                        case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
                        case "application/vnd.ms-excel":
                            n = pxlObj.tpl_url+"/dev-img/xls_gy.png";
                            break;
                        case "image/vnd.adobe.photoshop":
                            n = pxlObj.tpl_url+"/dev-img/psd_gy.png";
                            break;
                        case "application/x-zip-compressed":
                        case "application/zip":
                            n = pxlObj.tpl_url+"/dev-img/zip_gy.png";
                            break;
                        default:
                            n = pxlObj.tpl_url+"/dev-img/def-thumb.png";
                    }
                    e.size > 1e7 && "image/jpeg" == e.type
                    ? (n = pxlObj.tpl_url+"/dev-img/jpg_gy.png")
                    : e.size > 1e7 && "image/png" == e.type && (n = pxlObj.tpl_url+"/dev-img/png_gy.png"),
                    (a.innerHTML = '<img src="' + n + '" height="55" width="55"><button type="button" onclick="return furemoveMe(this,this.value);" value="' + t.file + '">X</button></span>'),
                    document.getElementById("fugallery").appendChild(a);
                });
            } else fusetFileError(t.message);
        } else console.log("error");
        n.classList.remove("active");
    }),
    r.send(o);
}
*/