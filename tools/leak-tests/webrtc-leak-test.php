<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PrivacyTestLab/app/config.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
}

$pageTitle = "WebRTC Leak Test: Check if Your VPN is Actually Hiding Your IP";
$pageDescription = "Perform a real-time WebRTC leak test to see if your browser is revealing your true IP address. Ensure your privacy and verify your VPN connection is secure.";

$pageUrl = BASE_URL . "/tools/leak-tests/webrtc-leak-test.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<title><?= htmlspecialchars($pageTitle) ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">

<meta name="robots" content="index, follow, max-image-preview:large">

<meta name="author" content="PrivacyTestLab">

<meta name="theme-color" content="#111827">

<link rel="canonical" href="<?= htmlspecialchars($pageUrl) ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
<meta property="og:url" content="<?= htmlspecialchars($pageUrl) ?>">
<meta property="og:site_name" content="PrivacyTestLab">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($pageDescription) ?>">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/layout.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/tools/webrtc-leak-test.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/articles.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "PrivacyTestLab WebRTC Leak Test",
  "url": "<?= htmlspecialchars($pageUrl) ?>",
  "applicationCategory": "SecurityApplication",
  "operatingSystem": "Any",
  "browserRequirements": "Requires JavaScript enabled",
  "description": "Real-time WebRTC leak testing tool that checks whether your browser exposes your real IP address while using a VPN or proxy.",
  "publisher": {
    "@type": "Organization",
    "name": "PrivacyTestLab",
    "url": "<?= BASE_URL ?>"
  },
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [

    {
      "@type": "Question",
      "name": "What is a WebRTC leak and why does it compromise my privacy?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A WebRTC leak occurs when your web browser bypasses your VPN tunnel to reveal your real local or public IP address to the website you are visiting. Even if you are using a VPN, this browser vulnerability can expose your true location, rendering your privacy efforts ineffective."
      }
    },

    {
  "@type": "Question",
  "name": "Does using a VPN automatically protect me from WebRTC leaks?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Not necessarily. While a VPN encrypts your traffic, WebRTC can still function outside that tunnel by querying your network interfaces directly. If your browser is not configured correctly, it may provide your ISP-assigned IP to the website even while your VPN is active, resulting in a 'leak' that exposes your real identity."
  }
 },

   {
  "@type": "Question",
  "name": "How do I disable WebRTC in my browser?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Disabling WebRTC depends on your browser. In Firefox, you can toggle 'media.peerconnection.enabled' to 'false' in the advanced configuration. In Chrome or Edge, you typically need to install a privacy extension like 'WebRTC Leak Prevent' or 'uBlock Origin,' as these browsers do not provide a native 'off' switch for this feature."
  }
 },

    {
  "@type": "Question",
  "name": "What is the difference between a Local IP and a Public IP leak?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "A Public IP leak reveals your actual internet-facing address, which is tied to your physical location and ISP. A Local IP leak reveals your device's internal address within your home network (like 192.168.x.x). While a Public IP leak is a major privacy threat, a Local IP leak provides internal network information that can be used for local device fingerprinting."
  }
 },

 {
  "@type": "Question",
  "name": "Are mobile browsers (Chrome/Safari) susceptible to WebRTC leaks?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Yes, mobile browsers on both Android and iOS are just as susceptible to WebRTC leaks as desktop browsers. Because mobile platforms often have limited support for privacy extensions and fewer native settings to disable WebRTC, they can be even harder to secure. Using a reputable VPN with built-in WebRTC leak protection is the most effective way to secure mobile devices."
  }
 },

 {
  "@type": "Question",
  "name": "Can websites detect my VPN provider through WebRTC?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Yes, they can. WebRTC can reveal the STUN server addresses or the IP range being used, which websites often correlate with known VPN provider IP blocks. Even if the WebRTC leak doesn't reveal your true home IP, it can leak metadata about your connection source, helping websites identify that you are using a VPN or a proxy service."
  }
 },

 {
  "@type": "Question",
  "name": "What are ICE candidates and why are they involved in leaks?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "ICE (Interactive Connectivity Establishment) candidates are a list of network configurations (like your IP address and port) that your browser generates to establish a direct connection with another device. WebRTC uses these to find the shortest path for communication. If these candidates are generated via your local hardware, they can inadvertently contain your private IP addresses, which are then passed to the website—leading to an IP leak."
  }
 },

 {
  "@type": "Question",
  "name": "Should I use a browser extension to block WebRTC?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Using a dedicated browser extension is often the most effective way to manage WebRTC for average users. While extensions add a layer of software to your browser, they offer granular control—allowing you to toggle WebRTC off globally, per-site, or only for specific IP types, which provides better security than native browser settings alone."
  }
 },

 {
  "@type": "Question",
  "name": "Does clearing my browser cache stop a leak?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "No, clearing your browser cache does not stop a WebRTC leak. A cache stores temporary files like images and scripts, while a WebRTC leak is a fundamental network request behavior triggered by the browser's real-time communication engine. Clearing your cache does not change how your browser handles network routing or ICE candidates."
  }
 },

 {
  "@type": "Question",
  "name": "Which browser is best for protecting against WebRTC leaks?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "There is no single 'perfect' browser, but Brave and Firefox are top recommendations. Brave offers strong, built-in privacy protections that block WebRTC leaks by default for most users. Firefox is the best choice for power users who want to manually configure their network settings via 'about:config'. For maximum anonymity, the Tor Browser is the gold standard as it disables WebRTC entirely."
  }
 },

 {
  "@type": "Question",
  "name": "How do I choose a VPN that actually stops WebRTC leaks?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "When choosing a VPN for WebRTC protection, look for providers that offer built-in 'WebRTC Leak Protection' in their desktop or mobile applications. Avoid 'free' VPNs which often lack these advanced security features. The best VPNs will force all browser traffic, including WebRTC requests, through their encrypted tunnel, preventing the browser from exposing your real IP to the websites you visit."
  }
 },

 {
  "@type": "Question",
  "name": "Is it possible to use WebRTC safely for work meetings?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Yes, you can use WebRTC safely for work meetings by utilizing 'Contextual Browsing.' Instead of disabling WebRTC globally, use a dedicated, separate browser profile or application specifically for video conferencing. This keeps your professional communication needs isolated from your private browsing activity, ensuring that your primary, high-privacy browser remains hardened against leaks."
  }
 }

  ]
}
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2835282326763517"
     crossorigin="anonymous"></script>
