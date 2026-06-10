<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PrivacyTestLab/app/config.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
}

$pageTitle = "DNS Leak Test – Check If Your VPN Is Leaking | PrivacyTestLab";
$pageDescription = "Is your VPN leaking your browsing history? Run our live DNS leak test to see exactly which servers are handling your web requests. Protect your privacy.";
$pageUrl = BASE_URL . "/tools/leak-tests/dns-leak-test.php";

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

<link rel="canonical" href="<?= htmlspecialchars($pageUrl) ?>">

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

<link
  href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
  rel="stylesheet"
>

<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/layout.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/tools/dns-leak-test.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/articles.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<script type="application/ld+json">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php#webpage",
      "url": "<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php",
      "name": "DNS Leak Test: Analyze VPN Security & Unencrypted IP Exposure",
      "description": "Test for DNS leaks instantly. Analyze if your VPN client is leaking unencrypted requests to your ISP, expose IPv6 tracking vulnerabilities, and run terminal diagnostic tools.",
      "isPartOf": {
        "@type": "WebSite",
        "@id": "<?= BASE_URL ?>/#website",
        "url": "<?= BASE_URL ?>/",
        "name": "Privacy Diagnostics Core"
      },
      "inLanguage": "en-US",
      "potentialAction": [
        {
          "@type": "ReadAction",
          "target": ["<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php"]
        }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php#faq",
      "isPartOf": {
        "@id": "<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php#webpage"
      },
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How can a VPN fail and leak your DNS requests even when your connection is active?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Even if your VPN application status says Connected, background conflicts within your operating system or network hardware can route packets out in the open. The three most common causes include Windows Smart Multi-Homed Name Resolution (which sends simultaneous queries to all network adapters, favoring the fastest response), native IPv6 protocol fallbacks (where IPv6 web queries bypass an IPv4-only VPN tunnel), and transient handshake disconnections lacking a rigid, firewall-level system kill switch."
          }
        },
        {
          "@type": "Question",
          "name": "What are the privacy risks of having a persistent DNS leak?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "A persistent DNS leak completely invalidates your proxy traffic encryption by exposing your browsing routine to several immediate real-world threats: 1. ISP logging and targeted commercial profiling where telecom providers build chronological blueprints of every server domain you query to monetize your behavioral metadata. 2. Censorship and geoblocking failure due to mismatches flagged between your proxy IP and your raw regional DNS destination. 3. Exposure to Man-in-the-Middle manipulation (DNS Spoofing or cache poisoning) on untrusted public Wi-Fi access points."
          }
        },
        {
          "@type": "Question",
          "name": "How can I fix a DNS leak and ensure my queries stay secure?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You can achieve an airtight setup by systematically modifying your device parameters: Step 1: Manually hardcode your network adapter settings to use independent secure upstream resolvers like Quad9 or Cloudflare Private DNS. Step 2: Force DNS-over-HTTPS (DoH) or DNS-over-TLS (DoT) directly inside your web browser properties to wrap queries in a strong cryptographic envelope. Step 3: Toggle on your client's built-in leak shielding features, specifically enabling IPv6 leak prevention and an internet network kill switch."
          }
        },
        {
          "@type": "Question",
          "name": "Does a DNS leak reveal my actual home IP address or physical location?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No, a DNS leak does not instantly expose your exact personal home IP to the destination website; the website only reads your proxy VPN IP and the location of your ISP's regional resolvers. However, it completely breaks anonymity regarding your Internet Service Provider. Because the lookup requests bypass the secure tunnel, your ISP directly logs your true home IP alongside the specific target domain name your computer translates, mapping your private habits."
          }
        },
        {
          "@type": "Question",
          "name": "How do I use native terminal command lines to manually test for DNS leaks?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You can query global loopback structures to isolate raw routing paths away from browser caching. In Windows PowerShell or Command Prompt, execute: 'nslookup -type=txt o-o.myaddr.l.google.com ns1.google.com'. On macOS or Linux Terminal, run: 'dig +short txt o-o.myaddr.l.google.com @ns1.google.com'. If the output text payload reveals your actual local ISP gateway address instead of your proxy VPN provider's server node, your operating system is suffering a leak."
          }
        },
        {
          "@type": "Question",
          "name": "Why does my DNS test show multiple different servers or locations? Is that a sign of a leak?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No, encountering a multi-server matrix is usually a sign of a highly optimized, healthy network route rather than a leak. Premium privacy networks utilize Anycast routing clusters (where multiple physical data centers share an identical public IP identity to lower congestion) and establish parallel failover fallbacks for redundancy. As long as the ownership column displays the name of your third-party security provider or private resolver network and completely lacks your real local telecom ISP name, your pipeline is secure."
          }
        }
      ]
    },
    {
      "@type": "WebApplication",
      "@id": "<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php#application",
      "name": "Advanced Automated DNS Leak Testing Utility",
      "url": "<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php",
      "applicationCategory": "SecurityApplication",
      "operatingSystem": "Windows, macOS, Linux, Android, iOS",
      "browserRequirements": "Requires JavaScript enabled. Supports all modern standards-compliant browsers.",
      "offers": {
        "@type": "Offer",
        "price": "0.00",
        "priceCurrency": "USD"
      },
      "featureList": [
        "Real-time IP exposure analysis",
        "Multi-hop Anycast query tracking",
        "IPv6 leakage detection",
        "ISP Ownership and location identification",
        "Command line diagnostic cross-verification"
      ]
    }
  ]
}
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2835282326763517"
     crossorigin="anonymous"></script>
