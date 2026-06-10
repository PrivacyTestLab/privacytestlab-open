const userIp = document.getElementById("user-ip");
const copyBtn = document.getElementById("copy-btn");
const topStatus = document.getElementById("top-status-dot");
const analyzeBtn = document.getElementById("analyze-btn");
const ipInput = document.getElementById("ip-input");
const inlineResult = document.getElementById("inline-result");
const resultSignal = document.getElementById("result-signal");
const signalTitle = document.getElementById("signal-title");
const signalSubtitle = document.getElementById("signal-subtitle");

// NEW: Dom Selectors for Proof-of-Work Telemetry Grid
const resIsp = document.getElementById("res-isp");
const resLocation = document.getElementById("res-location");
const resAsn = document.getElementById("res-asn");

/*
|--------------------------------------------------------------------------
| UI STATE SIGNALS
|--------------------------------------------------------------------------
*/
function setSafeUI(){
  resultSignal.classList.remove("danger", "leak");
  resultSignal.classList.add("safe");
  signalTitle.textContent = "No Proxy Detected";
  signalSubtitle.textContent = "This connection matches verifiable residential footprint routing.";
}

function setDangerUI(){
  resultSignal.classList.remove("safe");
  resultSignal.classList.add("leak");
  signalTitle.textContent = "Anonymization Node Active";
  signalSubtitle.textContent = "Active VPN, commercial hosting datacenter, or Tor relays intercepted.";
}

/*
|--------------------------------------------------------------------------
| SECURE BACKEND ASYNC BRIDGE (Relative Path Router)
|--------------------------------------------------------------------------
*/
async function checkIP(ip) {
  const response = await fetch(`check-proxy.php?ip=${encodeURIComponent(ip)}`);
  if (!response.ok) throw new Error("Internal security pipeline gateway unreachable.");
  return await response.json();
}

/*
|--------------------------------------------------------------------------
| LOAD USER IP (Initial Page Load Setup)
|--------------------------------------------------------------------------
*/
async function loadUserIP(){
  try {
    const ipResponse = await fetch("https://api.ipify.org?format=json");
    const ipData = await ipResponse.json();
    const ip = ipData.ip;

    userIp.textContent = ip;
    ipInput.value = ip;

    try {
      const data = await checkIP(ip);

      // FIXED: Mapping to full API data properties for initial load
      if (data) {
        if (resIsp) resIsp.textContent = data.network?.autonomous_system_organization || "Unknown ISP";
        if (resAsn) resAsn.textContent = data.network?.autonomous_system_number || "Unknown ASN";
        if (resLocation) {
          const city = data.location?.city ? `${data.location.city}, ` : "";
          const country = data.location?.country || "Unknown Country";
          resLocation.textContent = `${city}${country}`;
        }
      }

      const isProxy =
        data.security?.vpn ||
        data.security?.proxy ||
        data.security?.tor ||
        data.security?.relay;

      if(isProxy){
        topStatus.classList.remove("safe");
        topStatus.classList.add("danger");
      }
    } catch(innerError) {
      console.error(innerError);
    }

  } catch(error) {
    console.error(error);
    userIp.textContent = "Unable to detect";
  }
}

loadUserIP();

/*
|--------------------------------------------------------------------------
| COPY IP
|--------------------------------------------------------------------------
*/
copyBtn.addEventListener("click", async () => {
  try {
    await navigator.clipboard.writeText(userIp.textContent);
    copyBtn.textContent = "Copied!";
    setTimeout(() => {
      copyBtn.textContent = "Copy IP";
    }, 1800);
  } catch(error) {
    copyBtn.textContent = "Failed";
  }
});

/*
|--------------------------------------------------------------------------
| ANALYZE BUTTON ACTION CORE (Manual Queries)
|--------------------------------------------------------------------------
*/
analyzeBtn.addEventListener("click", async () => {
  const ip = ipInput.value.trim();

  if(!ip){
    alert("Please enter a valid target IP address");
    return;
  }

  analyzeBtn.disabled = true;
  analyzeBtn.textContent = "Analyzing Pipeline...";
  
  // Clear old telemetry text states and prepare loaders
  if (resIsp) resIsp.textContent = "Querying...";
  if (resLocation) resLocation.textContent = "Querying...";
  if (resAsn) resAsn.textContent = "Querying...";

  try {
    const data = await checkIP(ip);

    if (data && data.security) {
      
      // FIXED: Mapping to full API data properties for manual search
      if (resIsp) resIsp.textContent = data.network?.autonomous_system_organization || "N/A";
      if (resAsn) resAsn.textContent = data.network?.autonomous_system_number || "N/A";
      if (resLocation) {
        const city = data.location?.city ? `${data.location.city}, ` : "";
        const country = data.location?.country || "Unknown";
        resLocation.textContent = `${city}${country}`;
      }

      // Process Threat Intelligence Boolean Matrix
      const isProxy = 
        data.security.vpn === true || 
        data.security.proxy === true || 
        data.security.tor === true || 
        data.security.relay === true;

      if (isProxy) {
        setDangerUI();
      } else {
        setSafeUI();
      }
      
      // Reveal UI result card container completely
      inlineResult.classList.remove("hidden");
      
    } else {
      throw new Error("Invalid telemetry tracking payload returned from source router.");
    }

  } catch (error) {
    console.error("Diagnostic failure:", error);
    
    // Reset indicators on error state
    if (resIsp) resIsp.textContent = "Error";
    if (resLocation) resLocation.textContent = "Error";
    if (resAsn) resAsn.textContent = "Error";
    
    alert("Unable to analyze IP address. Check the web console logs for details.");
  } finally {
    analyzeBtn.disabled = false;
    analyzeBtn.textContent = "Analyze";
  }
});

/*
|--------------------------------------------------------------------------
| ENTER KEY LISTEN EVENT
|--------------------------------------------------------------------------
*/
ipInput.addEventListener("keydown", (e) => {
  if(e.key === "Enter"){
    analyzeBtn.click();
  }
});