</head>

<body>

<?php require __DIR__ . '/../../app/templates/header.php'; ?>

<main class="webrtc-clean">

<div class="webrtc-header">

  <h1>WebRTC Leak Test</h1>

  <p class="webrtc-subtitle">
    Check whether your browser exposes your real IP address,
    local network details, or IPv6 information through WebRTC.
  </p>

</div>

<div class="table">

  <div class="section-title">Your Remote IP :</div>

  <div class="row">
    <div class="label">IPv4 Address</div>
    <div class="value" id="ipv4">Detecting...</div>
  </div>

  <div class="row">
    <div class="label">IPv6 Address</div>
    <div class="value" id="ipv6">Detecting...</div>
  </div>

  <div class="section-title">WebRTC Support Detection :</div>

  <div class="row">
    <div class="label">RTCPeerConnection</div>
    <div class="value" id="rtc-peer"></div>
  </div>

  <div class="row">
    <div class="label">RTCDataChannel</div>
    <div class="value" id="rtc-data"></div>
  </div>

  <div class="section-title">Your WebRTC IP :</div>

  <div class="row">
    <div class="label">WebRTC Leak Test</div>
    <div class="value" id="leak-status"></div>
  </div>

  <div class="row">
    <div class="label">Local IP Address</div>
    <div class="value" id="local-ip">-</div>
  </div>

  <div class="row">
    <div class="label">Public IP Address</div>
    <div class="value" id="public-ip">-</div>
  </div>

  <div class="section-title">Session Description :</div>

  <div class="row full">
    <div class="label">SDP Log</div>
    <div class="value">
      <textarea id="sdp-log" readonly></textarea>
    </div>
  </div>

  <div class="section-title">Media Devices :</div>

  <div class="row">
    <div class="label">API Support</div>
    <div class="value" id="media-support"></div>
  </div>

  <div class="row">
    <div class="label">Audio Permissions</div>
    <div class="value">
      <button onclick="requestAudio()">Check</button>
      <span id="audio-status"></span>
    </div>
  </div>

  <div class="row">
    <div class="label">Video Permissions</div>
    <div class="value">
      <button onclick="requestVideo()">Check</button>
      <span id="video-status"></span>
    </div>
  </div>

  <div class="row full">
    <div class="label">Media Devices</div>
    <div class="value" id="devices"></div>
  </div>