</head>

<body>

<?php require __DIR__ . '/../../app/templates/header.php'; ?>

<main class="dns-page">

  <div class="dns-mini-heading">
    DNS Leak Test
  </div>

  <!-- MAIN CARD -->
  <section class="dns-card">

    <!-- TOP -->
    <div class="dns-card-top">

      <div>

        <div class="card-mini-label">
          YOUR PUBLIC IP ADDRESS
        </div>

        <div class="public-ip-row">

          <div class="public-ip" id="public-ip">
            Detecting...
          </div>

          <button id="copy-ip-btn">
            Copy IP
          </button>

        </div>

      </div>

      <div
        class="top-indicator safe"
        id="top-indicator"
      ></div>

    </div>

    <!-- DIVIDER -->
    <div class="dns-divider"></div>

    <!-- ACTION -->
    <div class="dns-action">

      <button id="run-test-btn">
        Run DNS Leak Test
      </button>

      <div class="test-hint">
        The scan usually completes within a few seconds.
      </div>

    </div>

    <!-- RESULTS -->
    <div
      class="dns-results hidden"
      id="dns-results"
    >

      <!-- STATUS -->
      <div
        class="dns-status safe"
        id="dns-status"
      >

        <div class="status-icon-wrap">

          <img
            src="../../assets/img/icons/shield.png"
            alt="Safe"
            id="status-icon"
          >

        </div>

        <div>

          <div
            class="status-title"
            id="status-title"
          >
            No DNS Leak Detected
          </div>

          <div
            class="status-subtitle"
            id="status-subtitle"
          >
            Your DNS requests appear protected.
          </div>

        </div>

      </div>

      <!-- TABLE -->
      <div class="dns-table-wrap">
  <table class="dns-table">
    <thead>
      <tr>
        <th>DNS Server</th>
        <th>ISP / Organization</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody id="dns-table-body">
      </tbody>
  </table>
</div>
    </div>

    

    <div class="dns-assurance-container">
    <div class="assurance-header-row">
        <div class="assurance-pulse-node"></div>
        <span class="assurance-meta-label">Verified Testing Engine Compliance</span>
    </div>
    
    <p class="assurance-paragraph">
        Our diagnostic core utilizes automated, single-use Anycast string lookups via audited public APIs (<span class="text-accent-blue">edns.ip-api.com</span>) to parse active translation pathways in real time. This evaluation process is <span class="text-accent-glow">100% passive, non-destructive, and secure</span>. 
    </p>
    
    <div class="assurance-grid-metrics">
        <div class="metric-pill">
            <span class="pill-icon">🔒</span>
            <span class="pill-text">Zero Packet Inspection</span>
        </div>
        <div class="metric-pill">
            <span class="pill-icon">🕵️</span>
            <span class="pill-text">No Tracking Logs Retained</span>
        </div>
        <div class="metric-pill">
            <span class="pill-icon">⚡</span>
            <span class="pill-text">100% Safe Sandbox Query</span>
        </div>
    </div>
</div>



  </section>

</main>




<!-- FAQ -->
 <div class="article-container-layer">
    <section class="faq-section">

        <h2 class="article-main-title"> DNS Leak Troubleshooting & Prevention</h2>

        <div class="faq-block" id="what-is-a-dns-leak">
            <h3 class="faq-question">What exactly is a DNS leak, and how does it happen?</h3>
            
            <div class="faq-body">
                <p class="faq-answer">
                    Think of the <strong>Domain Name System (DNS)</strong> as the digital mapmaker and phonebook of the internet. Every single time you type a human-readable web address like <code>privacytestlab.com</code> or tap an active link inside an application, your device doesn't automatically know how to locate that server. It must first send a background query to a DNS resolver to translate that plain-text name into a machine-readable numerical IP address.
                </p>

                <p class="faq-answer">
                    When your internet connection is completely unprotected, your <strong>Internet Service Provider (ISP)</strong> automatically handles and intercepts every single one of these translation requests. Because they run your default routing path, they can keep an absolute, timestamped historical log of every single website domain you attempt to look up. This happens even if the website uses robust HTTPS encryption to hide your specific on-page clicks.
                </p>

                <div class="faq-highlight structural-callout" style="border-left-color: #3b82f6; background-color: rgba(59, 130, 246, 0.05);">
                    <p><strong>The Mechanics of a DNS Leak:</strong> When you connect to a virtual private network, it is supposed to build a fully encrypted, secure tunnel around all your outgoing traffic, forcing these translation lookups to route exclusively to the VPN's private, zero-knowledge security servers. A <strong>DNS leak</strong> occurs when a structural conflict in your operating system configuration, browser routing, or network stack bypasses this encrypted path. Instead of remaining protected, your lookup queries sneak out onto your open, raw network interface—leaving your browsing footprint completely visible to outside observers.</p>
                </div>

                <p class="faq-answer">
                    A DNS leak completely shatters your anonymity layer. Even if your virtual private network successfully hides your physical IP location coordinates from the destination website, your system is still quietly leaking your exact real-time web activities to your ISP, network administrators, or third-party eavesdroppers auditing your local connection environment.
                </p>

                <p class="faq-answer">
                    If you want to verify that your connection isn't quietly stripping away your security behind your back, you should run a <a href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php" class="article-internal-link">live DNS exposure check</a> right now to inspect exactly which translation servers are processing your active requests.
                </p>
            </div>
        </div>


   
