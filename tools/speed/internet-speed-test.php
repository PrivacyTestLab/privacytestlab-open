
<?php
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PrivacyTestLab/app/config.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
}
// Define SEO variables
$pageTitle = "Fast Internet Speed Test: Check Your Download, Upload & Ping";
$pageDescription = "Accurately measure your connection performance. Test your download speed, upload bandwidth, and ping latency in seconds. Private, local-first testing with no data logs.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $pageTitle ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?= $pageDescription ?>">

<!-- Speed Test Endpoints -->
<meta name="speed-download-endpoint" content="https://speed.hetzner.de/100MB.bin">
<meta name="speed-upload-endpoint" content="<?= BASE_URL ?>/api/upload-speed-test.php">

<!-- Cache Control -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

<!-- CSS -->
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/layout.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/articles.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/tools/internet-speed-test.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<!-- Google AdSense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2835282326763517" crossorigin="anonymous"></script>

<!-- Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebApplication",
      "name": "PrivacyTestLab Speed Test",
      "url": "<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>",
      "applicationCategory": "Utilities",
      "operatingSystem": "Any",
      "description": "<?= $pageDescription ?>",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
      }
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
  "@type": "Question",
  "name": "What exactly does an internet speed test measure?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "An internet speed test measures the real-time capacity of your connection by simulating a data transfer between your device and a test server. It evaluates three core metrics: Download speed (how fast data reaches you), Upload speed (how fast you send data), and Latency/Ping (the reaction time of your connection)."
  }
},

{
  "@type": "Question",
  "name": "Why is my speed test result lower than what my ISP promised?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "It is common to see lower speeds than advertised due to several factors: network congestion during peak hours, the distance between your device and the router, background applications consuming bandwidth, or limitations in your Wi-Fi hardware. Advertised speeds often represent 'up to' theoretical maximums rather than guaranteed real-world performance."
  }
},
{
  "@type": "Question",
  "name": "Does using a VPN affect my internet speed test results?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Yes, using a VPN will almost always decrease your speed test results. Because a VPN routes your traffic through an encrypted tunnel to a remote server, it adds extra 'hops' and encryption processing overhead. This increases latency and often throttles your total throughput compared to your direct ISP connection."
  }
},

{
  "@type": "Question",
  "name": "What is a 'good' speed for streaming, gaming, and working from home?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "A 'good' speed depends on your usage: Streaming 4K video typically requires at least 25 Mbps, while online gaming is less about speed and more about low latency (under 50ms). For working from home, 50-100 Mbps is usually sufficient for video conferencing and multiple devices, though bandwidth requirements increase with the number of simultaneous users."
  }
},

{
  "@type": "Question",
  "name": "How often should I run an internet speed test?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Running a speed test once a month is usually sufficient to ensure you are getting the service you pay for. However, you should run a test more frequently if you experience consistent buffering, lag during video calls, or slow download speeds, as these can be indicators of network issues, hardware problems, or ISP throttling."
  }
},

{
  "@type": "Question",
  "name": "Does the browser I use affect my internet speed test results?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Yes, it can. Different browsers handle JavaScript, background processes, and network protocols in various ways. A browser with too many extensions or outdated software may struggle to process high-speed connections accurately, potentially reporting a slower speed than what your network is actually capable of delivering."
  }
},

{
  "@type": "Question",
  "name": "Why does my connection feel slow even when the results are high?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "This discrepancy often occurs because a speed test measures raw bandwidth, not 'real-world' browsing quality. If your latency (ping) is high, your DNS server is slow, or your device is struggling with packet loss, the internet will feel sluggish despite having a high 'top speed'. You are essentially hitting a traffic jam before you ever reach the highway."
  }
},

{
  "@type": "Question",
  "name": "What is 'Bufferbloat' and why does it ruin my gaming experience?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Bufferbloat is a phenomenon where excessive buffering occurs in your network equipment, usually because your router is trying to process too much data at once. Instead of dropping data packets, the router stores them in a queue, creating a 'bottleneck' that causes massive spikes in latency (ping), which results in lag, rubber-banding, and unresponsive gameplay."
  }
}

      ]
    }
  ]
}
</script>
</head>

<body>

<?php require __DIR__ . '/../../app/templates/header.php'; ?>

<div class="speed-page">

  <!-- TOP HEADER -->
  <section class="speed-topbar">

    <div class="speed-title-area">

      <div class="speed-title-wrap">

        <video
  class="speed-runner"
  autoplay
  muted
  loop
  playsinline