</div>



<!-- FAQ -->
<div class="article-container-layer">
    <section class="faq-section">
        <h1 class="article-main-title">Understanding WebRTC Leaks: Is Your VPN Truly Secure?</h1>

        <div class="faq-block" id="what-is-webrtc-leak">
            <h3 class="faq-question">What is a WebRTC leak and why does it compromise my privacy?</h3>
            
            <div class="faq-body">
                <p class="faq-answer">
                    WebRTC (Web Real-Time Communication) is a powerful technology that allows browsers to communicate directly with each other for things like video calls and file sharing. However, because it needs to know your actual network path to connect, it often requests your <span class="highlight-yellow">true IP address</span> directly from your hardware.
                </p>

                <div class="process-box" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 20px; border-radius: 8px; margin: 20px 0;">
                    <p style="margin: 0 0 10px 0;"><strong>The Privacy Breakdown:</strong></p>
                    <ol style="padding-left: 20px; margin: 0; color: #475569;">
                        <li><strong>Standard Request:</strong> You visit a site that uses WebRTC scripts.</li>
                        <li><strong>The Bypass:</strong> The script asks your browser for your network identity.</li>
                        <li><strong>The Leak:</strong> Your browser, ignoring your active VPN tunnel, reports your actual ISP IP back to the website.</li>
                    </ol>
                </div>

                <p class="faq-answer">
                    The reason this is dangerous is that websites can log this IP address silently, even if you are using a proxy or a VPN to mask your identity. If you are serious about anonymity, you must confirm that your browser configuration is <a href="<?= BASE_URL ?>/guides/prevent-webrtc-leaks" class="external-link">blocking these requests properly</a>. 
                </p>
            </div>
        </div>
        
       
    <!-- ================================================= -->
<div class="faq-block" id="vpn-protection-webrtc">
    <h3 class="faq-question">Does using a VPN automatically protect me from WebRTC leaks?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            It is a common misconception that a VPN is a "magic shield." Because WebRTC is designed to optimize direct connections for things like video conferencing, it often <span class="highlight-yellow">prioritizes hardware interfaces over software tunnels</span>.
        </p>

        <div class="comparison-card" style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin: 24px 0; background-color: #fff;">
            <div style="display: flex; align-items: center; margin-bottom: 12px;">
                <span style="color: #ef4444; font-size: 1.5rem; margin-right: 10px;">✖</span>
                <strong>The VPN Fallacy:</strong>
                <p style="margin-left: 10px; color: #475569;">Assuming that because your traffic is encrypted, your identity is also hidden.</p>
            </div>
            <div style="display: flex; align-items: center;">
                <span style="color: #10b981; font-size: 1.5rem; margin-right: 10px;">✔</span>
                <strong>The Reality:</strong>
                <p style="margin-left: 10px; color: #475569;">WebRTC scripts can probe your system for a 'direct path' that exists outside the VPN tunnel, effectively bypassing the encryption.</p>
            </div>
        </div>

        <p class="faq-answer">
            Think of the VPN like an armored car transporting your data. WebRTC is like a courier that decides to take a shortcut through a side alleyway that the armored car doesn't go through. To be safe, you need to ensure your browser is configured to route WebRTC traffic through your proxy or disable it entirely. If you want to verify your current security posture, run our <a href="<?= BASE_URL ?>/webrtc-leak-test" class="external-link">live WebRTC leak test</a> to see if your browser is currently "leaking" your true location.
        </p>
    </div>