<div class="faq-block" id="how-vpns-leak-dns" style="margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid #e5e7eb;">
            <h3 class="faq-question">How can a VPN fail and leak your DNS requests even when your connection is active?</h3>
            
            <div class="faq-body">
                <p class="faq-answer" style="margin-bottom: 16px;">
                    It is a dangerous misconception that an active "Connected" status light on your VPN dashboard means your browsing traffic is perfectly sealed. Tunnels can easily suffer from structural alignment issues. In many cases, your main data packets remain highly encrypted while your tiny, background DNS request pathways quietly crack open.
                </p>

                <p class="faq-answer" style="margin-bottom: 20px;">
                    This subtle failure occurs due to deeply embedded networking mechanics within modern operating systems. The three most common causes include:
                </p>

                <div class="leak-causes-container" style="display: flex; flex-direction: column; gap: 16px; margin: 24px 0;">
                    
                    <div style="background: rgba(59, 130, 246, 0.02); border: 1px solid #e2e8f0; border-left: 4px solid #2563eb; padding: 20px; border-radius: 0 8px 8px 0;">
                        <strong style="color: #0f172a; font-size: 1.1rem; display: block; margin-bottom: 8px;">1. Windows Smart Multi-Homed Name Resolution</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.65;">
                            Introduced by Microsoft to optimize web loading speeds, this system feature compels Windows to transmit simultaneous translation queries to every single available network connection at once—including your unencrypted local ISP gateway. <span class="highlight-yellow">Whichever network adapter responds first wins</span>. If your local telecom infrastructure processes the request faster than your encrypted VPN tunnel can pass it along, your system natively displays that unencrypted response, exposing your target domain to outside observers. You can read more about how this behavior impacts custom infrastructure setups in the <a href="https://learn.microsoft.com/en-us/previous-versions/windows/it-pro/windows-server-2012-R2-and-2012/dn593632(v=ws.11)" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Microsoft Networking Documentation</a>.
                        </p>
                    </div>

                    <div style="background: rgba(16, 185, 129, 0.02); border: 1px solid #e2e8f0; border-left: 4px solid #10b981; padding: 20px; border-radius: 0 8px 8px 0;">
                        <strong style="color: #0f172a; font-size: 1.1rem; display: block; margin-bottom: 8px;">2. Native IPv6 Traffic Overlooks</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.65;">
                            Many legacy or lightweight security tools are only engineered to route traditional IPv4 addresses. However, if your global Internet Service Provider natively issues an IPv6 link to your router, your operating system will aggressively favor the newer protocol whenever you visit a modern website. If your VPN client fails to actively suppress or clamp this dual-stack configuration, your system will quietly drop down to your open, raw home interface to execute the translation request entirely outside the secure link.
                        </p>
                    </div>

                    <div style="background: rgba(245, 158, 11, 0.02); border: 1px solid #e2e8f0; border-left: 4px solid #f59e0b; padding: 20px; border-radius: 0 8px 8px 0;">
                        <strong style="color: #0f172a; font-size: 1.1rem; display: block; margin-bottom: 8px;">3. Transient Handshake Disconnections</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.65;">
                            When your physical Wi-Fi connection stutters or drops out for a split second, your operating system must instantly re-index its routing table. If your security software does not enforce a rigid, firewall-level system block, your computer will immediately fall back to its raw default pathways to keep background web elements loading. This micro-second fallback window is exactly where high volumes of browser lookup queries slip right past your defenses.
                        </p>
                    </div>

                </div>

                <p class="faq-answer" style="margin-top: 20px;">
                    Because separate network protocols break down under different loads, verifying your virtual pipeline requires a multi-layered diagnostic approach. If you notice strange lookup behavior while running this DNS script, you should cross-verify your machine's browser behavior using our <a href="<?= BASE_URL ?>/tools/leak-tests/ip-leak-test.php" class="article-internal-link" style="color: #2563eb; text-decoration: underline; font-weight: 600;">live IP exposure diagnostic scanner</a> to see if your unencrypted local provider metrics are visible elsewhere.
                </p>
            </div>
        </div>


