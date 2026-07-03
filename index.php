<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PrivacyTestLab/app/config.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
}

$pageTitle = "PrivacyTestLab - Audit Your Digital Footprint & Leaks";

$pageDescription = "Audit your browser privacy in real time. Detect hidden WebRTC exposures, DNS leaks, browser fingerprinting flags, and test your security tunnels instantly.";
$pageUrl = BASE_URL . "/";

$pageImage = BASE_URL . "/assets/img/article-img/targeted-advertising.webp";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title><?= htmlspecialchars($pageTitle) ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LCP preload: tells the browser to fetch the hero image immediately during HTML parsing,
         before it even downloads the stylesheet that references it -->
    <link rel="preload" as="image"
          href="https://images.unsplash.com/photo-1643101807331-21a4a3f081d5?w=1920&q=75&fm=webp&fit=crop"
          fetchpriority="high">

    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">

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
        rel="stylesheet">


<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/layout.css">
    <link rel="stylesheet" href="<?= av('assets/css/articles.css') ?>">
    <link rel="icon" href="/favicon.ico">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SFFNG254H9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SFFNG254H9');
</script>
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
            "sameAs": [
                "https://www.youtube.com/@privacytestlabdotcom",
                "https://www.instagram.com/privacytestlabdotcom",
                "https://www.linkedin.com/company/privacytestlab/",
                "https://pin.it/5nm0Vplt7",
                "https://github.com/PrivacyTestLab"
            ]
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

                <a href="<?= BASE_URL ?>/tools/leak-tests/ip-leak-test" class="btn-primary">
                    Scan Your Browser
                </a>

                <a href="<?= BASE_URL ?>/articles/basic-guides/what-data-browser-send" class="btn-secondary">
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

                    <button class="status-info-btn"
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

                    <button class="status-info-btn"
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

                    <button class="status-info-btn"
                        data-tooltip="DNS requests may reveal browsing activity outside VPN tunnels.">

                        <i data-lucide="info"></i>

                    </button>

                </div>

                <div class="status-value" id="dns-result">
                    Quick Check
                </div>

                <a href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test" class="status-action-btn">

                    Run Full DNS Test →

                </a>

            </div>





            <!-- IPV6 -->
            <div class="status-card">

                <div class="status-top">

                    <div class="status-label">
                        IPv6 Exposure
                    </div>

                    <button class="status-info-btn"
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

                    <button class="status-info-btn"
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
               Privacy & Online Security Guides
            </h2>

            <p class="tools-intro">
                 Learn how advertisers track you online, understand pixel 
                 tracking and cookies, discover ad blocker limitations, and get 
                 practical steps to prevent targeted advertising. 
                 Our comprehensive guides explain VPN security, browser privacy,
                  AI scams, common threats, and proven methods to protect your 
                  personal data across the internet.
    



            </p>

        </div>





        <div class="tools-grid">

            <a href="<?= BASE_URL ?>/articles/basic-guides/is-incognito-private" class="tool-card tool-link">

                <img src="<?= BASE_URL ?>/assets/img/icons/leak.png" alt="Is Incognito Mode Private?">

                <div class="tool-mini-label">
                    Browser Security
                </div>

                <h3>
                    Is Incognito Mode Private?
                </h3>

                <p>
                    Incognito hides your history from others on your device — but not from your ISP, employer, or the websites you visit.
                </p>

            </a>





            <a href="<?= BASE_URL ?>/articles/browsers/best-browsers-2026" class="tool-card tool-link">

                <img src="<?= BASE_URL ?>/assets/img/icons/network.png" alt="Browser Privacy Analysis">

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




            <a href="<?= BASE_URL ?>/articles/vpns/best-vpns-2026" class="tool-card tool-link">

                <img src="<?= BASE_URL ?>/assets/img/icons/fingerprint.png" alt="Browser Fingerprinting">

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





            <a href="<?= BASE_URL ?>/articles/basic-guides/what-data-browser-send" class="tool-card tool-link">

                <img src="<?= BASE_URL ?>/assets/img/icons/security.png" alt="What Data Does Your Browser Send?">

                <div class="tool-mini-label">
                    Data Privacy
                </div>

                <h3>
                    What Data Does Your Browser Send?
                </h3>

                <p>
                    Before you click anything, your browser already shares your OS, screen size, timezone, and dozens of other details with every site you visit.
                </p>

            </a>





            <a href="<?= BASE_URL ?>/articles/network-privacy/how-apps-track-location" class="tool-card tool-link">

                <img src="<?= BASE_URL ?>/assets/img/icons/speed.png" alt="How Apps Track Your Location">

                <div class="tool-mini-label">
                    Mobile Privacy
                </div>

                <h3>
                    How Apps Track Your Location
                </h3>

                <p>
                    Denying location permission doesn't make you invisible. Learn the 6 methods apps use to estimate where you are without GPS access.
                </p>

            </a>





            <a href="<?= BASE_URL ?>/articles/browsers/targeted-advertising"
                class="tool-card tool-link">

                <img src="<?= BASE_URL ?>/assets/img/icons/tools.png" alt="Privacy Guide">

                <div class="tool-mini-label">
                    Privacy Guide
                </div>

                <h3>
                    Targeted Advertising & Tracking
                </h3>

                <p>
                    Learn how pixel tracking, cookies, and behavioral targeting work. Discover ad blocker
                    limitations and proven methods to prevent online tracking.
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
    PrivacyTestLab runs browser-based privacy checks that show you exactly what
    information your browser and network expose to websites and third-party trackers
    — often without you realizing it.