</div>
    <!-- ================================================= -->

    <div class="faq-block" id="how-to-disable-webrtc">
    <h3 class="faq-question">How do I disable WebRTC in my browser?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            If you have verified that your browser is leaking your IP, the most definitive solution is to <span class="highlight-yellow">disable the protocol entirely</span>. While this may break some niche video chat or file-sharing websites, it creates a much tighter security footprint for your daily browsing.
        </p>

        <!-- New Design: Step-by-Step Checklist -->
        <div class="step-checklist" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 20px; margin: 24px 0;">
            <h4 style="margin-top: 0; color: #0f172a;">Quick Setup Guide:</h4>
            
            <div style="margin-bottom: 12px;">
                <input type="checkbox" id="step1" disabled>
                <label for="step1"> <strong>Firefox:</strong> Type <code>about:config</code> in your address bar, search for <code>media.peerconnection.enabled</code>, and set it to <strong>false</strong>.</label>
            </div>
            
            <div style="margin-bottom: 12px;">
                <input type="checkbox" id="step2" disabled>
                <label for="step2"> <strong>Chrome/Edge:</strong> These browsers lack a native toggle. Install a trusted extension like <em>uBlock Origin</em> and enable the "Prevent WebRTC from leaking local IP addresses" setting.</label>
            </div>
            
            <div>
                <input type="checkbox" id="step3" disabled>
                <label for="step3"> <strong>Validation:</strong> After making changes, always restart your browser and run a fresh <a href="<?= BASE_URL ?>/webrtc-leak-test" class="external-link">leak test</a> to verify the new settings.</label>
            </div>
        </div>

        <p class="faq-answer">
            Remember that modern websites are constantly changing their code. Disabling these features is a "set and forget" security measure, but it is always good practice to re-test your browser after major updates or if you install new security plugins.
        </p>
    </div>
</div>




<div class="faq-block" id="best-browser-for-webrtc" style="max-width: 900px; margin: 40px auto; font-family: sans-serif; color: #1e293b;">
    <h3 style="font-size: 1.8rem; margin-bottom: 20px;">Which browser is best for protecting against WebRTC leaks?</h3>
    
    <div class="faq-body">
        <p style="font-size: 1rem; line-height: 1.6; color: #475569; margin-bottom: 24px;">
            Choosing the right browser is about balancing daily utility with maximum privacy. Here are the top performers:
        </p>

        <!-- Professional Browser Cards Container -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 30px;">
            
            <!-- Brave Card -->
            <a href="https://brave.com" target="_blank" style="text-decoration: none; color: inherit; background: #ffffff; border: 1px solid #e2e8f0; padding: 24px; border-radius: 12px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <div style="font-size: 2.5rem; color: #f64e32; margin-bottom: 15px;"><wa-icon name="brave" family="brands"></wa-icon></div>
                <strong style="display: block; font-size: 1.2rem; margin-bottom: 10px;">Brave (Easiest)</strong>
                <p style="font-size: 0.95rem; line-height: 1.5; color: #64748b; margin: 0;">
                    Built on Chromium, it includes <strong>Brave Shields</strong> which handle WebRTC risks automatically. No manual setup required.
                </p>
            </a>

            <!-- Firefox Card -->
            <a href="https://www.mozilla.org/firefox/" target="_blank" style="text-decoration: none; color: inherit; background: #ffffff; border: 1px solid #e2e8f0; padding: 24px; border-radius: 12px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <div style="font-size: 2.5rem; color: #ff7139; margin-bottom: 15px;"><i class="fa-brands fa-firefox-browser"></i></div>
                <strong style="display: block; font-size: 1.2rem; margin-bottom: 10px;">Firefox (Customizable)</strong>
                <p style="font-size: 0.95rem; line-height: 1.5; color: #64748b; margin: 0;">
                    The power user’s choice. Use <code>about:config</code> to toggle <code>media.peerconnection.enabled</code> for total control.
                </p>
            </a>
        </div>

        <!-- Strategy Box -->
        <div style="background: #f8fafc; border-left: 5px solid #64748b; padding: 20px; margin-bottom: 24px; border-radius: 0 8px 8px 0;">
            <p style="margin: 0; font-size: 0.95rem; line-height: 1.6;">
                <strong>💡 The "Contextual Browsing" Strategy:</strong> Maintain two profiles: a "hardened" browser for private searching and a standard browser (like Chrome or Edge) only for work-related calls that require WebRTC.
            </p>
        </div>

        <p style="font-size: 1rem; line-height: 1.6;">
            Verify your security by running a test on our <a href="<?= BASE_URL ?>/webrtc-leak-test" style="color: #2563eb; font-weight: bold; text-decoration: none;">WebRTC leak detector</a> to confirm your chosen browser is configured correctly.
        </p>
    </div>
</div>