<div class="faq-block" id="risks-of-a-dns-leak" style="margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid #e5e7eb;">
            <h3 class="faq-question">What are the privacy risks of having a persistent DNS leak?</h3>
            
            <div class="faq-body">
                <p class="faq-answer" style="margin-bottom: 18px;">
                    A DNS leak is much more than a minor technical oversight—it is a critical security vulnerability that fundamentally undermines the core utility of encryption. When your DNS lookup data slips outside your protected tunnel, you completely surrender control over your digital footprint, exposing your browsing routine to several immediate real-world threats.
                </p>

                <div class="threat-matrix-grid" style="display: flex; flex-wrap: wrap; gap: 16px; margin: 24px 0;">
                    
                    <div style="flex: 1 1 calc(50% - 16px); min-width: 280px; border: 1px solid #e2e8f0; background: #ffffff; padding: 20px; border-radius: 8px;">
                        <span style="display: inline-block; background: rgba(239, 68, 68, 0.1); color: #dc2626; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; margin-bottom: 10px; letter-spacing: 0.05em;">Vulnerability 01</span>
                        <strong style="color: #0f172a; display: block; margin-bottom: 8px; font-size: 1.1rem;">ISP Logging and Targeted Commercial Profiling</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.6;">
                            In many jurisdictions, corporate Internet Service Providers are legally authorized to harvest, compile, and monetize your behavioral metadata. If your lookup data leaks, your telecom provider gains a chronological, timestamped blueprint of every single server domain you query. This data can be compiled into commercial portfolios and sold directly to advertising networks, as outlined in digital tracking overviews by groups like the <a href="https://www.eff.org" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Electronic Frontier Foundation (EFF)</a>.
                        </p>
                    </div>

                    <div style="flex: 1 1 calc(50% - 16px); min-width: 280px; border: 1px solid #e2e8f0; background: #ffffff; padding: 20px; border-radius: 8px;">
                        <span style="display: inline-block; background: rgba(239, 68, 68, 0.1); color: #dc2626; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; margin-bottom: 10px; letter-spacing: 0.05em;">Vulnerability 02</span>
                        <strong style="color: #0f172a; display: block; margin-bottom: 8px; font-size: 1.1rem;">Censorship and Geoblocking Failure</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.6;">
                            If you are utilizing masking software to bypass regional firewalls, access international corporate systems, or unlock global streaming platforms, a background data leak immediately flags your true geographic region. Security perimeters and content delivery platforms routinely scan for discrepancies between your incoming IP address and your matching DNS destination routing path. When a mismatch is discovered, <span class="highlight-yellow">your connection is instantly blocked or restricted</span>.
                        </p>
                    </div>

                    <div style="flex: 1 1 calc(100% - 16px); min-width: 280px; border: 1px solid #e2e8f0; background: #ffffff; padding: 20px; border-radius: 8px;">
                        <span style="display: inline-block; background: rgba(239, 68, 68, 0.1); color: #dc2626; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; margin-bottom: 10px; letter-spacing: 0.05em;">Vulnerability 03</span>
                        <strong style="color: #0f172a; display: block; margin-bottom: 8px; font-size: 1.1rem;">Exposure to Man-in-the-Middle Manipulation (DNS Spoofing)</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.6;">
                            When your lookup operations escape your encrypted tunnel on a public Wi-Fi access point or compromised local gateway, they route through open, untrusted network hardware. Malicious operators on that local network can execute <span class="highlight-yellow">DNS cache poisoning or spoofing attacks</span>. By altering the open translation response in transit, bad actors can quietly divert your browser away from your intended secure destination and drop you onto a convincing phishing replica site designed to harvest your account credentials.
                        </p>
                    </div>

                </div>

                <p class="faq-answer" style="margin-top: 18px;">
                    Ultimately, ignoring a persistent leak completely invalidates your primary defensive investments. If your connection setup isn't locking down your query destinations, network snoopers can easily map your habits despite your traffic encryption. 
                </p>
                <p class="faq-answer">
                    If you are auditing your system's overall health, it is wise to complement this analysis by running our specialized <a href="<?= BASE_URL ?>/tools/leak-tests/webrtc-leak-test.php" class="article-internal-link" style="color: #2563eb; text-decoration: underline; font-weight: 600;">live WebRTC browser leakage assessment</a> to ensure browser media components aren't exposing your network identity elsewhere.
                </p>
            </div>
        </div>


        <div class="faq-block" id="how-to-fix-a-dns-leak" style="margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid #e5e7eb;">
            <h3 class="faq-question">How can I fix a DNS leak and ensure my queries stay secure?</h3>
            
            <div class="faq-body">
                <p class="faq-answer" style="margin-bottom: 18px;">
                    Plugging a DNS leak doesn't require complex computer programming skills. Because leaks are caused by specific operating system handshakes and software configurations, you can achieve an airtight setup by systematically resetting your network rules. 
                </p>

                <p class="faq-answer" style="margin-bottom: 20px;">
                    Follow this tactical roadmap to patch vulnerabilities across your desktop and mobile environments:
                </p>

                <div class="remediation-steps-timeline" style="position: relative; padding-left: 20px; border-left: 2px solid #e2e8f0; margin: 24px 0 24px 10px;">
                    
                    <div style="position: relative; margin-bottom: 24px;">
                        <div style="position: absolute; left: -29px; top: 4px; width: 16px; height: 16px; border-radius: 50%; background: #2563eb; border: 4px solid #ffffff; box-shadow: 0 0 0 2px #2563eb;"></div>
                        <strong style="color: #0f172a; font-size: 1.1rem; display: block; margin-bottom: 6px;">Step 1: Enforce Manual Upstream DNS Resolvers</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.6;">
                            By default, your operating system accepts whatever DNS settings your local router dishes out. If your VPN tunnel breaks down, your system drops right back to your ISP. To block this, manually hardcode your network adapter settings to point to secure, independent global infrastructure like <a href="https://www.quad9.net" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Quad9 Secure DNS</a> or <a href="https://1.1.1.1" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Cloudflare Private DNS</a>. This ensures that even if a leak bypasses your tunnel, your ISP remains completely locked out of reading your lookup strings.
                        </p>
                    </div>

                    <div style="position: relative; margin-bottom: 24px;">
                        <div style="position: absolute; left: -29px; top: 4px; width: 16px; height: 16px; border-radius: 50%; background: #2563eb; border: 4px solid #ffffff; box-shadow: 0 0 0 2px #2563eb;"></div>
                        <strong style="color: #0f172a; font-size: 1.1rem; display: block; margin-bottom: 6px;">Step 2: Force DNS-Over-HTTPS (DoH) In Your Browser</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.6;">
                            Modern browsers allow you to isolate and encrypt your web lookups directly inside application layer sessions. Dive into your browser's security settings panel, locate the Secure DNS toggle, and turn on DNS-over-HTTPS. This wraps your lookup operations inside a standard <span class="highlight-yellow">HTTPS encryption wrapper</span> before it ever hits your local system's routing stack, hiding it cleanly from local network monitoring protocols.
                        </p>
                    </div>

                    <div style="position: relative;">
                        <div style="position: absolute; left: -29px; top: 4px; width: 16px; height: 16px; border-radius: 50%; background: #2563eb; border: 4px solid #ffffff; box-shadow: 0 0 0 2px #2563eb;"></div>
                        <strong style="color: #0f172a; font-size: 1.1rem; display: block; margin-bottom: 6px;">Step 3: Toggle On Your Client's Built-In Leak Shielding</strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.6;">
                            Open your primary security app configuration properties. Ensure that options like "DNS Leak Protection," "IPv6 Leak Prevention," and the "Internet Kill Switch" are aggressively checked. These system parameters force your local computer's primary firewall layer to actively drop all background data packets that attempt to route outside your dedicated encrypted link.
                        </p>
                    </div>

                </div>

                <p class="faq-answer" style="margin-top: 18px;">
                    Once you apply these structural changes to your device, your networking paths change completely. You shouldn't just assume it worked, though; toggle your security stack back on, reload your browser session, and use our <a href="<?= BASE_URL ?>/index.php" class="article-internal-link" style="color: #2563eb; text-decoration: underline; font-weight: 600;">main automated leak suite</a> to confirm that your unencrypted network provider names have vanished completely from our scanner's reporting metrics.
                </p>
            </div>
        </div>


