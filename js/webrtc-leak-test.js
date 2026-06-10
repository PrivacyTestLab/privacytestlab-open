// ================= PUBLIC IP =================

async function getIPs() {
  // ✅ IPv4 (always this endpoint)
  try {
    const res4 = await fetch("https://api.ipify.org?format=json");
    const data4 = await res4.json();
    document.getElementById("ipv4").textContent = data4.ip;
  } catch {
    document.getElementById("ipv4").textContent = "Unavailable";
  }

  // ✅ IPv6 (separate)
  try {
    const res6 = await fetch("https://api64.ipify.org?format=json");
    const data6 = await res6.json();

    if (data6.ip.includes(":")) {
      document.getElementById("ipv6").textContent = data6.ip;
    } else {
      document.getElementById("ipv6").textContent = "Not Available";
    }
  } catch {
    document.getElementById("ipv6").textContent = "Not Available";
  }
}

// ================= WEBRTC =================

async function detectWebRTC() {
  const localIPs = new Set();
  const publicIPs = new Set();
  let sdp = "";

  const pc = new RTCPeerConnection({
    iceServers: [{ urls: "stun:stun.l.google.com:19302" }]
  });

  pc.createDataChannel("");

  pc.onicecandidate = (e) => {
    if (!e.candidate) return;

    const candidate = e.candidate.candidate;
    sdp += candidate + "\n";

    const ipMatch = candidate.match(
      /([0-9]{1,3}(\.[0-9]{1,3}){3})|([a-f0-9:]+:+[a-f0-9]+)/gi
    );

    if (ipMatch) {
      ipMatch.forEach(ip => {
        if (
          ip.startsWith("192.") ||
          ip.startsWith("10.") ||
          ip.startsWith("172.")
        ) {
          localIPs.add(ip);
        } else {
          publicIPs.add(ip);
        }
      });
    }
  };

  const offer = await pc.createOffer();
  await pc.setLocalDescription(offer);

  setTimeout(() => {

    // LOCAL IP
    document.getElementById("local-ip").textContent =
      localIPs.size ? [...localIPs].join(", ") : "Hidden (Browser Protected)";

    // PUBLIC IP
    document.getElementById("public-ip").textContent =
      publicIPs.size ? [...publicIPs].join(", ") : "-";

    // SDP
    document.getElementById("sdp-log").value = sdp;

    // LEAK STATUS
    const leak = publicIPs.size > 0;
    const el = document.getElementById("leak-status");

    if (leak) {
      el.innerHTML = "✖ Leak Detected";
      el.className = "bad";
    } else {
      el.innerHTML = "✔ No Leak";
      el.className = "ok";
    }

    pc.close();
  }, 2000);
}

// ================= MEDIA PERMISSIONS =================

async function requestAudio() {
  try {
    await navigator.mediaDevices.getUserMedia({ audio: true });
    document.getElementById("audio-status").innerHTML = "✔ Granted";
    loadDevices();
  } catch {
    document.getElementById("audio-status").innerHTML = "✖ Denied";
  }
}

async function requestVideo() {
  try {
    await navigator.mediaDevices.getUserMedia({ video: true });
    document.getElementById("video-status").innerHTML = "✔ Granted";
    loadDevices();
  } catch {
    document.getElementById("video-status").innerHTML = "✖ Denied";
  }
}

// ================= DEVICES =================

async function loadDevices() {
  if (!navigator.mediaDevices) return;

  const devices = await navigator.mediaDevices.enumerateDevices();
  let html = "";

  devices.forEach(d => {
    html += `
      <div style="margin-bottom:10px">
        kind: <b>${d.kind}</b><br>
        label: ${d.label || "Hidden (Allow permission)"}<br>
        deviceId: ${d.deviceId}<br>
      </div>
    `;
  });

  document.getElementById("devices").innerHTML = html;
}

// ================= SUPPORT =================

function checkSupport() {
  document.getElementById("rtc-peer").innerHTML =
    window.RTCPeerConnection ? "✔ True" : "✖ False";

  document.getElementById("rtc-data").innerHTML =
    window.RTCDataChannel ? "✔ True" : "✖ False";

  document.getElementById("media-support").innerHTML =
    navigator.mediaDevices ? "✔ True" : "✖ False";
}

// ================= INIT =================

function init() {
  getIPs();
  detectWebRTC();
  checkSupport();
  loadDevices();
}

init();