<div class="faq-block" id="choosing-vpn-for-webrtc" style="max-width: 900px; margin: 40px auto; font-family: sans-serif; color: #1e293b;">
    <h3 style="font-size: 1.8rem; margin-bottom: 20px;">How do I choose a VPN that actually stops WebRTC leaks?</h3>
    
    <div class="faq-body">
        <p style="font-size: 1rem; line-height: 1.6; color: #475569; margin-bottom: 24px;">
            Not all VPNs are created equal. Many entry-level services focus only on masking your main traffic, leaving "side-channel" leaks like WebRTC wide open.
        </p>

        <!-- Feature Checklist -->
        <div style="background: #ffffff; border: 1px solid #e2e8f0; padding: 24px; border-radius: 12px; margin: 24px 0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
            <strong style="display: block; margin-bottom: 16px; color: #0f172a; font-size: 1.1rem;">Look for these 3 features before subscribing:</strong>
            
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 16px; display: flex; align-items: flex-start;">
                    <div style="color: #22c55e; margin-right: 15px; font-size: 1.2rem;"><i class="fa-solid fa-shield-halved"></i></div>
                    <div>
                        <strong style="display: block;">Native WebRTC Protection:</strong> 
                        <span style="color: #64748b;">Check for an explicit "WebRTC Leak Protection" toggle in the app settings.</span>
                    </div>
                </li>
                <li style="margin-bottom: 16px; display: flex; align-items: flex-start;">
                    <div style="color: #3b82f6; margin-right: 15px; font-size: 1.2rem;"><i class="fa-solid fa-network-wired"></i></div>
                    <div>
                        <strong style="display: block;">Full Tunneling Protocol:</strong> 
                        <span style="color: #64748b;">Modern protocols like WireGuard or OpenVPN are essential to prevent metadata leaks.</span>
                    </div>
                </li>
                <li style="display: flex; align-items: flex-start;">
                    <div style="color: #8b5cf6; margin-right: 15px; font-size: 1.2rem;"><i class="fa-solid fa-file-contract"></i></div>
                    <div>
                        <strong style="display: block;">Independent Audit Reports:</strong> 
                        <span style="color: #64748b;">Trustworthy providers publish third-party audits confirming they actually block leaks.</span>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Warning Box -->
        <div style="background: #fef2f2; border-left: 5px solid #ef4444; padding: 20px; margin: 24px 0; border-radius: 0 8px 8px 0;">
            <div style="display: flex; align-items: center; color: #991b1b; margin-bottom: 8px;">
                <i class="fa-solid fa-triangle-exclamation" style="margin-right: 10px;"></i>
                <strong style="font-size: 1rem;">The "Hard Truth" about Free VPNs</strong>
            </div>
            <p style="margin: 0; font-size: 0.95rem; color: #7f1d1d; line-height: 1.5;">
                Be extremely cautious with "free" services. Many monetize through tracking, and they often lack the resources to maintain high-quality WebRTC leak protection, making them a privacy liability.
            </p>
        </div>

        <p style="font-size: 1rem; line-height: 1.6;">
            After connecting, <strong>validate your results.</strong> Connect to your VPN, restart your browser, and run a test on our 
            <a href="<?= BASE_URL ?>/webrtc-leak-test" style="color: #2563eb; font-weight: bold; text-decoration: none;">WebRTC leak detector</a> 
            to confirm your true IP is hidden.
        </p>
    </div>
</div>






    <!-- ================================================= -->

    <div class="faq-block" id="local-vs-public-ip">
    <h3 class="faq-question">What is the difference between a Local IP and a Public IP leak?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            Understanding the distinction between these two metrics is essential for interpreting your privacy test results accurately. While both are "IP addresses," they hold vastly different weights in terms of security risks.
        </p>

        <!-- New Design: Side-by-side definition grid -->
        <div class="comparison-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin: 24px 0;">
            
            <div style="background: #f1f5f9; padding: 16px; border-radius: 8px;">
                <strong style="color: #0f172a; display: block; margin-bottom: 8px;">🌍 Public IP</strong>
                <p style="font-size: 0.9rem; color: #475569; margin: 0;">
                    Your direct gateway to the web. If this leaks, websites know your <span class="highlight-yellow">exact geographical region and ISP</span>. This is the primary target for privacy-focused users.
                </p>
            </div>

            <div style="background: #f1f5f9; padding: 16px; border-radius: 8px;">
                <strong style="color: #0f172a; display: block; margin-bottom: 8px;">🏠 Local IP</strong>
                <p style="font-size: 0.9rem; color: #475569; margin: 0;">
                    Your internal network tag (e.g., 192.168.x.x). Leaking this allows websites to <span class="highlight-yellow">fingerprint your device</span> and map your internal network architecture.
                </p>
            </div>
            
        </div>

        <p class="faq-answer">
            If you are running a VPN and you see your "Public IP" change but your "Local IP" still appears, you are likely not experiencing a critical breach, but rather a standard browser-to-router communication. However, if your <strong>Public IP</strong> reveals your real home ISP address while the VPN is active, that is a confirmed security failure. Always verify your results against our <a href="<?= BASE_URL ?>/webrtc-leak-test" class="external-link">leak detection engine</a> to see which address is being flagged.
        </p>
    </div>