<div class="faq-block" id="dns-leak-vs-ip-exposure" style="margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid #e5e7eb;">
            <h3 class="faq-question">Does a DNS leak reveal my actual home IP address or physical location?</h3>
            
            <div class="faq-body">
                <p class="faq-answer" style="margin-bottom: 18px;">
                    The short answer is <strong>no, but it exposes something just as dangerous</strong>. There is a massive technical difference between leaking your personal network signature and leaking your lookup telemetry. When a DNS vulnerability occurs, the destination website you are accessing does not instantly harvest your exact home router address out of thin air. Instead, the leak strips away your context privacy.
                </p>

                <p class="faq-answer" style="margin-bottom: 20px;">
                    To understand exactly what data goes where during an active vulnerability window, let's break down the technical exposure matrix:
                </p>

                <div class="exposure-split-container" style="display: flex; flex-direction: column; gap: 16px; margin: 24px 0;">
                    
                    <div style="background: rgba(245, 158, 11, 0.02); border: 1px solid #fed7aa; padding: 20px; border-radius: 8px;">
                        <strong style="color: #c2410c; font-size: 1.05rem; display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                            🌐 What the Destination Website Sees
                        </strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #4338ca; line-height: 1.65; color: #475569;">
                            The remote web server you are visiting only sees the encrypted proxy IP provided by your masking software. However, because your system sent the background translation query through an open channel, the website's analytics scripts can see the <span class="highlight-yellow">identity and location of your ISP's regional DNS servers</span> rather than your security provider's secure relays. This mismatch flags your traffic session as highly anomalous.
                        </p>
                    </div>

                    <div style="background: rgba(239, 68, 68, 0.02); border: 1px solid #fca5a5; padding: 20px; border-radius: 8px;">
                        <strong style="color: #dc2626; font-size: 1.05rem; display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                            👁️ What Your Internet Service Provider (ISP) Sees
                        </strong>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.65;">
                            This is where the real privacy breakdown happens. Because your computer accidentally bypassed the secure tunnel to request translation data directly from your telecom provider's infrastructure, your ISP logs the incoming request. They see your <span class="highlight-yellow">exact home IP address requesting the destination path</span> for that specific website. They can instantly tie your real physical identity to the web destination domain name.
                        </p>
                    </div>

                </div>

                <p class="faq-answer" style="margin-top: 18px;">
                    In simple terms, a DNS leak allows your internet provider to build an unbroken chronological roadmap of your web usage patterns, effectively rendering your traffic encryption useless. Even if the outside web doesn't know your home location, your local operator logs every move you make. You can learn more about how globally distributed server networks handle lookups by reviewing infrastructure breakdowns on the <a href="https://www.icann.org" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Internet Corporation for Assigned Names and Numbers (ICANN)</a> repository.
                </p>
                
                <p class="faq-answer">
                    If you are concerned that your active session is blending your unencrypted lookup footprints with your proxy identities, navigate back to our <a href="<?= BASE_URL ?>/index.php" class="article-internal-link" style="color: #2563eb; text-decoration: underline; font-weight: 600;">central telemetry testing core</a>. Running a fresh, multi-point evaluation ensures that your regional data hubs match your proxy tunnels perfectly, keeping outside network monitors blind to your habits.
                </p>

                </div>
        </div>

