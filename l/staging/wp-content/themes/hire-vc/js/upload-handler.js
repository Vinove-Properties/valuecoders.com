// ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area");
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

function setFileError( msg ){
    let fcontainer = document.getElementById('file-type-error');
    fcontainer.innerHTML = msg;
    setTimeout(function(){
        fcontainer.innerHTML = "";
    }, 3000);
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


// ************************ Drag and drop Footer Section ***************** //
let dropAreaFo = document.getElementById("drop-area-fo");
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropAreaFo.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropAreaFo.addEventListener(eventName, highlightFo, false)
})

;['dragleave', 'drop'].forEach(eventName => {
    //console.log(eventName);
    dropAreaFo.addEventListener(eventName, unhighlightFo, false)
})

// Handle dropped files
dropAreaFo.addEventListener('drop', handleDropFo, false)
function highlightFo(e) {
  dropAreaFo.classList.add('highlight')
}

function unhighlightFo(e) {
  dropAreaFo.classList.remove('active')
}

function handleDropFo(e) {
  var dt = e.dataTransfer
  var files = dt.files
  handleFilesFo(files)
}

function setFileErrorFo( msg ){
    let fcontainer = document.getElementById('file-type-error-fo');
    fcontainer.innerHTML = msg;
    setTimeout(function(){
        fcontainer.innerHTML = "";
    }, 3000);
}

function handleFilesFo(files){
    setFileErrorFo("");
    let uldCounter  = document.getElementById("uplcounter-fo");
    if( parseInt(uldCounter.value) >= 10 ){
        setFileErrorFo( "You can not upload more then 10 media files." );
        return;
    }
    let allFcount = (files.length + parseInt(uldCounter.value))
    if( parseInt(allFcount) > 10 ){
        setFileErrorFo( "You can not upload more then 10 media files." );
        return;
    }

    let preuploaded = document.getElementById('Uploadedfilename').value;
    if( preuploaded ){
        let prefiles = preuploaded.split(",");
        if( prefiles.length > 10 ){
            setFileErrorFo( "You can not upload more then 10 media files." );
            return; 
        }
    }   
    if( files.length > 10 ){
        setFileErrorFo( "You can not upload more then 10 media files." );
        return;
    }
    files = [...files]
    files.forEach(uploadFileFo);
}
//Remove Fle
function removeMeFo(e,imageName){
    let uldCounter  = document.getElementById("uplcounter-fo");
    let gloader     = document.getElementById('gloader-fo');
    let gallery     = document.getElementById('gallery-fo');
    setFileErrorFo("");
    const xhttp = new XMLHttpRequest(); 
    xhttp.open("GET", vcObj.web_url+"/delete_file.php?delete=1&imageName="+imageName, true);
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let counterValue = parseInt(uldCounter.value);
        counterValue--;
        uldCounter.value = counterValue;

        var fileName=document.getElementById('Uploadedfilename-fo').value;
        newStr = fileName.replace(imageName, '');
        document.getElementById('Uploadedfilename-fo').value=newStr;
        console.log(this.responseText);
        e.parentNode.remove();
        if(!gallery.hasChildNodes()){gloader.classList.remove("show-me");}
      }
    }
    xhttp.send();
 
}
//End Remove Fle

function uploadFileFo(file, i){
    setFileErrorFo("");
    let uldCounter  = document.getElementById("uplcounter-fo");
    if( parseInt(uldCounter.value) >= 10 ){
        setFileErrorFo( "You can not upload more then 10 media files." );
        return;
    }

    let gloader     = document.getElementById('gloader-fo');
    gloader.classList.add("show-me");
    gloader.classList.add("active");
    
    const fileSize = file.size / 1024 / 1024;
    if( fileSize > 20 ){
        setFileErrorFo("ERROR Uploaded document exceeds the maximum size limit of 20 MB");
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
                let existingVal = document.getElementById('Uploadedfilename-fo').value;
                if( existingVal == '' ){
                    document.getElementById('Uploadedfilename-fo').value = response.file;                      
                }else{
                    document.getElementById('Uploadedfilename-fo').value = existingVal + response.file;
                }

            let reader = new FileReader()
              reader.readAsDataURL(file)
              reader.onloadend = function() {
                let indiv       = document.createElement('div');
                indiv.classList.add("ad-file");
                indiv.innerHTML = '<span class="up-file">'+trimmedFileName+'</span><button type="button" onclick="return removeMeFo(this,this.value);" value="'+response.file+'"></button>';
                document.getElementById('gallery-fo').appendChild(indiv);
                }
            }else{
                setFileErrorFo( response.message );
            }
        }else{
            console.log("error");
        }
        gloader.classList.remove("active");
    }
    xhttp.send(form_data);
}