>
  <source
    src="../../assets/img/icons/running.mp4"
    type="video/mp4"
  >
</video>

        <h1>Speed Test</h1>

      </div>

    </div>

    <div class="speed-platform">
      Built with PrivacyTestLab Network Engine
    </div>

  </section>

  <div class="speed-divider"></div>

  <!-- MAIN TEST -->
  <section class="speed-test-area">

    <div class="speed-main-grid">

      <!-- DOWNLOAD -->
      <div class="speed-column">

        <div class="speed-head">

          <h2>
            Download
            <span>ⓘ</span>
          </h2>

        </div>

        <div class="speed-number-wrap">

          <div class="speed-big-number">

            <span id="download-speed">
              0
            </span>

            <small>Mbps</small>

          </div>

        </div>

        <!-- GRAPH -->
        <div class="speed-graph download-graph">

          <div class="graph-label">
            Live Download Activity
          </div>

          <svg class="graph-svg" viewBox="0 0 800 250">

            <path
              class="graph-fill download-fill"
              d="M0 220
                 C80 220 140 210 200 190
                 C260 170 320 120 390 110
                 C460 100 520 105 600 85
                 C680 65 740 55 800 75
                 L800 250
                 L0 250 Z">
            </path>

            <path
              class="graph-line download-line"
              d="M0 220
                 C80 220 140 210 200 190
                 C260 170 320 120 390 110
                 C460 100 520 105 600 85
                 C680 65 740 55 800 75">
            </path>

          </svg>

        </div>

      </div>

      <!-- UPLOAD -->
      <div class="speed-column">

        <div class="speed-head">

          <h2>
            Upload
            <span>ⓘ</span>
          </h2>

        </div>

        <div class="speed-number-wrap">

          <div class="speed-big-number">

            <span id="upload-speed">
              0
            </span>

            <small>Mbps</small>

          </div>

        </div>

        <!-- GRAPH -->
        <div class="speed-graph upload-graph">

          <div class="graph-label">
            Live Upload Activity
          </div>

          <svg class="graph-svg" viewBox="0 0 800 250">

            <path
              class="graph-fill upload-fill"
              d="M0 220
                 C100 210 150 160 220 120
                 C300 90 360 70 460 88
                 C560 106 630 140 720 90
                 C760 75 780 70 800 60
                 L800 250
                 L0 250 Z">
            </path>

            <path
              class="graph-line upload-line"
              d="M0 220
                 C100 210 150 160 220 120
                 C300 90 360 70 460 88
                 C560 106 630 140 720 90
                 C760 75 780 70 800 60">
            </path>

          </svg>

        </div>

      </div>

      <!-- SIDE STATS -->
      <div class="speed-side-panel">

        <div class="side-stat">

          <h3>
            Latency
            <span>ⓘ</span>
          </h3>

          <div class="side-number">
            <span id="ping-speed">0</span>
            <small>ms</small>
          </div>

          <div class="side-extra">

            <div class="orange">
              ↓ <span id="latency-low">0</span> ms
            </div>

            <div class="purple">
              ↑ <span id="latency-high">0</span> ms
            </div>

          </div>

        </div>

        <div class="side-stat">

          <h3>
            Jitter
            <span>ⓘ</span>
          </h3>

          <div class="side-number">
            <span id="jitter-speed">0</span>
            <small>ms</small>
          </div>

          <div class="side-extra">

            <div class="orange">
              ↓ <span id="jitter-low">0</span> ms
            </div>

            <div class="purple">
              ↑ <span id="jitter-high">0</span> ms
            </div>

          </div>

        </div>

        <div class="side-stat">

          <h3>
            Packet Loss
            <span>ⓘ</span>
          </h3>

          <div class="side-number">
            <span id="packet-loss">0</span>
            <small>%</small>
          </div>

        </div>

      </div>

    </div>

    <!-- CONTROLS -->
    <div class="speed-controls">

      <button id="start-test" class="primary-btn">

        <span class="btn-icon">▶</span>

        <span id="test-btn-text">
          Run Test
        </span>

      </button>

      <button id="pause-test" class="secondary-btn" disabled>

        <span class="btn-icon">⏸</span>
        Pause

      </button>

      <button id="reset-test" class="secondary-btn">

        <span class="btn-icon">↺</span>
        Retest

      </button>

    </div>

    <!-- INFO STRIP -->
    <div class="speed-info-strip">