<div class="faq-block" id="fix-and-prevent-dns-leaks" style="margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid #e5e7eb;">
            <h3 class="faq-question">What is the comprehensive checklist to fix an active DNS leak and prevent them completely?</h3>
            
            <div class="faq-body">
                <p class="faq-answer" style="margin-bottom: 20px;">
                    Plugging an active vulnerability and insulating your system against future pipeline failures requires a dual-layered approach. You must combine immediate system adjustments (fixing the current state) with advanced structural configurations (preventing future leaks). 
                </p>

                <div class="blueprint-flex-container" style="display: flex; flex-wrap: wrap; gap: 20px; margin: 24px 0;">
                    
                    <div style="flex: 1 1 calc(50% - 10px); min-width: 300px; border: 1px solid #e2e8f0; border-radius: 8px; background: rgba(248, 250, 252, 0.6); padding: 20px;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 16px;">
                            <span style="background: #dc2626; color: #ffffff; padding: 2px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">PHASE 1</span>
                            <strong style="color: #0f172a; font-size: 1.1rem;">Immediate Remediation</strong>
                        </div>
                        
                        <ul style="list-style: none; padding-left: 0; margin: 0;">
                            <li style="margin-bottom: 14px; padding-bottom: 14px; border-bottom: 1px solid #e2e8f0;">
                                <span style="color: #0f172a; font-weight: 700; display: block; margin-bottom: 4px;">1. Deploy Premium Protected Clients</span>
                                <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.5;">
                                    Ditch generic or free configurations. Migrate to a tier-one premium VPN software vendor that implements native, proprietary kernel-level DNS leak shielding directly inside their desktop and mobile clients.
                                </p>
                            </li>
                            <li style="margin-bottom: 14px; padding-bottom: 14px; border-bottom: 1px solid #e2e8f0;">
                                <span style="color: #0f172a; font-weight: 700; display: block; margin-bottom: 4px;">2. Deactivate the IPv6 Stack</span>
                                <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.5;">
                                    Navigate into your operating system’s network adapter properties and uncheck the Internet Protocol Version 6 (TCP/IPv6) box. Forcing your device to <span class="highlight-yellow">disable IPv6 entirely</span> prevents your machine from bypassing the secure IPv4 VPN adapter.
                                </p>
                            </li>
                            <li>
                                <span style="color: #0f172a; font-weight: 700; display: block; margin-bottom: 4px;">3. Hardcode Secure Static Resolvers</span>
                                <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.5;">
                                    Manually rewrite your adapter properties to route traffic through audited, zero-log platforms. Use trusted public frameworks such as <a href="https://developers.google.com/speed/public-dns" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Google Public DNS (8.8.8.8)</a> or the enterprise-grade web safety paths at <a href="https://www.opendns.com" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Cisco OpenDNS</a>.
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div style="flex: 1 1 calc(50% - 10px); min-width: 300px; border: 1px solid #e2e8f0; border-radius: 8px; background: rgba(248, 250, 252, 0.6); padding: 20px;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 16px;">
                            <span style="background: #16a34a; color: #ffffff; padding: 2px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700;">PHASE 2</span>
                            <strong style="color: #0f172a; font-size: 1.1rem;">Proactive Hardening</strong>
                        </div>
                        
                        <ul style="list-style: none; padding-left: 0; margin: 0;">
                            <li style="margin-bottom: 14px; padding-bottom: 14px; border-bottom: 1px solid #e2e8f0;">
                                <span style="color: #0f172a; font-weight: 700; display: block; margin-bottom: 4px;">1. Use Encrypted Handshake Protocols</span>
                                <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.5;">
                                    Transition your lookup requests away from open UDP text chains. Implement <span class="highlight-yellow">DNS over HTTPS (DoH) or DNS over TLS (DoT)</span> within your central applications to wrap your name translations inside strong, cryptographic protective envelopes.
                                </p>
                            </li>
                            <li style="margin-bottom: 14px; padding-bottom: 14px; border-bottom: 1px solid #e2e8f0;">
                                <span style="color: #0f172a; font-weight: 700; display: block; margin-bottom: 4px;">2. Enforce Dead-End Blackhole Rules</span>
                                <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.6;">
                                    Advanced users can manually change their physical system adapter's default gateway address to a non-existent, local loopback IP (like <code>0.0.0.0</code>). This creates an internal firewall wall, making it physically impossible for data to reach your ISP if your VPN crashes.
                                </p>
                            </li>
                            <li>
                                <span style="color: #0f172a; font-weight: 700; display: block; margin-bottom: 4px;">3. Adopt Isolated Onion Browsing</span>
                                <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.5;">
                                    When handling highly sensitive digital profiles, deploy dedicated secure browsers like the <a href="https://www.torproject.org" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Tor Browser Bundle</a>. Tor intercepts, isolates, and completely resolves all target domain requests internally within its multi-layered proxy circuits.
                                </p>
                            </li>
                        </ul>
                    </div>

                </div>

                <p class="faq-answer" style="margin-top: 20px;">
                    Implementing these advanced troubleshooting strategies creates a highly redundant layer of protection around your device's networking stack. If you have recently reconfigured your system following this checklist, visit our <a href="<?= BASE_URL ?>/knowledge-base/vpn-setup-guide.php" class="article-internal-link" style="color: #2563eb; text-decoration: underline; font-weight: 600;">step-by-step operating system hardening repository</a> for detailed walkthroughs tailored to your platform.
                </p>
                <p class="faq-answer">
                    Finally, keep your browser open and cycle your active proxy locations while keeping an eye on our live monitoring script to ensure no stray local ISP metrics ever reappear on your screen.
                </p>
            </div>
        </div>


     <div class="faq-block" id="terminal-dns-leak-test" style="margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid #e5e7eb;">
            <h3 class="faq-question">How do I use native terminal command lines to manually test for DNS leaks?</h3>
            
            <div class="faq-body">
                <p class="faq-answer" style="margin-bottom: 18px;">
                    If you don't want to rely on browser-based scripts, you can query global network roots directly from your operating system's native command line wrapper. This method bypasses browser cache layers entirely, giving you raw, unvarnished network routing metrics straight from your kernel.
                </p>

                <p class="faq-answer" style="margin-bottom: 16px;">
                    The most definitive manual command line test relies on querying a specialized Google loopback record (`o-o.myaddr.l.google.com`). When you ask this record for a text signature, it doesn't return its own address—it returns the <span class="highlight-yellow">public-facing IP address of the DNS resolver that processed your request</span>. 
                </p>

                <div class="terminal-section" style="margin: 24px 0;">
                    <div style="background: #1e293b; color: #f8fafc; border-radius: 6px; overflow: hidden; border: 1px solid #334155;">
                        <div style="background: #0f172a; padding: 10px 16px; font-size: 0.8rem; font-family: monospace; color: #94a3b8; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #334155;">
                            <span>🪟 Windows PowerShell / CMD</span>
                            <span style="color: #475569;">UTF-8</span>
                        </div>
                        <div style="padding: 16px; font-family: Consolas, Monaco, monospace; font-size: 0.9rem; line-height: 1.5; overflow-x: auto;">
                            <span style="color: #64748b;"># Run this command while your protective tunnel is ACTIVE:</span><br>
                            <span style="color: #38bdf8;">nslookup</span> -type=txt o-o.myaddr.l.google.com ns1.google.com<br><br>
                            <span style="color: #64748b;"># EXPECTED OUTPUT ANALYSIS:</span><br>
                            text = "172.56.21.89" <span style="color: #e2e8f0;">&lt;-- Look closely at this returned IP string.</span>
                        </div>
                    </div>
                </div>

                <div class="terminal-section" style="margin: 24px 0;">
                    <div style="background: #1e293b; color: #f8fafc; border-radius: 6px; overflow: hidden; border: 1px solid #334155;">
                        <div style="background: #0f172a; padding: 10px 16px; font-size: 0.8rem; font-family: monospace; color: #94a3b8; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #334155;">
                            <span>🍏 macOS / 🐧 Linux Terminal</span>
                            <span style="color: #475569;">bash/zsh</span>
                        </div>
                        <div style="padding: 16px; font-family: Consolas, Monaco, monospace; font-size: 0.9rem; line-height: 1.5; overflow-x: auto;">
                            <span style="color: #64748b;"># Query using the advanced dig utility tool:</span><br>
                            <span style="color: #38bdf8;">dig</span> +short txt o-o.myaddr.l.google.com @ns1.google.com<br><br>
                            <span style="color: #64748b;"># EXPECTED OUTPUT ANALYSIS:</span><br>
                            "172.56.21.89"
                        </div>
                    </div>
                </div>

                <div style="background: rgba(15, 23, 42, 0.02); border-left: 4px solid #0f172a; padding: 16px; margin: 20px 0; border-radius: 0 6px 6px 0;">
                    <strong style="color: #0f172a; display: block; margin-bottom: 6px; font-size: 1rem;">🔍 How to evaluate the resulting IP payload:</strong>
                    <p class="faq-answer" style="margin: 0; font-size: 0.925rem; color: #475569; line-height: 1.6;">
                        Compare the IP address inside the text quotation marks against your real, unprotected home gateway IP. If the returned string shows your <strong>actual local ISP gateway address</strong>, your operating system is leaking queries out in the open. If it displays an unfamiliar, anonymous node belonging to your security utility provider, your lookup pathways are perfectly sealed.
                    </p>
                </div>

                <p class="faq-answer" style="margin-top: 18px;">
                    For deeper environment audits, you can study the underlying query transmission parameters via the official manual references hosted on the <a href="https://linux.die.net/man/1/dig" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Linux Dig Command Documentation Archive</a> or check your basic network routing parameters locally.
                </p>
                
                <p class="faq-answer">
                    If digging around in the system console reveals suspicious mixed routing profiles, you can cross-examine your local infrastructure's complete data handling behavior by executing our <a href="<?= BASE_URL ?>/tools/leak-tests/dns-leak-test.php" class="article-internal-link" style="color: #2563eb; text-decoration: underline; font-weight: 600;">deep-packet DNS checking interface</a> to track any anomalies across hundreds of independent global server lookup iterations.
                </p>
            </div>
        </div>



