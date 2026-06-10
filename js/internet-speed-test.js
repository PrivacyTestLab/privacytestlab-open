/* =========================================================
   INTERNET SPEED TEST
   PrivacyTestLab
========================================================= */

const startBtn = document.getElementById("start-test");
const pauseBtn = document.getElementById("pause-test");
const resetBtn = document.getElementById("reset-test");

const testBtnText =
  document.getElementById("test-btn-text");

const downloadSpeed =
  document.getElementById("download-speed");

const uploadSpeed =
  document.getElementById("upload-speed");

const pingSpeed =
  document.getElementById("ping-speed");

const jitterSpeed =
  document.getElementById("jitter-speed");

const packetLoss =
  document.getElementById("packet-loss");

const liveStatusText =
  document.getElementById("live-status-text");

const connectionType =
  document.getElementById("connection-type");

const testDuration =
  document.getElementById("test-duration");

const streamingScore =
  document.getElementById("streaming-score");

const gamingScore =
  document.getElementById("gaming-score");

const meetingScore =
  document.getElementById("meeting-score");

const downloadScore =
  document.getElementById("download-score");

const qualityResults =
  document.getElementById("quality-results");

const latencyLow =
  document.getElementById("latency-low");

const latencyHigh =
  document.getElementById("latency-high");

const jitterLow =
  document.getElementById("jitter-low");

const jitterHigh =
  document.getElementById("jitter-high");

/* =========================================================
   STATE
========================================================= */

let running = false;
let paused = false;

let startTime = null;
let durationInterval = null;

let finalDownload = 0;
let finalUpload = 0;
let finalPing = 0;
let finalJitter = 0;
let finalPacketLoss = 0;

/* =========================================================
   CONNECTION TYPE
========================================================= */

function detectConnectionType(){

  const connection =
    navigator.connection ||
    navigator.mozConnection ||
    navigator.webkitConnection;

  if(!connection){

    connectionType.textContent =
      "Unknown";

    return;

  }

  const type =
    connection.effectiveType || "Unknown";

  const map = {
    "slow-2g": "Slow 2G",
    "2g": "2G Mobile",
    "3g": "3G Mobile",
    "4g": "4G / Broadband"
  };

  connectionType.textContent =
    map[type] || type.toUpperCase();

}

detectConnectionType();

/* =========================================================
   STATUS
========================================================= */

function setStatus(message){

  liveStatusText.textContent =
    message;

}

function updateDuration(){

  if(!startTime) return;

  const seconds =
    Math.floor(
      (Date.now() - startTime) / 1000
    );

  testDuration.textContent =
    seconds < 10
      ? `0${seconds}s`
      : `${seconds}s`;

}

/* =========================================================
   ANIMATION
========================================================= */

function animateValue(element, value){

  element.textContent =
    value < 10
      ? value.toFixed(2)
      : value.toFixed(1);

}

/* =========================================================
   QUALITY ENGINE
========================================================= */

function setQuality(element, label, className){

  element.textContent = label;

  element.className =
    "quality-status " + className;

}

function updateQualityScores(){

  /* STREAMING */

  if(
    finalDownload >= 50 &&
    finalPing < 50
  ){

    setQuality(
      streamingScore,
      "Excellent",
      "status-excellent"
    );

  }else if(
    finalDownload >= 25
  ){

    setQuality(
      streamingScore,
      "Good",
      "status-good"
    );

  }else if(
    finalDownload >= 10
  ){

    setQuality(
      streamingScore,
      "Average",
      "status-average"
    );

  }else{

    setQuality(
      streamingScore,
      "Bad",
      "status-bad"
    );

  }

  /* GAMING */

  if(
    finalPing < 25 &&
    finalJitter < 10
  ){

    setQuality(
      gamingScore,
      "Excellent",
      "status-excellent"
    );

  }else if(
    finalPing < 50
  ){

    setQuality(
      gamingScore,
      "Good",
      "status-good"
    );

  }else if(
    finalPing < 90
  ){

    setQuality(
      gamingScore,
      "Average",
      "status-average"
    );

  }else{

    setQuality(
      gamingScore,
      "Bad",
      "status-bad"
    );

  }

  /* VIDEO MEETINGS */

  if(
    finalUpload >= 10 &&
    finalJitter < 15
  ){

    setQuality(
      meetingScore,
      "Excellent",
      "status-excellent"
    );

  }else if(
    finalUpload >= 5
  ){

    setQuality(
      meetingScore,
      "Good",
      "status-good"
    );

  }else if(
    finalUpload >= 2
  ){

    setQuality(
      meetingScore,
      "Average",
      "status-average"
    );

  }else{

    setQuality(
      meetingScore,
      "Bad",
      "status-bad"
    );

  }

  /* LARGE DOWNLOADS */

  if(finalDownload >= 100){

    setQuality(
      downloadScore,
      "Excellent",
      "status-excellent"
    );

  }else if(finalDownload >= 40){

    setQuality(
      downloadScore,
      "Good",
      "status-good"
    );

  }else if(finalDownload >= 10){

    setQuality(
      downloadScore,
      "Average",
      "status-average"
    );

  }else{

    setQuality(
      downloadScore,
      "Bad",
      "status-bad"
    );

  }

}