</div>

    <!-- ================================================= -->

    <div class="faq-block" id="mobile-webrtc-risks">
    <h3 class="faq-question">Are mobile browsers (Chrome/Safari) susceptible to WebRTC leaks?</h3>
    
    <div class="faq-body">
        
        <div style="background: #fffbeb; border-left: 4px solid #f59e0b; padding: 20px; border-radius: 4px; margin: 24px 0;">
            <p style="margin: 0; font-weight: 700; color: #92400e; margin-bottom: 8px;">⚠️ Critical Mobile Privacy Note:</p>
            <p style="margin: 0; font-size: 0.95rem; color: #78350f; line-height: 1.6;">
                Mobile browsers are not "safer" by default. In fact, many mobile versions of Chrome and Safari lack the advanced configuration menus found on desktop, making them <strong>more difficult to manually harden</strong> against WebRTC leaks.
            </p>
        </div>

        <p class="faq-answer">
            Whether you are on Android or iOS, your browser supports the same WebRTC APIs as desktop platforms. This means that if you visit a site designed to trigger an IP leak, your mobile device will behave identically to your desktop: it will attempt to contact STUN servers and broadcast your real IP address if not properly intercepted.
        </p>

        <p class="faq-answer">
            <strong>The Mobile Challenge:</strong>
            <ul style="padding-left: 20px; color: #475569; line-height: 1.7;">
                <li><strong>Limited Extensions:</strong> Many mobile browsers do not allow the same powerful privacy extensions (like uBlock Origin or WebRTC Control) that desktop users rely on.</li>
                <li><strong>OS-Level Routing:</strong> Because you cannot easily "tweak" browser flags on mobile, your primary defense must be a <strong>system-wide VPN</strong>. If the VPN app is not configured to force all traffic—including WebRTC—through its tunnel, the leak will bypass your protection silently.</li>
            </ul>
        </p>

        <p class="faq-answer">
            Don't assume your phone is private just because it's a mobile device. Always run a check on our <a href="<?= BASE_URL ?>/webrtc-leak-test" class="external-link">mobile-optimized leak test</a> while connected to your VPN to see if your mobile browser is actually keeping your IP hidden.
        </p>
    </div>
</div>

    <!-- ================================================= -->
<div class="faq-block" id="can-websites-detect-vpn">
    <h3 class="faq-question">Can websites detect my VPN provider through WebRTC?</h3>
    
    <div class="faq-body">
        
        <div style="background: #f8fafc; border: 1px solid #cbd5e1; padding: 20px; border-radius: 8px; margin: 24px 0;">
            <div style="display: flex; align-items: flex-start; gap: 12px; margin-bottom: 12px;">
                <span style="font-size: 1.5rem;">🔍</span>
                <div>
                    <h4 style="margin: 0; color: #1e293b;">The Context of Connection</h4>
                    <p style="margin: 4px 0 0 0; font-size: 0.9rem; color: #64748b;">
                        WebRTC doesn't just leak IPs; it leaks <strong>ICE candidate metadata</strong>. 
                    </p>
                </div>
            </div>
            <p style="margin: 0; font-size: 0.95rem; color: #334155; line-height: 1.6;">
                When a website queries your WebRTC configuration, the response can include details about the network architecture—specifically the STUN servers being used. If a VPN provider uses a unique or shared STUN server, the website can identify the specific provider or the "data center" nature of the connection, marking you as a VPN user instantly.
            </p>
        </div>

        <p class="faq-answer">
            This is why many streaming platforms and banking sites can block you even if you *are* using a VPN. They aren't always looking for your home IP; they are looking for the <span class="highlight-yellow">"fingerprint" of the VPN service</span>. 
        </p>

        <p class="faq-answer">
            <strong>What to look for:</strong>
            <ul style="padding-left: 20px; color: #475569; line-height: 1.7;">
                <li><strong>Shared STUN Servers:</strong> If your VPN uses generic public STUN servers, you might be safer from fingerprinting.</li>
                <li><strong>Dedicated IP:</strong> Some providers offer "Dedicated IPs," which are less likely to be flagged as "VPN/Data Center" traffic compared to shared IPs.</li>
            </ul>
        </p>

        <p class="faq-answer">
            To see exactly what a website "sees" when it queries your connection, our <a href="<?= BASE_URL ?>/webrtc-leak-test" class="external-link">WebRTC inspection tool</a> breaks down the metadata your browser is broadcasting. 
        </p>
    </div>
