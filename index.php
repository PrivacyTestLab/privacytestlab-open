<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PrivacyTestLab/app/config.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
}

$pageTitle = "PrivacyTestLab - Audit Your Digital Footprint & Leaks";

$pageDescription = "Audit your browser privacy in real time. Detect hidden WebRTC exposures, DNS leaks, browser fingerprinting flags, and test your security tunnels instantly.";
$pageUrl = BASE_URL . "/";

$pageImage = BASE_URL . "/assets/images/privacytestlab-cover.png";

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<title><?= htmlspecialchars($pageTitle) ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta
    name="description"
    content="<?= htmlspecialchars($pageDescription) ?>"
>

<meta name="robots" content="index, follow, max-image-preview:large">

<meta name="author" content="PrivacyTestLab">

<meta name="theme-color" content="#111827">

<link rel="canonical" href="<?= $pageUrl ?>">

<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
<meta property="og:url" content="<?= $pageUrl ?>">
<meta property="og:site_name" content="PrivacyTestLab">
<meta property="og:image" content="<?= $pageImage ?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($pageDescription) ?>">
<meta name="twitter:image" content="<?= $pageImage ?>">

<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Poppins:wght@400;600;700&display=swap"
    rel="stylesheet"
>



<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/layout.css?v=2">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css?v=2">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/tools.css?v=2">
<link rel="icon" href="/favicon.ico">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<link rel="manifest" href="/site.webmanifest" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "WebSite",
            "@id": "<?= BASE_URL ?>/#website",
            "url": "<?= BASE_URL ?>/",
            "name": "PrivacyTestLab",
            "alternateName": "Privacy Test Lab",
            "description": "Is your VPN actually working? Run live, browser-based diagnostics to check for silent DNS routing errors, WebRTC IP leaks, and advanced cookieless tracking flags.",
            "publisher": {
                "@id": "<?= BASE_URL ?>/#organization"
            },
            "potentialAction": {
                "@type": "SearchAction",
                "target": "<?= BASE_URL ?>/search?q={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        },
        {
            "@type": "Organization",
            "@id": "<?= BASE_URL ?>/#organization",
            "name": "PrivacyTestLab",
            "url": "<?= BASE_URL ?>/",
            "logo": "<?= BASE_URL ?>/favicon-96x96.png",
            "sameAs": []
        },
        {
            "@type": "SoftwareApplication",
            "@id": "<?= BASE_URL ?>/#application",
            "name": "PrivacyTestLab Browser Diagnostic Suite",
            "url": "<?= BASE_URL ?>/",
            "applicationCategory": "SecurityApplication",
            "applicationSubCategory": "Privacy Protection & Leak Detection Utilities",
            "operatingSystem": "Windows, macOS, Linux, Android, iOS",
            "browserRequirements": "Requires an HTML5-compatible modern web browser (including Google Chrome, Mozilla Firefox, Apple Safari, Microsoft Edge, or Brave Browser).",
            "description": "A browser-based client-side utility engineered to audit your digital footprint by analyzing system hardware fingerprints, tracking scripts, and real-time network configuration vulnerabilities.",
            "featureList": "WebRTC IP Leak Testing, Multi-Stage DNS Routing Infiltration Scan, Canvas & WebGL Fingerprinting Emulation, Local Storage Inspection, Client-Side Password Brute-Force Evaluation",
            "offers": {
                "@type": "Offer",
                "price": "0",
                "priceCurrency": "USD",
                "availability": "https://schema.org/InStock"
            },
            "author": {
                "@id": "<?= BASE_URL ?>/#organization"
            }
        }
    ]
}
</script>



<?php include __DIR__ . '/app/config/tracking.php'; ?>

</head>

<body>

<!-- HEADER -->
<?php require __DIR__ . '/app/templates/header.php'; ?>





<!-- HERO -->
<section class="hero">

    <div class="hero-bg"></div>

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <div class="hero-badge">
            Privacy Testing • Browser Security • Leak Detection
        </div>

        <h1>
            Test your online privacy in seconds
        </h1>

        <p>
            Detect privacy leaks, analyze browser fingerprinting,
            test VPN protection, and understand how websites
            track devices and network activity online.
        </p>

        <div class="hero-buttons">

            <a
                href="<?= BASE_URL ?>/tools/leak-tests/ip-leak-test.php"
                class="btn-primary"
            >
                Scan Your Browser
            </a>

            <a
                href="<?= BASE_URL ?>/pages/knowledge-base/index.php"
                class="btn-secondary"
            >
                Learn About Online Privacy
            </a>

        </div>

    </div>