<div class="faq-block" id="multiple-dns-servers-explained" style="margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid #e5e7eb;">
            <h3 class="faq-question">Why does my DNS test show multiple different servers or locations? Is that a sign of a leak?</h3>
            
            <div class="faq-body">
                <p class="faq-answer" style="margin-bottom: 18px;">
                    Seeing a list populated by 3, 5, or even 12 distinct server rows when you hit the diagnostic switch can feel alarming. However, encountering a multi-server matrix is usually a sign of a <strong>highly optimized, healthy network route</strong> rather than a security failure. 
                </p>

                <p class="faq-answer" style="margin-bottom: 20px;">
                    Modern privacy utilities and premium infrastructure systems don't rely on a single lonely machine to translate your requests. They utilize globally distributed server arrays to balance traffic loads. The primary technical reason you see multiple nodes involves two main architectures:
                </p>

                <div class="status-evaluation-grid" style="display: flex; flex-direction: column; gap: 16px; margin: 24px 0;">
                    
                    <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; background: #ffffff; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <span style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Infrastructure</span>
                            <strong style="color: #0f172a; font-size: 1.05rem;">Anycast Routing Clusters</strong>
                        </div>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.6;">
                            Premium secure DNS setups use a methodology called Anycast network routing. Under this layout, multiple physical data centers scattered across different cities or countries share the exact same public IP identity. When your machine initiates a request, global routers automatically distribute sub-queries to whichever neighboring data hubs have the lowest physical congestion. You can dive deeper into how packet destination algorithms handle these loops by exploring the <a href="https://www.cloudflare.com/learning/cdn/glossary/anycast-routing/" target="_blank" rel="noopener noreferrer" style="color: #2563eb; text-decoration: underline; font-weight: 600;">Cloudflare Anycast Networking Architecture Guide</a>.
                        </p>
                    </div>

                    <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; background: #ffffff; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <span style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">Redundancy</span>
                            <strong style="color: #0f172a; font-size: 1.05rem;">Parallel Failover Fallbacks</strong>
                        </div>
                        <p class="faq-answer" style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.6;">
                            To completely prevent connection dropouts, secure network clients routinely establish secondary and tertiary fallback configurations. When our script tests your active browser connection, it deliberately requests translations over several parallel paths to see if your system stumbles. If your client application handles queries correctly, you'll see multiple nodes answering simultaneously to maximize system performance.
                        </p>
                    </div>

                </div>

                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin: 24px 0;">
                    <h4 style="color: #0f172a; margin: 0 0 10px 0; font-size: 1.1rem; font-weight: 700;">🚨 How to separate a healthy cluster from an actual leak:</h4>
                    <p class="faq-answer" style="margin: 0 0 12px 0; font-size: 0.95rem; color: #475569; line-height: 1.6;">
                        When reviewing your telemetry output array, ignore the total count of servers or physical locations listed. Instead, focus entirely on the <span class="highlight-yellow">Organization / ISP ownership column</span>.
                    </p>
                    <ul style="margin: 0; padding-left: 20px; font-size: 0.95rem; color: #475569; line-height: 1.6;">
                        <li style="margin-bottom: 6px;">🟢 <strong>SAFE STATUS:</strong> Every single server listed belongs to your third-party security provider or custom private resolver company (e.g., Google, Cloudflare, M247, Datacamp).</li>
                        <li>🔴 <strong style="color: #dc2626;">LEAKING STATUS:</strong> One or more rows display the name of your <strong>actual local home Internet Service Provider</strong> (e.g., Comcast, Verizon, BT, Vodafone).</li>
                    </ul>
                </div>

                <p class="faq-answer" style="margin-top: 18px;">
                    As long as your local telecom identity remains completely absent from the reporting ledger, your private connection tunnel is fully secure—regardless of how many automated relay hops appear on your testing dashboard.
                </p>
                <p class="faq-answer">
                    If you are interested in mapping out your device's overall network layer profile beyond simple lookup scripts, you can read our comprehensive technical <a href="<?= BASE_URL ?>/knowledge-base/vpn-leak-types.php" class="article-internal-link" style="color: #2563eb; text-decoration: underline; font-weight: 600;">guide on identifying advanced tunnel failures</a> to build an absolute fortress around your everyday browser traffic.
                </p>
            </div>
        </div>





 