</div>

    <!-- ================================================= -->

   <div class="faq-block" id="what-are-ice-candidates">
    <h3 class="faq-question">What are ICE candidates and why are they involved in leaks?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            To make real-time communication possible, your browser needs a way to find other devices on the internet. It does this by creating a list of potential connection paths called <strong>ICE Candidates</strong>. 
        </p>

        <div style="background: #0f172a; color: #f8fafc; padding: 20px; border-radius: 8px; margin: 24px 0;">
            <h4 style="margin: 0 0 12px 0; color: #f59e0b; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">The Anatomy of an ICE Candidate</h4>
            <p style="margin: 0; font-size: 0.9rem; line-height: 1.6; color: #cbd5e1;">
                Each candidate string contains technical metadata: <strong>IP Address, Port, Protocol (UDP/TCP), and Type (Host, Server Reflexive, or Relay).</strong>
            </p>
            <code style="display: block; margin-top: 12px; background: #1e293b; padding: 10px; border-radius: 4px; font-size: 0.85rem; color: #e2e8f0;">
                candidate:1 1 UDP 2122260223 192.168.1.15 54321 typ host
            </code>
            <p style="margin: 12px 0 0 0; font-size: 0.85rem; color: #94a3b8;">
                When a <strong>"typ host"</strong> candidate is generated, it directly broadcasts your internal network IP. This is the smoking gun of a WebRTC leak.
            </p>
        </div>

        <p class="faq-answer">
            Think of these candidates like a business card that your browser hands out to every website you visit. If your browser isn't configured to filter these "cards," the website receives your internal network details immediately.
        </p>

        <p class="faq-answer">
            
        </p>

        <p class="faq-answer">
            Our <a href="<?= BASE_URL ?>/webrtc-leak-test" class="external-link">Advanced Leak Inspector</a> allows you to see the raw ICE candidates being generated by your browser in real-time. If you see strings containing your local `192.168.x.x` or your home ISP's IP address, your browser is actively broadcasting your private network footprint.
        </p>
    </div>
</div>

    <!-- ================================================= -->

    <div class="faq-block" id="should-i-use-webrtc-extension">
    <h3 class="faq-question">Should I use a browser extension to block WebRTC?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            For most users, relying on a reputable browser extension is the gold standard for WebRTC management. While some privacy purists prefer editing browser flags, extensions offer a balance of <strong>usability and security</strong> that native settings often lack.
        </p>

        <!-- New Design: Pros/Cons Comparison Table -->
        <table style="width: 100%; border-collapse: collapse; margin: 24px 0; background: #fff; border: 1px solid #e2e8f0; border-radius: 8px;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 12px; text-align: left;">Pros</th>
                    <th style="padding: 12px; text-align: left;">Cons</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #e2e8f0;"><strong>Granular Control:</strong> Block WebRTC only on specific sites that track you.</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e2e8f0;"><strong>Fingerprinting:</strong> Ironically, adding too many extensions can make your browser's "fingerprint" unique.</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #e2e8f0;"><strong>Ease of Use:</strong> One-click toggles that don't require deep system knowledge.</td>
                    <td style="padding: 12px; border-bottom: 1px solid #e2e8f0;"><strong>Dependency:</strong> You are trusting the extension developer to maintain the code securely.</td>
                </tr>
            </tbody>
        </table>

        <p class="faq-answer">
            <strong>My recommendation:</strong> Stick to open-source, community-audited extensions like <em>uBlock Origin</em>. They are well-maintained and include built-in WebRTC protection features, meaning you avoid the need to install a separate, potentially obscure "WebRTC blocker" that might contain its own telemetry or tracking risks.
        </p>

        <p class="faq-answer">
            Regardless of your choice, verify that the extension is working as intended. Run our <a href="<?= BASE_URL ?>/webrtc-leak-test" class="external-link">WebRTC leak detector</a> after installing any new privacy tool to confirm the "leak" status transitions from <em>Detected</em> to <em>Protected</em>.
        </p>
    </div>