</section>



<!-- STATUS + INFO -->
<section class="homepage-status-section">

    <div class="status-grid">

        <!-- IP ADDRESS -->
        <div class="status-card">

            <div class="status-top">

                <div class="status-label">
                    IP Address
                </div>

                <button
                class="status-info-btn"
                data-tooltip="Your public IP address visible to websites and online services.">

                   <i data-lucide="info"></i>

                </button>

            </div>

            <div class="status-value" id="ip-result">
                Detecting...
            </div>

            <div class="status-subtext" id="ip-subtext">
                Checking network...
            </div>

        </div>





        <!-- WEBRTC -->
        <div class="status-card">

            <div class="status-top">

                <div class="status-label">
                    WebRTC Status
                </div>

                <button
                class="status-info-btn"
                data-tooltip="WebRTC can sometimes expose local or VPN-bypassed IP addresses to websites.">

                    <i data-lucide="info"></i>

                </button>

            </div>

            <div class="status-value" id="webrtc-result">
                Analyzing...
            </div>

            <div class="status-subtext">
                Real-time browser test
            </div>

        </div>





        <!-- DNS -->
        <div class="status-card">

            <div class="status-top">

                <div class="status-label">
                    DNS Security
                </div>

                <button
                class="status-info-btn"
                data-tooltip="DNS requests may reveal browsing activity outside VPN tunnels.">

                    <i data-lucide="info"></i>

                </button>

            </div>

            <div class="status-value" id="dns-result">
                Quick Check
            </div>

            <a
            href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php"
            class="status-action-btn">

                Run Full DNS Test →

            </a>

        </div>





        <!-- IPV6 -->
        <div class="status-card">

            <div class="status-top">

                <div class="status-label">
                    IPv6 Exposure
                </div>

                <button
                class="status-info-btn"
                data-tooltip="IPv6 traffic can sometimes bypass VPN protection if not configured properly.">

                    <i data-lucide="info"></i>

                </button>

            </div>

            <div class="status-value" id="ipv6-result">
                Checking...
            </div>

            <div class="status-subtext" id="ipv6-subtext">
                Network inspection
            </div>

        </div>





        <!-- FINGERPRINT -->
        <div class="status-card">

            <div class="status-top">

                <div class="status-label">
                    Fingerprint Risk
                </div>

                <button
                class="status-info-btn"
                data-tooltip="Browser fingerprinting identifies devices using technical characteristics and configuration data.">

                   <i data-lucide="info"></i>

                </button>

            </div>

            <div class="status-value" id="fingerprint-result">
                Calculating...
            </div>

            <div class="status-subtext" id="fingerprint-subtext">
                Browser uniqueness analysis
            </div>

        </div>

    </div>

</section>




<!-- KNOWLEDGE HUB -->
<section class="homepage-tools-section">

    <div class="tools-heading-wrap">

    <h2>
        Privacy Diagnostics & Threat Intelligence Guides
    </h2>

    <p class="tools-intro">
        Analyze real-world security vulnerabilities, tracking mechanics, and digital exposure vectors. Explore technical insights designed to protect your network against advanced browser fingerprinting, data leaks, stealth scripts, and modern cybersecurity threats.
    </p>

</div>





    <div class="tools-grid">

        <a
    href="<?= BASE_URL ?>/articles/vpns/why-vpn.php"
    class="tool-card tool-link"
>

    <img
        src="<?= BASE_URL ?>/assets/img/icons/leak.png"
        alt="VPN Privacy and Security"
    >

    <div class="tool-mini-label">
        Privacy Awareness
    </div>

    <h3>
        VPN Security
    </h3>

    <p>
        Discover why VPNs are important, when
        to use them, the risks of free VPNs.
    </p>

</a>





       <a
    href="<?= BASE_URL ?>/articles/browsers/best-browsers-2026.php"
    class="tool-card tool-link"
>

    <img
        src="<?= BASE_URL ?>/assets/img/icons/network.png"
        alt="Browser Privacy Analysis"
    >

    <div class="tool-mini-label">
        Browser Testing
    </div>

    <h3>
        Browser Privacy Report
    </h3>

    <p>
        Compare state partitioning, fingerprinting resistance, 
        and tracker blocking across major desktop and mobile 
        browsers as of 2026.
    </p>