<div class="info-chip">

  <span class="chip-label">
    Test Mode
  </span>

  <span class="chip-value" id="test-mode">
    Real Measurement
  </span>

</div>
      <div class="info-chip">

        

        <span class="chip-value" id="connection-type">
          Detecting...
        </span>

      </div>

      <div class="info-chip">

        <span class="chip-label">
          Duration
        </span>

        <span class="chip-value" id="test-duration">
          00s
        </span>

      </div>

      <div class="info-chip">

        <span class="chip-label">
          Server
        </span>

        <span class="chip-value">
          Auto Selected
        </span>

      </div>

      <div class="info-chip">

        <span class="chip-label">
          Status
        </span>

        <span class="chip-value" id="live-status-text">
          Ready
        </span>

      </div>

    </div>

    <!-- QUALITY SCORE -->
    <section class="network-quality-section">

      <div class="quality-top">

        <h3>
          Network Quality Score
        </h3>

        <a href="#">
          Learn more
        </a>

      </div>

      <!-- HIDDEN UNTIL TEST STARTS -->
      <div
        class="quality-results hidden-quality"
        id="quality-results"
      >

        <div class="quality-item"
     data-service="streaming">

          <span class="quality-label">
            Video Streaming
          </span>

          <span
            class="quality-status"
            id="streaming-score"
          >
            --
          </span>

        </div>

        <div class="quality-separator"></div>

        <div class="quality-item"
     data-service="gaming">

          <span class="quality-label">
            Online Gaming
          </span>

          <span
            class="quality-status"
            id="gaming-score"
          >
            --
          </span>

        </div>

        <div class="quality-separator"></div>

        <div class="quality-item"
     data-service="meetings">

          <span class="quality-label">
            Video Meetings
          </span>

          <span
            class="quality-status"
            id="meeting-score"
          >
            --
          </span>

        </div>

        <div class="quality-separator"></div>

        <div class="quality-item"
     data-service="downloads">

          <span class="quality-label">
            Large Downloads
          </span>

          <span
            class="quality-status"
            id="download-score"
          >
            --
          </span>

        </div>

      </div>

    </section>

  </section>

</div>



  </section>

</div>


<!-- FAQ -->
<div class="article-container-layer">
    <section class="faq-section">

       <!-- Replace your current H1 with this -->
<h1>Understanding Your Network: A Guide to Internet Performance</h1>
       <div class="faq-block" id="what-is-speed-test" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">What exactly does an internet speed test measure?</h3>
    
    <div class="faq-body" >
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            When you run a connection test, you aren't just getting a random number. You are seeing a snapshot of your network's <span class="highlight-yellow">current throughput capacity</span>. Think of your internet connection like a highway; the test measures how many cars (data packets) can travel back and forth in a given second.
        </p>

        <div style="background: #f8fafc; padding: 20px; border-radius: 8px; border-left: 4px solid #f59e0b;">
            <p style="margin: 0; font-size: 0.95rem; color: #475569;">
                <strong>The "Big Three" metrics explained:</strong>
                <ul style="margin: 10px 0 0 20px;">
                    <li><strong>Download:</strong> The speed at which you pull data from the web (streaming, downloading files).</li>
                    <li><strong>Upload:</strong> The speed at which you push data out (video calls, uploading to the cloud).</li>
                    <li><strong>Ping (Latency):</strong> How fast your device gets a response from the server (critical for gaming).</li>
                </ul>
            </p>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-top: 16px; font-size: 1rem;">
            Understanding these metrics helps you troubleshoot why your <a href="<?= BASE_URL ?>/guides/troubleshooting-slow-internet" style="color: #2563eb; text-decoration: underline;">home network might be lagging</a> during peak hours. If your ping is high, it doesn't matter how fast your download speed is—your connection will feel unresponsive.
        </p>
    </div>
</div>



<div class="faq-block" id="why-slow-than-isp" >
    <h3 class="faq-question">Why is my speed test result lower than what my ISP promised?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            Seeing a lower number on your screen than what you see on your monthly bill can be incredibly frustrating. However, in the world of telecommunications, those advertised speeds are almost always <span class="highlight-yellow">"best-case scenario"</span> figures.
        </p>

        <!-- New design utilizing a simple list class -->
        <ul class="comparison-list">
            <li><strong>Congestion:</strong> Just like a highway, your neighborhood shares local network bandwidth; if everyone is streaming at 8 PM, your speed may drop.</li>
            <li><strong>Hardware Gaps:</strong> An older router may not be capable of handling the high-speed fiber or cable connection you are paying for.</li>
            <li><strong>Wi-Fi Interference:</strong> Physical walls, electronic devices, and even distance from your router degrade signal quality significantly.</li>
        </ul>

        <p class="faq-answer">
            Before calling your Internet Service Provider, try running a test via a wired Ethernet connection. If the speed jumps significantly, the issue is likely your Wi-Fi setup rather than the service entering your home. You can learn more about <a href="<?= BASE_URL ?>/guides/optimize-wifi-signal" class="external-link">optimizing your home network</a> to get closer to the speeds you deserve.
        </p>
    </div>
