const qrInput = document.getElementById("qr-input");
const qrPreview = document.getElementById("qr-preview");
const downloadBtn = document.getElementById("download-btn");

let qrCode = null;

/* =========================================
   GENERATE QR CODE
========================================= */

qrInput.addEventListener("input", () => {

  const value = qrInput.value.trim();

  /* EMPTY INPUT */
  if(value === ""){

    qrPreview.innerHTML = `
      <div class="qr-preview-inner">
        <span class="placeholder">
          QR Preview
        </span>
      </div>
    `;

    downloadBtn.disabled = true;

    qrCode = null;

    return;
  }

  /* CLEAR OLD QR */
  qrPreview.innerHTML = `
    <div class="qr-preview-inner" id="qr-code-box"></div>
  `;

  const qrCodeBox =
    document.getElementById("qr-code-box");

  /* GENERATE NEW QR */
  qrCode = new QRCode(qrCodeBox, {
    text: value,
    width: 260,
    height: 260,
    colorDark: "#0f172a",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H
  });

  downloadBtn.disabled = false;

});

/* =========================================
   DOWNLOAD QR CODE
========================================= */

downloadBtn.addEventListener("click", () => {

  if(!qrCode){
    return;
  }

  const qrImage =
    qrPreview.querySelector("img");

  const qrCanvas =
    qrPreview.querySelector("canvas");

  let imageSource = "";

  /* IMAGE SOURCE */
  if(qrImage){
    imageSource = qrImage.src;
  }

  else if(qrCanvas){
    imageSource = qrCanvas.toDataURL("image/png");
  }

  else{
    return;
  }

  /* CREATE DOWNLOAD */
  const downloadLink =
    document.createElement("a");

  downloadLink.href = imageSource;

  downloadLink.download =
    "privacytestlab-qrcode.png";

  document.body.appendChild(downloadLink);

  downloadLink.click();

  document.body.removeChild(downloadLink);

});

/* =========================================
   ENTER KEY SUPPORT
========================================= */

qrInput.addEventListener("keydown", (event) => {

  if(event.key === "Enter"){

    event.preventDefault();

    if(!downloadBtn.disabled){
      downloadBtn.click();
    }

  }

});