</a>




        <a
    href="<?= BASE_URL ?>/articles/vpns/best-vpns-2026.php"
    class="tool-card tool-link"
>

    <img
        src="<?= BASE_URL ?>/assets/img/icons/fingerprint.png"
        alt="Browser Fingerprinting"
    >

    <div class="tool-mini-label">
        VPN Guides
    </div>

    <h3>
        Best VPNs 2026
    </h3>

    <p>
        Compare the top VPN services of 2026
        for privacy, speed, streaming, security,
        and overall value.
    </p>

</a>





        <a
            href="<?= BASE_URL ?>/articles/network-privacy/common-threats.php"
            class="tool-card tool-link"
        >

            <img
                src="<?= BASE_URL ?>/assets/img/icons/security.png"
                alt="Security Tools"
            >

            <div class="tool-mini-label">
                Cybersecurity
            </div>

            <h3>
                Security
            </h3>

            <p>
                Learn about password security,
                phishing risks,
                VPN detection,
                QR code scams,
                and account protection.
            </p>

        </a>





        <a
            href="<?= BASE_URL ?>/tools/speed_test_article.php"
            class="tool-card tool-link"
        >

            <img
                src="<?= BASE_URL ?>/assets/img/icons/speed.png"
                alt="Speed Tests"
            >

            <div class="tool-mini-label">
                Network Performance
            </div>

            <h3>
                Speed Test
            </h3>

            <p>
                Understand internet speed,
                latency,
                ping,
                jitter,
                and connection stability
                through educational diagnostics.
            </p>

        </a>





        <a
            href="<?= BASE_URL ?>/tools/utilities_article.php"
            class="tool-card tool-link"
        >

            <img
                src="<?= BASE_URL ?>/assets/img/icons/tools.png"
                alt="Utilities"
            >

            <div class="tool-mini-label">
                Privacy Utilities
            </div>

            <h3>
                Utilities
            </h3>

            <p>
                Explore password generators,
                QR code tools,
                IP utilities,
                and browser-based privacy helpers.
            </p>

        </a>

    </div>

</section>


<!-- FAQ -->
<section class="faq-section">

    <h2>
        Frequently Asked Questions
    </h2>





    <h3 class="faq-question">
    What does PrivacyTestLab actually test?
</h3>

<p class="faq-answer">
    PrivacyTestLab is a complete, browser-based privacy diagnostic platform. Instead of just telling you if your internet is working, our tools audit your digital footprint to show you exactly what data your browser reveals to websites, trackers, and internet service providers without your permission.
</p>

<p class="faq-answer">
    Our platform splits your online privacy check into four critical security layers:
</p>

<ul class="faq-points-list" style="margin-bottom: 1.5rem; padding-left: 1.5rem; color: #070606;">
    <li style="margin-bottom: 0.5rem;"><strong style="color: #c10000;">Identity & Location Leaks:</strong> We test your standard IP address, look for split-tunnel failures in IPv6 traffic, and check if your real location is slipping past your VPN.</li>
    <li style="margin-bottom: 0.5rem;"><strong style="color: #c10000;">Browser Tracking & Fingerprinting:</strong> We analyze how unique your device looks to background trackers by testing your browser configuration, screen resolution, and hardware features that allow companies to track you without using cookies.</li>
    <li style="margin-bottom: 0.5rem;"><strong style="color: #c10000;">Network Security Infiltration:</strong> Our tools run deep scans on your <a href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php" style="color: #3b82f6; font-weight: 600;">DNS configuration</a> to see if your private browsing history is visible to your ISP, and we check WebRTC protocols to ensure media features aren't bypassing your encryption.</li>
    <li style="margin-bottom: 0.5rem;"><strong style="color: #c10000;">Essential Digital Utilities:</strong> We provide real-time performance diagnostics like network latency (ping/jitter) and client-side password security evaluations to keep your credentials safe from brute-force attacks.</li>
</ul>

<p class="faq-answer">
    By running these real-time security assessments right inside your browser tab, PrivacyTestLab pinpoints the exact vulnerabilities tracking scripts use to monitor your online behavior—giving you the exact knowledge you need to fix them.
</p>





   <h3 class="faq-question">
    Is PrivacyTestLab free to use? Are there any hidden catches?
</h3>

<p class="faq-answer">
    Yes, PrivacyTestLab is 100% free to use. There are no premium paywalls, no hidden subscriptions, and absolutely <strong>no account
         registration or email sign-ups required</strong> to access our security diagnostics. 
</p>