</p>

<p class="faq-answer">
    The platform covers four areas of browser privacy:
</p>

<ul class="faq-points-list" style="margin-bottom: 1.5rem; padding-left: 1.5rem; color: #070606;">
    <li style="margin-bottom: 0.5rem;"><strong style="color: #c10000;">IP & Location Exposure:</strong>
        Checks your public IPv4 and IPv6 addresses, detects split-tunnel VPN failures,
        and identifies whether your real location is visible despite an active VPN.</li>
    <li style="margin-bottom: 0.5rem;"><strong style="color: #c10000;">Browser Fingerprinting:</strong>
        Analyzes how uniquely identifiable your browser is based on screen resolution,
        hardware features, and configuration — the method trackers use to follow you
        without cookies.</li>
    <li style="margin-bottom: 0.5rem;"><strong style="color: #c10000;">DNS & WebRTC Leaks:</strong>
        Tests your <a href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test"
        style="color: #3b82f6; font-weight: 600;">DNS configuration</a> to check
        whether your browsing activity is visible to your ISP, and checks WebRTC
        to confirm it isn't bypassing your VPN's encryption.</li>
    <li style="margin-bottom: 0.5rem;"><strong style="color: #c10000;">Speed & Security Utilities:</strong>
        Includes latency and jitter diagnostics, internet speed testing, and a
        client-side password strength checker that evaluates credentials without
        sending anything to a server.</li>
</ul>

<p class="faq-answer">
    All tests run directly inside your browser tab — nothing is installed, no data
    is stored, and results reflect your actual connection state at the time of testing.