</div>



<div class="faq-block" id="vpn-effect-on-speed">
    <h3 class="faq-question">Does using a VPN affect my internet speed test results?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            Many users wonder why their connection feels slower while their privacy is protected. The reality is that a <span class="highlight-yellow">VPN introduces a necessary trade-off between security and raw speed.</span> 
        </p>

        <!-- New design: A simple callout box -->
        <div class="info-box-styled">
            <p><strong>Why the slowdown occurs:</strong></p>
            <p>Your data is being encrypted on your device, sent to a remote VPN server, decrypted, and then sent to the final destination. This extra encryption work and the physical distance to the VPN server are the primary causes of speed loss.</p>
        </div>

        <p class="faq-answer">
            If you need to get an accurate reading of what your ISP is actually providing, always disconnect your VPN before running the test. If you are curious about how your privacy tools impact your browsing experience, check out our <a href="<?= BASE_URL ?>/guides/vpn-performance-tips" class="external-link">guide on choosing the fastest VPN protocols</a> for your daily needs.
        </p>
    </div>
</div>


<div class="faq-block" id="what-is-good-speed">
    <h3 class="faq-question">What is a 'good' speed for streaming, gaming, and working from home?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            "Good" is relative to your household's digital habits. While an average user might be fine with 25 Mbps, a busy household with multiple 4K streams and active gamers will feel the <span class="highlight-yellow">bottleneck of a slower connection</span> very quickly.
        </p>

        <!-- New design: A simple reference table -->
        <table class="speed-requirements-table">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Recommended Minimum</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>HD Streaming</td>
                    <td>5 Mbps</td>
                </tr>
                <tr>
                    <td>4K/UHD Streaming</td>
                    <td>25 Mbps</td>
                </tr>
                <tr>
                    <td>Online Gaming</td>
                    <td>3 Mbps (Low Ping is Key!)</td>
                </tr>
                <tr>
                    <td>Video Conferencing</td>
                    <td>10-20 Mbps</td>
                </tr>
            </tbody>
        </table>

        <p class="faq-answer">
            Keep in mind that these are per-device requirements. If you have five people in your home, you need to add these numbers up to get an idea of your total bandwidth needs. Need to see how your current setup holds up? Run our <a href="<?= BASE_URL ?>/speed-test" class="external-link">internet speed test</a> to check your real-world capacity, or read more about <a href="<?= BASE_URL ?>/guides/bandwidth-management" class="external-link">managing household bandwidth</a>.
        </p>
    </div>
</div>




   <div class="faq-block" id="frequency-of-testing">
    <h3 class="faq-question">How often should I run an internet speed test?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            You don't need to become obsessed with your connection stats, but running a quick check periodically is a great way to <span class="highlight-yellow">ensure your ISP is delivering the value you pay for each month.</span>
        </p>

        <!-- New design: A 'Pro-Tip' style box -->
        <div class="pro-tip-box">
            <p><strong>When to test:</strong></p>
            <ul>
                <li><strong>Monthly Baseline:</strong> A quick test once every 30 days gives you a good sense of your average performance.</li>
                <li><strong>During Performance Dips:</strong> If a video call suddenly drops or a file download stalls, run a test immediately to see if the connection is the culprit.</li>
                <li><strong>After Hardware Changes:</strong> Always test after upgrading your router or modem to verify that your new gear is correctly configured.</li>
            </ul>
        </div>

        <p class="faq-answer">
            Remember, a single test is just one data point. If you suspect an issue, run a few tests at different times of the day—especially during peak usage hours—to get a clearer picture. For deep dives into connection quality, check out our <a href="<?= BASE_URL ?>/guides/troubleshooting-guide" class="external-link">advanced network troubleshooting guide</a>.
        </p>
    </div>
</div>