<p class="faq-answer">
    Unlike platforms that force you to download sketchy third-party desktop applications or browser extensions—which can 
    ironically introduce new spyware risks—all of our privacy utilities run <span class="highlight-yellow">entirely in your web browser</span>.
</p>

<p class="faq-answer">
    Our mission is purely educational transparency. The diagnostic tools process your connection metadata locally in real-time to show you your tracking exposure, and we do not log, store, or monetize your network details. You get instant, unfettered access to our complete testing suite.
</p>

  



<h3 class="faq-question">
    Do you store my IP address, logs, or browsing activity?
</h3>

<p class="faq-answer">
    No. PrivacyTestLab operates under a strict, verifiable <strong>zero-logs data policy</strong>. We do not track, record, or store your IP
     addresses, search queries, or browsing history. Our system is built exclusively for real-time security analysis, not user profiling or 
     data monetization.
</p>

<p class="faq-answer">
    Unlike typical websites that send your network data back to a centralized corporate database, our diagnostic platform processes your
     information <span class="highlight-yellow">entirely on the client-side</span> within your own web browser. 
</p>

<p class="faq-answer">
    Any network data or metadata required to detect your leak exposure is held temporarily in your browser's volatile memory and is instantly 
    destroyed the moment you close or refresh the browser tab. Our infrastructure is architected from the ground up to expose digital tracking 
    vulnerabilities—not to create new privacy risks for our users.
</p>




<h3 class="faq-question">
    Why does my VPN leak my real IP address via WebRTC?
</h3>

<p class="faq-answer">
    A WebRTC leak happens because of a direct conflict between how your web browser talks to websites and how your VPN hides your internet 
    footprints. 
    <strong>WebRTC (Web Real-Time Communication)</strong> is a built-in technology that allows browsers to connect directly to each other
     for things like voice calls, video chats, and file sharing without needing an intermediate server to pass the data back and forth.
</p>

<p class="faq-answer">
    To make these fast connections work, your browser acts like a digital detective. It sends out a special request to find the shortest pathway 
    to the other device. 
    The problem is that this request operates right inside your browser app, allowing it to sneak past your operating system's standard VPN
     protection. It looks directly at your physical device's hardware, uncovering your <strong>true home internet address (IP address)</strong> 
     and your local network details.
</p>

<p class="faq-answer">
    If your VPN software doesn't have a specific feature called "built-in leak protection," it won't notice that the browser is communicating 
    outside of its secure, encrypted tunnel. When this happens, a website can use a simple piece of background code to trick your browser into
     giving up your real location, completely ignoring the fact that your VPN is turned on.
</p>

<p class="faq-answer">
    To see if your browser is quietly giving away your identity behind your back, you can instantly check your system using our 
    <a href="<?= BASE_URL ?>/tools/leak-tests/webrtc-leak-test.php">WebRTC Leak Test</a>. 
    You can also make sure your regular connection is fully masked with our <a href="<?= BASE_URL ?>/tools/leak-tests/ip-leak-test.php">IP Leak 
        Test</a>, 
    and ensure your internet provider isn't tracking the websites you visit by running 
    our <a href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php">DNS Leak Test</a>.
</p>


   




   <h3 class="faq-question">
    Can websites still track me if I block or delete cookies?
</h3>

<p class="faq-answer">
    Yes, absolutely. While clearing your browser cookies used to be enough to reset your online identity, modern tracking companies now 
    rely heavily on advanced <strong>cookieless tracking methods</strong>. If you delete your cookies, trackers simply shift to alternative 
    scripts that look at your network and hardware characteristics instead of your browser files.
</p>

<p class="faq-answer">
    The most aggressive alternative is <span class="privacy-highlight-yellow">browser fingerprinting</span>. When you load a webpage, the site
     can instantly measure your specific screen resolution, installed operating system, device language, system time zone, and even the way your 
     hardware renders complex graphics. Combined, these technical data points create a highly accurate, unique digital signature that doesn't 
     rely on a tracking file sitting on your hard drive.
</p>

<p class="faq-answer">
    Additionally, websites utilize your <strong>browser's local storage capabilities (HTML5 Web Storage)</strong>, which operates silently in 
    the background and isn't wiped out by standard cookie-clearing tools. They can also log your structural IP network reputation to track your 
    approximate location across different browsing sessions. 
</p>