</div>

    <!-- ================================================= -->

   <div class="faq-block" id="does-cache-stop-leak">
    <h3 class="faq-question">Does clearing my browser cache stop a leak?</h3>
    
    <div class="faq-body">
        <!-- New Design: Myth-Buster Box -->
        <div style="background: #fff1f2; border: 1px solid #fecaca; padding: 20px; border-radius: 8px; margin: 24px 0;">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <span style="font-size: 1.5rem;">🚫</span>
                <strong style="color: #9f1239; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 0.05em;">The Cache Myth</strong>
            </div>
            <p style="margin: 0; color: #881337; font-size: 0.95rem; line-height: 1.6;">
                Many users assume that clearing temporary storage will "reset" their browser's security footprint. However, <strong>WebRTC behavior is not a stored file</strong>—it is a live networking function. Clearing your cache only removes site-specific assets; it does absolutely nothing to alter the browser’s underlying network routing logic.
            </p>
        </div>

        <p class="faq-answer">
            To stop a leak, you must address the <strong>instructional behavior</strong> of the browser, not the data it has saved. If you are experiencing a leak, clearing your cache is a waste of time because the browser will simply re-initiate the same leaky network request the moment you visit a site with WebRTC scripts.
        </p>

        <p class="faq-answer">
            Instead of clearing your cache, focus on:
            <ul style="padding-left: 20px; color: #475569; line-height: 1.7;">
                <li><strong>Browser Configuration:</strong> Disabling the WebRTC peer-connection flag.</li>
                <li><strong>System-Wide Routing:</strong> Using a VPN that explicitly advertises "WebRTC Leak Protection" to force all traffic through a secure tunnel.</li>
                <li><strong>Privacy Audits:</strong> Regularly testing your browser configuration on our <a href="<?= BASE_URL ?>/webrtc-leak-test" class="external-link">leak detection lab</a>.</li>
            </ul>
        </p>
    </div>
</div>




<div class="faq-block" id="webrtc-for-work">
    <h3 class="faq-question">Is it possible to use WebRTC safely for work meetings?</h3>
    
    <div class="faq-body">
        <p class="faq-answer">
            Many users avoid privacy settings entirely because they fear "breaking" their work tools. The truth is that you can have both: <strong>maximum privacy for your personal life and full functionality for your professional meetings.</strong>
        </p>

        <!-- New Design: Strategy Callout -->
        <div style="background: #f0f9ff; border: 1px solid #bae6fd; padding: 20px; border-radius: 8px; margin: 24px 0;">
            <strong style="display: block; margin-bottom: 10px; color: #0369a1;">💡 The "Contextual Browsing" Strategy:</strong>
            <p style="margin: 0; font-size: 0.95rem; color: #0c4a6e; line-height: 1.6;">
                Don't try to force one browser to be both a "privacy vault" and a "collaboration hub." <strong>Keep them separate.</strong> Use a hardened browser (like Firefox with strict settings) for your private research, and a separate standard browser (like Chrome or a dedicated desktop app) for tools like Zoom, Teams, or Google Meet.
            </p>
        </div>

        <p class="faq-answer">
            <strong>Why this works:</strong>
            <ul style="padding-left: 20px; color: #475569; line-height: 1.7;">
                <li><strong>No Performance Trade-offs:</strong> You don't have to constantly toggle privacy extensions off when a meeting starts.</li>
                <li><strong>Reduced Fingerprinting:</strong> By keeping your professional and personal identities in different browser "containers," you limit the amount of cross-site tracking data that can be linked to your private profile.</li>
                <li><strong>Security Integrity:</strong> Your hardened private browser remains sealed tight, while your work browser handles the necessary WebRTC handshakes for your meetings.</li>
            </ul>
        </p>

        <p class="faq-answer">
            The goal of privacy is not to stop using the internet, but to <strong>control how you interact with it.</strong> By segregating your digital life, you can use WebRTC for the professional tools you need while maintaining an uncrackable perimeter for the private browsing you value.
        </p>
    </div>
</div>


 </section>
</div>

</main>

<?php require __DIR__ . '/../../app/templates/footer.php'; ?>

<script src="<?= BASE_URL ?>/assets/js/webrtc-leak-test.js"></script>
<script src="<?= BASE_URL ?>/assets/js/navbar.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="<?= BASE_URL ?>/assets/js/footer-accordion.js"></script>
</body>
</html>