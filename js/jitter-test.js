/* =========================================================
   JITTER TEST
   PrivacyTestLab
========================================================= */

const startBtn =
  document.getElementById("startJitter");

const accurateMode =
  document.getElementById("accurateJitter");

const targetSelect =
  document.getElementById("jitterTarget");

const avgJitter =
  document.getElementById("avgJitter");

const minJitter =
  document.getElementById("minJitter");

const maxJitter =
  document.getElementById("maxJitter");

const stability =
  document.getElementById("stability");

/* =========================================================
   STATE
========================================================= */

let running = false;

let jitterInterval = null;

let latencySamples = [];

let jitterSamples = [];

let chart;

/* =========================================================
   CHART
========================================================= */

const ctx =
  document
    .getElementById("jitterChart")
    .getContext("2d");

chart = new Chart(ctx, {

  type:"line",

  data:{
    labels:[],
    datasets:[{
      label:"Jitter (ms)",
      data:[],
      borderColor:"#e59f2f",
      backgroundColor:"rgba(229,159,47,.12)",
      borderWidth:2,
      tension:.42,
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

function calculateStability(avg){

  if(avg <= 10){
  return "Excellent";
}

if(avg <= 30){
  return "Good";
}

if(avg <= 60){
  return "Average";
}

return "Poor";

}

/* =========================================================
   UPDATE METRICS
========================================================= */

function updateMetrics(){

  if(!jitterSamples.length) return;

  const avg =
    jitterSamples.reduce((a,b)=>a+b,0)
    / jitterSamples.length;

  const min =
  Math.max(
    1,
    Math.min(...jitterSamples)
  );

  const max =
    Math.max(...jitterSamples);

  avgJitter.textContent =
    avg.toFixed(0);

  minJitter.textContent =
    min.toFixed(0);

  maxJitter.textContent =
    max.toFixed(0);

  stability.textContent =
    calculateStability(avg);

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

  /* LIMIT */

  if(chart.data.labels.length > 120){

    chart.data.labels.shift();

    chart.data.datasets[0].data.shift();

  }

  chart.update();

}
/* =========================================================
   Jitter
========================================================= */
async function measureJitter(){

  const url =
    targetSelect.value +
    "?cache=" +
    Math.random();

  const start =
    performance.now();

  try{

    const response =
      await fetch(url,{
        cache:"no-store",
        credentials:"same-origin"
      });

    if(!response.ok){
      throw new Error("Ping failed");
    }

    await response.text();

    const end =
      performance.now();

    let latency =
      end - start;

    latency =
      Math.max(
        1,
        Math.round(latency)
      );

    latencySamples.push(latency);

    if(latencySamples.length > 1){

      const previous =
        latencySamples[
          latencySamples.length - 2
        ];

     let jitter =
  Math.abs(
    latency - previous
  );

/*
IGNORE CRAZY SPIKES
*/

if(jitter > 300){

  jitter = 300;

}

      jitterSamples.push(jitter);

      addPoint(jitter);

      updateMetrics();

    }

  }catch(err){

    console.error(
      "Jitter test failed:",
      err
    );

  }

}
/* =========================================================
   START / STOP
========================================================= */

function startJitterTest(){

  if(running){

    stopJitterTest();

    return;

  }

  running = true;

  latencySamples = [];

  jitterSamples = [];

  chart.data.labels = [];

  chart.data.datasets[0].data = [];

  chart.update();

  avgJitter.textContent = "–";
  minJitter.textContent = "–";
  maxJitter.textContent = "–";
  stability.textContent = "–";

  /* BUTTON */

  startBtn.textContent =
    "Stop Jitter Test";

  startBtn.classList.add("stop");

  /* INTERVAL */

 

  measureJitter();

jitterInterval =
  setInterval(
    measureJitter,
    1000
  );

}

/* =========================================================
   STOP
========================================================= */

function stopJitterTest(){

  running = false;

  clearInterval(jitterInterval);

  startBtn.textContent =
    "Start Jitter Test";

  startBtn.classList.remove("stop");

}

/* =========================================================
   EVENTS
========================================================= */

startBtn.addEventListener(
  "click",
  startJitterTest
);

/* =========================================================
   LIVE MODE CHANGE
========================================================= */

accurateMode.addEventListener(
  "change",
  ()=>{

    if(running){

      clearInterval(jitterInterval);

      

     jitterInterval =
  setInterval(
    measureJitter,
    1000
  );

    }

  }
);