/* =========================================================
   PAUSE
========================================================= */
function pauseTest(){

  speedTest.abort();

  running = false;

  clearInterval(
    durationInterval
  );

  setStatus(
    "Test cancelled"
  );

  startBtn.disabled = false;

  pauseBtn.disabled = true;

  testBtnText.textContent =
    "Run Again";

}
/* =========================================================
   RESET
========================================================= */

function resetTest(){

  running = false;

  paused = false;

  clearInterval(durationInterval);

  finalDownload = 0;
  finalUpload = 0;
  finalPing = 0;
  finalJitter = 0;
  finalPacketLoss = 0;

  downloadSpeed.textContent = "0";
  uploadSpeed.textContent = "0";

  pingSpeed.textContent = "0";
  jitterSpeed.textContent = "0";

  packetLoss.textContent = "0";

  latencyLow.textContent = "0";
  latencyHigh.textContent = "0";

  jitterLow.textContent = "0";
  jitterHigh.textContent = "0";

  testDuration.textContent = "00s";

  setStatus("Ready");

  qualityResults.classList.add(
    "hidden-quality"
  );

}


pauseBtn.addEventListener(
  "click",
  pauseTest
);

resetBtn.addEventListener(
  "click",
  resetTest
);

/* =========================================================
   INIT
========================================================= */

resetTest();


const speedTest =
  new Speedtest();

/*
|--------------------------------------------------------------------------
| LibreSpeed Backend
|--------------------------------------------------------------------------
*/

speedTest.setParameter(
  "url_dl",
  "/api/garbage.php"
);

speedTest.setParameter(
  "url_ul",
  "/api/empty.php"
);

speedTest.setParameter(
  "url_ping",
  "/api/empty.php"
);

speedTest.setParameter(
  "url_getIp",
  "/api/getIP.php"
);

/*
|--------------------------------------------------------------------------
| Test Tuning
|--------------------------------------------------------------------------
*/

speedTest.setParameter(
  "time_dl",
  "8"
);

speedTest.setParameter(
  "time_ul",
  "6"
);

speedTest.setParameter(
  "count_ping",
  "10"
);

/*
|--------------------------------------------------------------------------
| LIVE STATUS
|--------------------------------------------------------------------------
*/

speedTest.onupdate =
  function(data){

    /*
    DOWNLOAD
    */

    if(data.dlStatus){

      finalDownload =
        parseFloat(
          data.dlStatus
        );

      downloadSpeed.textContent =
        finalDownload.toFixed(2);

    }

    /*
    UPLOAD
    */

    if(data.ulStatus){

      finalUpload =
        parseFloat(
          data.ulStatus
        );

      uploadSpeed.textContent =
        finalUpload.toFixed(2);

    }

    /*
    PING
    */

    if(data.pingStatus){

      finalPing =
        parseFloat(
          data.pingStatus
        );

      pingSpeed.textContent =
        finalPing.toFixed(1);

    }

    /*
    JITTER
    */

    if(data.jitterStatus){

      finalJitter =
        parseFloat(
          data.jitterStatus
        );

      jitterSpeed.textContent =
        finalJitter.toFixed(1);

    }

    /*
    PROGRESS STATUS
    */

    if(data.testState === 1){

      setStatus(
        "Testing download..."
      );

    }

    if(data.testState === 3){

      setStatus(
        "Testing upload..."
      );

    }

    /*
    FINISHED
    */

    if(data.testState === 4){

      running = false;

      clearInterval(
        durationInterval
      );

      updateQualityScores();

      qualityResults.classList.remove(
        "hidden-quality"
      );

      setStatus(
        "Test completed"
      );

      startBtn.disabled = false;

      pauseBtn.disabled = true;

      testBtnText.textContent =
        "Run Again";

    }

  };

/*
|--------------------------------------------------------------------------
| START TEST
|--------------------------------------------------------------------------
*/

startBtn.addEventListener(
  "click",
  () => {

    if(running) return;

    running = true;

    startTime =
      Date.now();

    durationInterval =
      setInterval(
        updateDuration,
        1000
      );

    startBtn.disabled = true;

    pauseBtn.disabled = false;

    testBtnText.textContent =
      "Running";

    qualityResults.classList.add(
      "hidden-quality"
    );

    speedTest.start();

  }
);


