/* =========================================================
   PING TEST
   PrivacyTestLab
========================================================= */

const startBtn =
  document.getElementById("startPing");

const accurateMode =
  document.getElementById("accurateMode");

const locationSelect =
  document.getElementById("locationSelect");

const avgPing =
  document.getElementById("avgPing");

const minPing =
  document.getElementById("minPing");

const maxPing =
  document.getElementById("maxPing");

const jitterValue =
  document.getElementById("jitter");

/* =========================================================
   STATE
========================================================= */

let running = false;

let pingInterval = null;

let pingSamples = [];

let chart;

/* =========================================================
   CHART
========================================================= */

const ctx =
  document
    .getElementById("pingChart")
    .getContext("2d");

chart = new Chart(ctx, {

  type:"line",

  data:{
    labels:[],
    datasets:[{
      label:"Latency (ms)",
      data:[],
      borderColor:"#e59f2f",
      backgroundColor:"rgba(229,159,47,.12)",
      borderWidth:2,
      tension:.28,
      pointRadius:2,
      pointHoverRadius:4,
      pointBackgroundColor:"#e59f2f",
      fill:false
    }]
  },

  options:{

    responsive:true,

    maintainAspectRatio:false,

    animation:false,

    plugins:{
      legend:{
        display:false
      },
      tooltip:{
        enabled:true
      }
    },

    scales:{

      x:{
        grid:{
          display:false
        },
        ticks:{
          display:false
        }
      },

      y:{
        beginAtZero:true,
        suggestedMax:300,
        grid:{
          color:"rgba(148,163,184,.18)"
        },
        ticks:{
          color:"#64748b",
          font:{
            size:11,
            weight:"600"
          }
        }
      }

    }

  }

});

/* =========================================================
   HELPERS
========================================================= */

function updateMetrics(){

  if(!pingSamples.length) return;

  const avg =
    pingSamples.reduce((a,b)=>a+b,0)
    / pingSamples.length;

  const min =
    Math.min(...pingSamples);

  const max =
    Math.max(...pingSamples);

  let jitter = 0;

  for(let i = 1; i < pingSamples.length; i++){

    jitter +=
      Math.abs(
        pingSamples[i] -
        pingSamples[i - 1]
      );

  }

  jitter =
    jitter /
    Math.max(
      1,
      pingSamples.length - 1
    );

  avgPing.textContent =
    avg.toFixed(0);

  minPing.textContent =
    min.toFixed(0);

  maxPing.textContent =
    max.toFixed(0);

  jitterValue.textContent =
    jitter.toFixed(0);

}

/* =========================================================
   GRAPH UPDATE
========================================================= */

function addPoint(value){

  const time =
    new Date()
      .toLocaleTimeString(
        [],
        {
          minute:"2-digit",
          second:"2-digit"
        }
      );

  chart.data.labels.push(time);

  chart.data.datasets[0].data.push(value);

  /* LIMIT POINTS */

  if(chart.data.labels.length > 120){

    chart.data.labels.shift();

    chart.data.datasets[0].data.shift();

  }

  chart.update();

}

/* =========================================================
   PING MEASURE
========================================================= */

async function measurePing(){
  const url = locationSelect.value + "?cache=" + Math.random();
  const start = performance.now();

  try {
    // Note: To fix CORS, you must fetch endpoints that allow cross-origin requests
    const response = await fetch(url, {
      method: "HEAD", // HEAD is faster than GET for ping tests
      mode: "cors",
      cache: "no-store"
    });

    if(!response.ok) {
      throw new Error("Ping failed");
    }

    const end = performance.now();
    let latency = end - start;

    /* ACCURATE MODE & FORMATTING */
    latency = Math.max(1, Math.round(latency));

    // Push, plot, and update smoothly from the very first sample
    pingSamples.push(latency);
    addPoint(latency);
    updateMetrics();

  } catch(err) {
    console.error("Network Fetch Error:", err);
    
    /* OPTIONAL: Plot a zero or spike on failure so the chart doesn't freeze */
    addPoint(0); 
  }
}
/* =========================================================
   START / STOP
========================================================= */

function startPingTest(){

  if(running){

    stopPingTest();

    return;

  }

  running = true;

  pingSamples = [];

  chart.data.labels = [];

  chart.data.datasets[0].data = [];

  chart.update();

  avgPing.textContent = "–";
  minPing.textContent = "–";
  maxPing.textContent = "–";
  jitterValue.textContent = "–";

  /* BUTTON */

  startBtn.textContent =
    "Stop Ping Test";

  startBtn.classList.add("stop");

  /* INTERVAL */

  const interval =
    accurateMode.checked
      ? 350
      : 700;

  measurePing();

  pingInterval =
    setInterval(
      measurePing,
      interval
    );

}

/* =========================================================
   STOP
========================================================= */

function stopPingTest(){

  running = false;

  clearInterval(pingInterval);

  startBtn.textContent =
    "Start Ping Test";

  startBtn.classList.remove("stop");

}

/* =========================================================
   EVENTS
========================================================= */

startBtn.addEventListener(
  "click",
  startPingTest
);

/* =========================================================
   LIVE MODE CHANGE
========================================================= */

accurateMode.addEventListener(
  "change",
  ()=>{

    if(running){

      clearInterval(pingInterval);

      const interval =
        accurateMode.checked
          ? 350
          : 700;

      pingInterval =
        setInterval(
          measurePing,
          interval
        );

    }

  }
);