</section>
</div>


<?php require __DIR__ . '/../../app/templates/footer.php'; ?>

<script src="<?= BASE_URL ?>/assets/js/dns-leak-test.js"></script>

<script src="<?= BASE_URL ?>/assets/js/navbar.js"></script>




<script src="https://unpkg.com/lucide@latest"></script>
<script>
if(typeof lucide !== "undefined"){
    lucide.createIcons();
}
</script>


<script>

document.addEventListener("DOMContentLoaded", () => {

    if(window.innerWidth <= 768){

        const accordions =
        document.querySelectorAll(".footer-accordion");

        accordions.forEach((accordion) => {

            const button =
            accordion.querySelector(".footer-accordion-btn");

            const content =
            accordion.querySelector(".footer-accordion-content");

            if(!button || !content){
                return;
            }

            button.addEventListener("click", () => {

                const isActive =
                accordion.classList.contains("active");

                accordions.forEach((item) => {

                    item.classList.remove("active");

                    const itemContent =
                    item.querySelector(".footer-accordion-content");

                    if(itemContent){
                        itemContent.style.maxHeight = null;
                    }

                });

                if(!isActive){

                    accordion.classList.add("active");

                    content.style.maxHeight =
                    content.scrollHeight + "px";

                }

            });

        });

    }

});

</script>
</body>
</html>