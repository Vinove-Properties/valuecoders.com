/*Handle File uploader*/
function upload_file(e){
    e.preventDefault();
    ajax_file_upload(e.dataTransfer.files);
}
  
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        files = document.getElementById('selectfile').files;
        ajax_file_upload(files);
    };
}
  
function ajax_file_upload(files_obj) {
    let gloader = document.getElementById('gloader');
    gloader.classList.add("active");
    if(files_obj != undefined) {
        var form_data = new FormData();
        for(i=0; i<files_obj.length; i++) {
            form_data.append('file[]', files_obj[i]);
        }
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "ajax.php", true);
        xhttp.onload = function(event) {
            if (xhttp.status == 200) {
                alert(this.responseText);
            } else {
                alert("Error " + xhttp.status + " occurred when trying to upload your file.");
            }
            gloader.classList.add("active");
        }
 
        xhttp.send(form_data);
    }
}

// ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})

;['dragleave', 'drop'].forEach(eventName => {
    //console.log(eventName);
    dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let uploadProgress = []
let progressBar = document.getElementById('progress-bar')
function setFileError( msg ){
    let fcontainer = document.getElementById('file-type-error');
    fcontainer.innerHTML = msg;
    setTimeout(function(){
        fcontainer.innerHTML = "";
    }, 3000);
}

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  progressBar.value = total
}

function handleFiles(files){
    //alert( files.length );
    setFileError("");
    let uldCounter  = document.getElementById("uplcounter");
    if( parseInt(uldCounter.value) >= 10 ){
        setFileError( "You can not upload more then 10 media files." );
        return;
    }
    let allFcount = (files.length + parseInt(uldCounter.value))
    if( parseInt(allFcount) > 10 ){
        setFileError( "You can not upload more then 10 media files." );
        return;
    }

    let preuploaded = document.getElementById('Uploadedfilename').value;
    if( preuploaded ){
        let prefiles = preuploaded.split(",");
        if( prefiles.length > 10 ){
            setFileError( "You can not upload more then 10 media files." );
            return; 
        }
    }   
    if( files.length > 10 ){
        setFileError( "You can not upload more then 10 media files." );
        return;
    }
    files = [...files]
    files.forEach(uploadFile);
}
//Remove Fle
function removeMe(e,imageName){
    let uldCounter = document.getElementById("uplcounter");
    let gloader     = document.getElementById('gloader');
    let gallery     = document.getElementById('gallery');   
    //gloader.classList.add("show-me");
    setFileError("");
    const xhttp = new XMLHttpRequest(); 
    xhttp.open("GET", vcObj.web_url+"/delete_file.php?delete=1&imageName="+imageName, true);
    xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let counterValue = parseInt(uldCounter.value);
                counterValue--;
                uldCounter.value = counterValue;

                var fileName=document.getElementById('Uploadedfilename').value;
                newStr = fileName.replace(imageName, '');
                document.getElementById('Uploadedfilename').value=newStr;
                console.log(this.responseText);
                e.parentNode.remove();
                if(!gallery.hasChildNodes()){gloader.classList.remove("show-me");}
            }
        }
    xhttp.send();
 
}
//End Remove Fle

function uploadFile(file, i) {
    setFileError("");
    let uldCounter  = document.getElementById("uplcounter");
    if( parseInt(uldCounter.value) >= 10 ){
        setFileError( "You can not upload more then 10 media files." );
        return;
    }

    let gloader     = document.getElementById('gloader');
    gloader.classList.add("show-me");
    gloader.classList.add("active");
    
    const fileSize = file.size / 1024 / 1024;
    if( fileSize > 20 ){
        setFileError("ERROR Uploaded document exceeds the maximum size limit of 20 MB");
        gloader.classList.remove("active");
        return;
    }

    var form_data = new FormData();
    form_data.append('file', file)
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", vcObj.web_url+"/file-uploader.php", true);
    xhttp.onload = function(event){
        if (xhttp.status == 200) {
            let response =  JSON.parse(xhttp.responseText);             
            // console.log( file.name );
            const fileName = file.name;
            const dotIndex = fileName.lastIndexOf('.');
            const baseName = fileName.substring(0, dotIndex);
            const extension = fileName.substring(dotIndex);
            
            let trimmedBaseName = baseName;
            if (baseName.length > 60) {
                trimmedBaseName = baseName.substring(0, 60);
            }
            const trimmedFileName = trimmedBaseName + extension;

            //console.log( response );
            if( response.status == true ){
                let counterValue = parseInt(uldCounter.value);
                counterValue++;
                uldCounter.value = counterValue;
                let existingVal = document.getElementById('Uploadedfilename').value;
                if( existingVal == '' ){
                    document.getElementById('Uploadedfilename').value = response.file;                      
                }else{
                    document.getElementById('Uploadedfilename').value = existingVal + response.file;
                }

            let reader = new FileReader()
              reader.readAsDataURL(file)
              reader.onloadend = function() {
                let indiv       = document.createElement('div');
                indiv.classList.add("ad-file");
                indiv.innerHTML = '<span class="up-file">'+trimmedFileName+'</span><button type="button" onclick="return removeMe(this,this.value);" value="'+response.file+'"></button>';
                document.getElementById('gallery').appendChild(indiv);
                }
            }else{
                setFileError( response.message );
            }
        }else{
            console.log("error");
        }
        gloader.classList.remove("active");
    }
    xhttp.send(form_data);
}