</p>



        <h3 class="faq-question">
            Is PrivacyTestLab free to use? Are there any hidden catches?
        </h3>

        <p class="faq-answer">
            Yes, PrivacyTestLab is 100% free to use. There are no premium paywalls, no hidden subscriptions, and
            absolutely <strong>no account
                registration or email sign-ups required</strong> to access our security diagnostics.
        </p>

        <p class="faq-answer">
            Unlike platforms that force you to download sketchy third-party desktop applications or browser
            extensions—which can
            ironically introduce new spyware risks—all of our privacy utilities run <span
                class="highlight-yellow">entirely in your web browser</span>.
        </p>

        <p class="faq-answer">
            Our mission is purely educational transparency. The diagnostic tools process your connection metadata
            locally in real-time to show you your tracking exposure, and we do not log, store, or monetize your network
            details. You get instant, unfettered access to our complete testing suite.
        </p>





        <h3 class="faq-question">
            Do you store my IP address, logs, or browsing activity?
        </h3>

        <p class="faq-answer">
            No. PrivacyTestLab operates under a strict, verifiable <strong>zero-logs data policy</strong>. We do not
            track, record, or store your IP
            addresses, search queries, or browsing history. Our system is built exclusively for real-time security
            analysis, not user profiling or
            data monetization.
        </p>

        <p class="faq-answer">
            Unlike typical websites that send your network data back to a centralized corporate database, our diagnostic
            platform processes your
            information <span class="highlight-yellow">entirely on the client-side</span> within your own web browser.
        </p>

        <p class="faq-answer">
            Any network data or metadata required to detect your leak exposure is held temporarily in your browser's
            volatile memory and is instantly
            destroyed the moment you close or refresh the browser tab. Our infrastructure is architected from the ground
            up to expose digital tracking
            vulnerabilities—not to create new privacy risks for our users.
        </p>




        <h3 class="faq-question">
            Why does my VPN leak my real IP address via WebRTC?
        </h3>

        <p class="faq-answer">
            A WebRTC leak happens because of a direct conflict between how your web browser talks to websites and how
            your VPN hides your internet
            footprints.
            <strong>WebRTC (Web Real-Time Communication)</strong> is a built-in technology that allows browsers to
            connect directly to each other
            for things like voice calls, video chats, and file sharing without needing an intermediate server to pass
            the data back and forth.
        </p>

        <p class="faq-answer">
            To make these fast connections work, your browser acts like a digital detective. It sends out a special
            request to find the shortest pathway
            to the other device.
            The problem is that this request operates right inside your browser app, allowing it to sneak past your
            operating system's standard VPN
            protection. It looks directly at your physical device's hardware, uncovering your <strong>true home internet
                address (IP address)</strong>
            and your local network details.
        </p>

        <p class="faq-answer">
            If your VPN software doesn't have a specific feature called "built-in leak protection," it won't notice that
            the browser is communicating
            outside of its secure, encrypted tunnel. When this happens, a website can use a simple piece of background
            code to trick your browser into
            giving up your real location, completely ignoring the fact that your VPN is turned on.
        </p>

        <p class="faq-answer">
            To see if your browser is quietly giving away your identity behind your back, you can instantly check your
            system using our
            <a href="<?= BASE_URL ?>/tools/leak-tests/webrtc-leak-test">WebRTC Leak Test</a>.
            You can also make sure your regular connection is fully masked with our <a
                href="<?= BASE_URL ?>/tools/leak-tests/ip-leak-test">IP Leak
                Test</a>,
            and ensure your internet provider isn't tracking the websites you visit by running
            our <a href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test">DNS Leak Test</a>.
        </p>







        <h3 class="faq-question">
            Can websites still track me if I block or delete cookies?
        </h3>

        <p class="faq-answer">
            Yes, absolutely. While clearing your browser cookies used to be enough to reset your online identity, modern
            tracking companies now
            rely heavily on advanced <strong>cookieless tracking methods</strong>. If you delete your cookies, trackers
            simply shift to alternative
            scripts that look at your network and hardware characteristics instead of your browser files.
        </p>

        <p class="faq-answer">
            The most aggressive alternative is <span class="privacy-highlight-yellow">browser fingerprinting</span>.
            When you load a webpage, the site
            can instantly measure your specific screen resolution, installed operating system, device language, system
            time zone, and even the way your
            hardware renders complex graphics. Combined, these technical data points create a highly accurate, unique
            digital signature that doesn't
            rely on a tracking file sitting on your hard drive.
        </p>

        <p class="faq-answer">
            Additionally, websites utilize your <strong>browser's local storage capabilities (HTML5 Web
                Storage)</strong>, which operates silently in
            the background and isn't wiped out by standard cookie-clearing tools. They can also log your structural IP
            network reputation to track your
            approximate location across different browsing sessions.
        </p>

        <p class="faq-answer">
            Because these background monitoring systems bypass traditional privacy blocks, our diagnostic suite uses
            specialized, real-time tracking
            emulation algorithms to show you exactly which hardware and network flags your browser is revealing. Running
            our diagnostic tools ensures
            you aren't leaving a predictable tracking trail behind you, giving you total transparency over your device's
            security layout.
        </p>
       



       <h3 class="faq-question">
    How accurate are the privacy tests on PrivacyTestLab?
