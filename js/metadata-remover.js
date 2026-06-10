document.addEventListener("DOMContentLoaded", () => {
const uploadArea = document.getElementById("upload-area");
const imageInput = document.getElementById("image-input");
const chooseFileBtn = document.getElementById("choose-file-btn");

const previewImage = document.getElementById("preview-image");
const previewPlaceholder = document.getElementById("preview-placeholder");

const fileName = document.getElementById("file-name");
const metadataStatus = document.getElementById("metadata-status");
const gpsStatus = document.getElementById("gps-status");
const cameraStatus = document.getElementById("camera-status");
const timestampStatus = document.getElementById("timestamp-status");

const cleanBtn = document.getElementById("clean-btn");
const downloadBtn = document.getElementById("download-btn");

const resultBox = document.getElementById("result-box");

const pasteBtn = document.getElementById("paste-btn");
const urlBtn = document.getElementById("url-btn");

let cleanedImageURL = null;
let originalFile = null;

/* =========================================
   OPEN FILE PICKER
========================================= */

chooseFileBtn.addEventListener("click", () => {
  imageInput.click();
});

/* =========================================
   FILE SELECT
========================================= */

imageInput.addEventListener("change", (e) => {
  const file = e.target.files[0];

  if(file){
    handleImage(file);
  }
});

/* =========================================
   DRAG & DROP
========================================= */

uploadArea.addEventListener("dragover", (e) => {
  e.preventDefault();
  uploadArea.classList.add("dragover");
});

uploadArea.addEventListener("dragleave", () => {
  uploadArea.classList.remove("dragover");
});

uploadArea.addEventListener("drop", (e) => {
  e.preventDefault();

  uploadArea.classList.remove("dragover");

  const file = e.dataTransfer.files[0];

  if(file && file.type.startsWith("image/")){
    handleImage(file);
  }
});

/* =========================================
   HANDLE IMAGE
========================================= */

async function handleImage(file){

  originalFile = file;

  const reader = new FileReader();

  reader.onload = function(event){

    previewImage.src = event.target.result;
    previewImage.style.display = "block";

    previewPlaceholder.style.display = "none";

    fileName.textContent = file.name;

    detectMetadata(file);

    cleanBtn.disabled = false;

    resultBox.style.display = "none";

    downloadBtn.disabled = true;
  };

  reader.readAsDataURL(file);
}

/* =========================================
   DETECT METADATA (ACCURATE AUDIT)
========================================= */
async function detectMetadata(file) {
    // Reset status to a loading state
    metadataStatus.textContent = "Auditing metadata...";
    
    try {
        // exifr.parse reads the actual binary header of the image
        const data = await exifr.parse(file);
        
        if (data) {
            metadataStatus.innerHTML = '<span class="status-badge status-danger">Sensitive Data Detected</span>';
            
            // Check specific fields accurately
            gpsStatus.textContent = (data.latitude || data.GPSLatitude) 
                ? "GPS/Location found" 
                : "No GPS data";
                
            cameraStatus.textContent = data.Model 
                ? `Camera: ${data.Model}` 
                : "Camera info not found";
                
            timestampStatus.textContent = data.DateTimeOriginal 
                ? "Timestamp found" 
                : "No timestamp data";
        } else {
            metadataStatus.innerHTML = '<span class="status-badge status-safe">No Metadata Found</span>';
            gpsStatus.textContent = "Clean";
            cameraStatus.textContent = "Clean";
            timestampStatus.textContent = "Clean";
        }
    } catch (err) {
        console.error("Audit error:", err);
        metadataStatus.textContent = "Could not parse metadata.";
    }
}

/* =========================================
   REMOVE METADATA
========================================= */

cleanBtn.addEventListener("click", () => {

  if(!originalFile) return;

  const reader = new FileReader();

  reader.onload = function(event){

    const img = new Image();

    img.onload = function(){

      const canvas = document.createElement("canvas");
      const ctx = canvas.getContext("2d");

      canvas.width = img.width;
      canvas.height = img.height;

      ctx.drawImage(img, 0, 0);

      canvas.toBlob((blob) => {

        cleanedImageURL = URL.createObjectURL(blob);

        previewImage.src = cleanedImageURL;

        metadataStatus.textContent =
          "Metadata removed successfully";

        gpsStatus.textContent =
          "GPS/location data removed";

        cameraStatus.textContent =
          "Camera metadata removed";

        timestampStatus.textContent =
          "Timestamp data removed";

        downloadBtn.disabled = false;

        resultBox.style.display = "block";

      }, "image/jpeg", 0.95);

    };

    img.src = event.target.result;

  };

  reader.readAsDataURL(originalFile);

});

/* =========================================
   DOWNLOAD CLEAN IMAGE
========================================= */

downloadBtn.addEventListener("click", () => {

  if(!cleanedImageURL) return;

  const link = document.createElement("a");

  link.href = cleanedImageURL;

  link.download =
    "clean-image.jpg";

  document.body.appendChild(link);

  link.click();

  document.body.removeChild(link);

});

/* =========================================
   PASTE IMAGE
========================================= */

pasteBtn.addEventListener("click", async () => {

  try{

    const items = await navigator.clipboard.read();

    for(const item of items){

      for(const type of item.types){

        if(type.startsWith("image/")){

          const blob = await item.getType(type);

          const file = new File(
            [blob],
            "clipboard-image.png",
            { type: blob.type }
          );

          handleImage(file);

          return;
        }
      }
    }

    alert("No image found in clipboard.");

  }catch(error){

    alert("Clipboard access failed.");

  }

});

/* =========================================
   LOAD IMAGE FROM URL
========================================= */

urlBtn.addEventListener("click", () => {

  const url = prompt("Enter image URL:");

  if(!url) return;

  fetch(url)
    .then(response => response.blob())
    .then(blob => {

      if(!blob.type.startsWith("image/")){
        alert("Invalid image URL.");
        return;
      }

      const file = new File(
        [blob],
        "url-image",
        { type: blob.type }
      );

      handleImage(file);

    })
 .catch(() => {

  alert(
    "Could not load image from URL."
  );

});

}); // closes urlBtn event

}); // closes DOMContentLoaded