<p class="faq-answer">
    Because these background monitoring systems bypass traditional privacy blocks, our diagnostic suite uses specialized, real-time tracking 
    emulation algorithms to show you exactly which hardware and network flags your browser is revealing. Running our diagnostic tools ensures
     you aren't leaving a predictable tracking trail behind you, giving you total transparency over your device's security layout.
</p>
    <p class="faq-answer">
        Understanding
        <a href="<?= BASE_URL ?>/pages/knowledge-base/privacy-basics/online-tracking.php">
            online tracking techniques
        </a>
        can help users make more informed privacy decisions.
    </p>




<h3 class="faq-question">
    How accurate are the privacy tests on PrivacyTestLab?
</h3>

<p class="faq-answer">
    Our testing tools provide an extremely high level of real-world accuracy because they <span class="highlight-yellow">don't rely on 
        guesswork or static databases</span>. Instead, our diagnostic platform queries your browser's <strong>raw, live API endpoints</strong> 
        in real-time, looking at your system configuration exactly the same way an aggressive, third-party corporate tracking script would.
</p>

<p class="faq-answer">
    To ensure absolute precision, our tests run on a cross-verification architecture:
</p>

<ul class="faq-points-list" style="margin-bottom: 1.5rem; padding-left: 1.5rem; color: #4b5563;">
    <li style="margin-bottom: 0.5rem;"><strong style="color: #111827;">Live Server-Side Validation:</strong> For our network tools, your 
    browser communicates with our independent backend servers to catch discrepancies, giving you a 100% accurate read on whether your true 
    network identity is escaping your security configuration.</li>
    <li style="margin-bottom: 0.5rem;"><strong style="color: #111827;">Direct Hardware Queries:</strong> For tracking and fingerprinting 
    analysis, our code interacts directly with your device's media, canvas rendering, and storage mechanics to map out exactly what details your 
    system is exposing.</li>
</ul>

<p class="faq-answer">
    While your immediate results can shift based on your active browser settings, browser extensions, or network configuration changes, the core
     metrics displayed are <span class="privacy-highlight-yellow">completely precise reflections of your current exposure</span>. We maintain and 
     update our detection algorithms to match the latest web standards, making PrivacyTestLab a highly reliable framework for auditing your
      active privacy defenses.
</p>





    <h3 class="faq-question">
    Can any privacy tool guarantee 100% complete online anonymity?
</h3>

<p class="faq-answer">
    No, no single software tool can completely guarantee total anonymity online. Modern data brokers and advertising networks do not rely on 
    just one data point; they utilize advanced <span class="privacy-highlight-yellow">cross-site tracking frameworks</span> that combine cookie
     tracking, network metadata, and browser configuration properties to build a unique digital profile of your device.
</p>

<p class="faq-answer">
    True digital privacy requires a <strong>layered security approach</strong>. Even if your location and IP address are perfectly masked, a 
    website can still identify you through your browser's font list, your audio card footprint, or simply by tracking your active login sessions 
    across different platforms. Your security is an ongoing combination of browser hardening, strict network encryption, and smart operational 
    habits—not a one-click software fix.
</p>

<p class="faq-answer">
    That is exactly why PrivacyTestLab exists.<span class="highlight-yellow">We build our platform using industry-standard, zero-compromise 
        leak-detection scripts that look at your browser exactly how advanced tracking algorithms do</span>. When you run our diagnostic suites, 
        you are getting the most accurate, unfiltered look at your system's exposure. We believe in absolute transparency, which is why we invite
         you to review our own data processing standards in our <a href="<?= BASE_URL ?>/legal/privacy-policy.php" style="color: #3b82f6; font-weight: 600;">Privacy Policy</a> to see how we protect your information while you audit your device security.
</p>

</section>





<!-- CTA -->
<div class="cta">

    <h2>
        Want to Improve Your Online Privacy?
    </h2>

    <p>
        Explore browser privacy guides,
        leak testing tools,
        and educational resources designed to help users understand digital tracking risks.
    </p>

    <a href="<?= BASE_URL ?>/pages/knowledge-base/index.php">
        Explore Privacy Guides
    </a>

</div>



<!-- FOOTER -->
<?php require __DIR__ . '/app/templates/footer.php'; ?>

<script src="<?= BASE_URL ?>/assets/js/index.js?v=2"></script>
<script src="<?= BASE_URL ?>/assets/js/navbar.js?v=2"></script>
<script src="<?= BASE_URL ?>/assets/js/ip-detect.js?v=2"></script>
<script src="<?= BASE_URL ?>/assets/js/nav-dropdown.js?v=2"></script>

</body>
</html>