</h3>

<p class="faq-answer">
    The tests read live data directly from your browser and network at the moment
    you run them — not from cached results, estimated profiles, or static databases.
    This means <span class ="highlight-yellow">what you see reflects your actual current exposure,</span> not a generic
    assessment of your browser type.
</p>

<p class="faq-answer">
    Accuracy comes from two things:
</p>

<ul class="faq-points-list" style="margin-bottom: 1.5rem; padding-left: 1.5rem; color: #4b5563;">
    <li style="margin-bottom: 0.5rem;"><strong style="color: #111827;">Server-side network checks:</strong> For
        <a href="<?= BASE_URL ?>/tools/leak-tests/ip-leak-test" class="article-internal-link">
            IP
        </a> and<a href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test" class="article-internal-link">
            DNS
        </a> tests, your browser communicates with backend servers to detect
        what your real network identity looks like from the outside — the same way
        a website you visit would see it.</li>
    <li style="margin-bottom: 0.5rem;"><strong style="color: #111827;">Direct browser API reads:</strong> For
        fingerprinting and WebRTC tests, the tools query your browser's own APIs
        for canvas rendering, media devices, and storage — reading exactly what
        those APIs expose, nothing more.</li>
</ul>

<p class="faq-answer">
    Results can vary depending on your active browser extensions, VPN configuration,
    or browser settings at the time of testing — which is expected behavior, not a
    flaw. If you change your setup, running the test again will reflect that change
    immediately. The tools are kept updated to stay consistent with current browser
    standards and how real tracking systems work.
</p>

<p class="faq-answer">
    For the browser fingerprint score specifically, we don't ask you to just trust a
    number — the exact Shannon entropy formulas, per-signal weights, and open-source
    scoring code are published in full on our
    <a href="<?= BASE_URL ?>/methodology" style="color: #3b82f6; font-weight: 600;">Methodology page</a>.
</p>



<h3 class="faq-question">
    Can any privacy tool guarantee 100% complete online anonymity?
</h3>

<p class="faq-answer">
    No. No single tool can guarantee complete anonymity online. Modern tracking
    systems don't rely on one data point — they combine IP addresses, cookie data,
    network metadata, and browser configuration properties to build a persistent
    profile of your device across sites.
</p>

<p class="faq-answer">
    Meaningful privacy requires a layered approach. Even with a VPN active, a
    website can still identify you through your <span class ="highlight-yellow">browser's font list, audio hardware
    fingerprint, or active login sessions on other platforms. </span>Privacy is an ongoing
    combination of <strong>browser settings</strong>,<strong> network encryption</strong>, and<strong> browsing habits</strong> — not
    a one-click fix.
</p>

<p class="faq-answer">
    PrivacyTestLab exists to show you exactly where your current setup is leaking
    before a tracker finds it first. Rather than making claims about how protected
    you are, these tools give you the raw data — what your IP looks like from the
    outside, what your browser fingerprint reveals, whether your DNS queries are
    exposed — and let you decide what to fix. You can also review our <a
    href="<?= BASE_URL ?>/legal/privacy-policy"
    style="color: #3b82f6; font-weight: 600;">Privacy Policy</a> to see
    exactly how this site handles your data while you run these tests.
</p>

    </section>





    <!-- CTA -->
    <div class="cta">

        <h2>
            Protect Your Online Activity With a VPN
        </h2>

        <p>
            Discover which VPNs offer the best privacy, speed, and security. Compare top providers and find the perfect VPN for your needs.
        </p>

        <a href="<?= BASE_URL ?>/articles/vpns/best-vpns-2026">
            Compare VPNs
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