<div class="faq-block" id="browser-impact-speed">
    <h3 class="faq-question">Does the browser I use affect my internet speed test results?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            While modern browsers are highly efficient, they are not all created equal when it comes to stress-testing your connection. A browser cluttered with <span class="highlight-yellow">memory-heavy extensions</span> or one that is outdated can often act as a bottleneck during a high-speed test.
        </p>

        <!-- New design: A 'Warning/Advice' note -->
        <div class="warning-box">
            <p><strong>Optimize your browser for the best test results:</strong></p>
            <ul>
                <li><strong>Clear the Cache:</strong> Sometimes outdated temporary files can interfere with the browser's ability to communicate with the speed test server.</li>
                <li><strong>Disable Extensions:</strong> Ad-blockers, VPN extensions, or heavy toolbars can consume bandwidth and processing power during the test.</li>
                <li><strong>Incognito Mode:</strong> Running the test in an Incognito/Private window is a great way to ensure no extensions are interfering with your results.</li>
            </ul>
        </div>

        <p class="faq-answer">
            If you are seeing drastically different results between two different browsers, it is almost certainly a client-side issue rather than a change in your internet service. If you are serious about diagnostics, our <a href="<?= BASE_URL ?>/guides/browser-optimization" class="external-link">browser performance guide</a> offers more tips on how to keep your web environment lean and fast.
        </p>
    </div>
</div>


<div class="faq-block" id="high-speed-but-slow-feeling">
    <h3 class="faq-question">Why does my connection feel slow even when the results are high?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            It is a common scenario: your metrics look great, but opening a simple webpage takes forever. When this happens, you aren't dealing with a lack of <span class="highlight-yellow">raw bandwidth</span>—you are dealing with a breakdown in how your device talks to the web.
        </p>

        <!-- New design: A 'Root Causes' visual list -->
        <div class="root-cause-grid">
            <div class="cause-item">
                <strong>DNS Bottlenecks:</strong> If your DNS (the phonebook of the internet) is slow to resolve, your browser sits idle waiting for the address of the site you want to visit.
            </div>
            <div class="cause-item">
                <strong>Packet Loss:</strong> Even if your connection is fast, losing bits of data during transmission forces your computer to re-request them, creating noticeable stuttering.
            </div>
            <div class="cause-item">
                <strong>Bufferbloat:</strong> Your router might be overwhelmed by too many simultaneous connections, causing data to queue up and wait behind the scenes.
            </div>
        </div>

        <p class="faq-answer">
            If you want to move beyond basic metrics, explore our <a href="<?= BASE_URL ?>/guides/advanced-network-diagnostics" class="external-link">advanced diagnostics suite</a> to see if you are suffering from DNS lag or jitter rather than a genuine service limitation.
        </p>
    </div>
</div>


<div class="faq-block" id="what-is-bufferbloat">
    <h3 class="faq-question">What is 'Bufferbloat' and why does it ruin my gaming experience?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            You might have a massive data pipe, but if your router is poorly managed, you could still suffer from <span class="highlight-yellow">Bufferbloat</span>. It is one of the most overlooked causes of "lag" for gamers.
        </p>

        <!-- New design: Step-by-step process visualization -->
        <div class="step-process-container">
            <div class="step-item">
                <strong>1. Overload:</strong> Your network is flooded with traffic (e.g., a large background update).
            </div>
            <div class="step-item">
                <strong>2. The Queue:</strong> Instead of discarding packets, your router buffers them in a growing queue.
            </div>
            <div class="step-item">
                <strong>3. The Lag Spike:</strong> Your gaming data gets stuck waiting in line behind that background update, causing your ping to skyrocket instantly.
            </div>
        </div>

        <p class="faq-answer">
            To combat this, look for routers that support <strong>Smart Queue Management (SQM)</strong> or <strong>Quality of Service (QoS)</strong> settings. These features allow you to prioritize gaming traffic over file downloads. If you are curious about your network's health, our <a href="<?= BASE_URL ?>/guides/bufferbloat-test" class="external-link">Bufferbloat diagnostic tool</a> can help you identify if your equipment is holding you back.
        </p>
    </div>
</div>


</section>
</div>


<?php require __DIR__ . '/../../app/templates/footer.php'; ?>
<script src="<?= BASE_URL ?>/assets/js/librespeed-core.js"></script>
<script src="<?= BASE_URL ?>/assets/js/internet-speed-test.js"></script>
<script src="<?= BASE_URL ?>/assets/js/navbar.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="<?= BASE_URL ?>/assets/js/footer-accordion.js"></script>
</body>
</html>