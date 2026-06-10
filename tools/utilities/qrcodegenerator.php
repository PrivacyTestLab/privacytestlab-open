<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PrivacyTestLab/app/config.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
}

$pageTitle = "QR Code Generator - Create Secure QR Codes Online | PrivacyTestLab";

$pageDescription = "Generate QR codes instantly for URLs, text, and links with PrivacyTestLab's privacy-focused QR code generator. Fast, secure, and fully browser-based.";

$pageUrl = BASE_URL . "/tools/utilities/qrcodegenerator.php";

$pageImage = BASE_URL . "/assets/images/privacytestlab-cover.png";

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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/layout.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/tools/qrcodegenerator.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<script type="application/ld+json">
{
    "@context":"https://schema.org",
    "@type":"WebApplication",
    "name":"PrivacyTestLab QR Code Generator",
    "url":"<?= $pageUrl ?>",
    "applicationCategory":"UtilitiesApplication",
    "operatingSystem":"Any",
    "browserRequirements":"Requires JavaScript",
    "description":"Generate static QR codes for URLs and text directly inside your browser with privacy-focused local generation.",
    "offers":{
        "@type":"Offer",
        "price":"0",
        "priceCurrency":"USD"
    },
    "publisher":{
        "@type":"Organization",
        "name":"PrivacyTestLab",
        "url":"<?= BASE_URL ?>"
    }
}
</script>

<script type="application/ld+json">
{
    "@context":"https://schema.org",
    "@type":"FAQPage",
    "mainEntity":[

        {
            "@type":"Question",
            "name":"Does PrivacyTestLab store QR code data or uploaded content?",
            "acceptedAnswer":{
                "@type":"Answer",
                "text":"No. QR code generation happens locally inside your browser. The content you enter is not uploaded, stored, or logged on our servers."
            }
        },

        {
            "@type":"Question",
            "name":"Are QR codes safe to scan?",
            "acceptedAnswer":{
                "@type":"Answer",
                "text":"QR codes themselves are generally safe, but the destination inside the code may not be trustworthy. Unknown QR codes can redirect users to phishing pages, malicious downloads, or scam websites."
            }
        },

        {
            "@type":"Question",
            "name":"What is the difference between static and dynamic QR codes?",
            "acceptedAnswer":{
                "@type":"Answer",
                "text":"Static QR codes permanently store content directly inside the QR image, while dynamic QR codes redirect through external services that may allow editing, analytics, or tracking."
            }
        },

        {
            "@type":"Question",
            "name":"Can QR codes contain malware or phishing links?",
            "acceptedAnswer":{
                "@type":"Answer",
                "text":"QR codes can point to dangerous websites, fake login pages, malware downloads, or scam payment forms. Always verify destinations before entering sensitive information."
            }
        },

        {
            "@type":"Question",
            "name":"Do generated QR codes expire?",
            "acceptedAnswer":{
                "@type":"Answer",
                "text":"Standard static QR codes do not expire. They continue working as long as the linked destination remains available."
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

<div class="qr-page">

  <!-- HERO -->
  <section class="qr-hero">

    <div class="qr-hero-bg"></div>

    <div class="qr-hero-content">

      <div class="qr-badge">
        Fast • Private • Instant
      </div>

      <h1>
        Create a <span>QR code</span> in seconds
      </h1>

      <p>
        Generate QR codes for links, text, notes, contact pages,
        and more directly inside your browser. No registration,
        tracking accounts, or external processing required.
      </p>

     
    </div>

  </section>





  <!-- GENERATOR -->
  <section class="qr-generator-section">

    <div class="qr-generator-card">

      <!-- LEFT -->
      <div class="qr-left">

        <div class="qr-input-header">

          <div class="qr-icon-box">
            <img
              src="../../assets/img/icons/scan-code.png"
              alt="QR Code Icon"
            >
          </div>

          <div>

            <h2>Enter or paste content</h2>

            <p>
              Add a website URL or plain text to generate your QR code instantly.
            </p>

          </div>

        </div>





        <!-- INPUT -->
        <div class="qr-input-wrapper">

          <input
            type="text"
            id="qr-input"
            placeholder="https://example.com"
            autocomplete="off"
            aria-label="QR Code Input"
          >

          <button id="download-btn" disabled>
            Download QR Code
          </button>

        </div>





        <div class="qr-note">
          QR codes are generated locally inside your browser for improved privacy.
        </div>

      </div>





      <!-- RIGHT -->
      <div class="qr-right">

        <div id="qr-preview">

          <div class="qr-preview-inner">

            <span class="placeholder">
              QR Preview
            </span>

          </div>

        </div>

      </div>

    </div>
     <div class="qr-info-box">
        <strong>Privacy Note:</strong>
        QR generation happens locally in your browser.
        Your content is not uploaded or stored during creation.
      </div>


  </section>





  <!-- EDUCATIONAL CONTENT -->
  <section class="faq-section">

    <h2>Understanding QR Code Privacy and Security</h2>

    <div class="faq-answer">

      <p>
        QR codes are widely used for websites, payments, menus,
        event check-ins, Wi-Fi sharing, and business links because they
        make it easy to transfer information between devices quickly.
      </p>

      <p>
        However, QR codes can also hide suspicious destinations.
        Attackers sometimes place malicious QR stickers in public areas
        or send fake QR codes through email and messaging apps to redirect
        users toward phishing websites or scam payment pages.
      </p>

      <p>
        If you regularly scan QR codes from unknown sources,
        understanding
        <a href="<?= BASE_URL ?>/pages/knowledge-base/account-security/phishing-awareness.php">
          phishing attacks
        </a>,
        <a href="<?= BASE_URL ?>/pages/knowledge-base/cybersecurity/online-scams.php">
          online scams
        </a>,
        and
        <a href="<?= BASE_URL ?>/pages/knowledge-base/mobile-privacy/mobile-malware.php">
          mobile malware risks
        </a>
        can help reduce security exposure.
      </p>

      <div class="qr-warning-box">
        Unknown QR codes can redirect users to fake login pages,
        malicious downloads, or scam payment forms.
      </div>

    </div>

  </section>

</div>









<!-- FAQ -->
<section class="faq-section">

  <h2>Frequently Asked Questions</h2>





  <h3 class="faq-question">
    Is this QR code generator completely free to use?
  </h3>

  <div class="faq-answer">

    <p>
      Yes. PrivacyTestLab's QR code generator is completely free
      without subscriptions, account creation, or hidden usage limits.
    </p>

    <p>
      You can generate as many QR codes as needed directly from your browser
      for personal, educational, or commercial purposes.
    </p>

  </div>





  <h3 class="faq-question">
    Does PrivacyTestLab store QR code content or generated data?
  </h3>

  <div class="faq-answer">

    <p>
      No. QR code generation happens locally inside your browser using
      client-side JavaScript. The text or URLs you enter are not uploaded,
      logged, analyzed, or stored on our servers.
    </p>

    <p>
      Once you refresh or leave the page, the generated content disappears
      unless you manually save the QR image yourself.
    </p>

  </div>





  <h3 class="faq-question">
    What types of content can I turn into a QR code?
  </h3>

  <div class="faq-answer">

    <p>
      You can create QR codes for website URLs, notes,
      payment links, event pages, social media profiles,
      forms, contact information, documents, or almost any short text content.
    </p>

    <p>
      Most smartphones automatically recognize QR codes using the built-in camera app,
      making them useful for quickly sharing information across devices.
    </p>

  </div>





  <h3 class="faq-question">
    Are QR codes safe to scan on phones and tablets?
  </h3>

  <div class="faq-answer">

    <p>
      QR codes themselves are simply containers for encoded data,
      but the destination linked inside the code may not always be safe.
    </p>

    <p>
      Malicious QR codes can redirect users to phishing pages,
      fake login forms, malware downloads, or scam payment portals.
    </p>

    <p>
      Learning how
      <a href="<?= BASE_URL ?>/pages/knowledge-base/account-security/phishing-awareness.php">
        phishing attacks
      </a>
      work can help users recognize suspicious QR destinations before entering passwords or payment information.
    </p>

  </div>





  <h3 class="faq-question">
    Can QR codes track users or collect analytics?
  </h3>

  <div class="faq-answer">

    <p>
      Standard static QR codes do not contain built-in tracking systems.
      However, websites opened after scanning may still use cookies,
      analytics scripts, advertising identifiers, or browser tracking technologies.
    </p>

    <p>
      If you want to learn more about online tracking,
      you can explore our articles about
      <a href="<?= BASE_URL ?>/pages/knowledge-base/browser-privacy/ad-trackers.php">
        ad trackers
      </a>
      and
      <a href="<?= BASE_URL ?>/pages/knowledge-base/privacy-basics/online-tracking.php">
        online tracking
      </a>.
    </p>

  </div>





  <h3 class="faq-question">
    Do generated QR codes expire over time?
  </h3>

  <div class="faq-answer">

    <p>
      Static QR codes normally do not expire.
      They continue working as long as the linked destination remains available online.
    </p>

    <p>
      For example, if a QR code points to a webpage that later gets deleted,
      the QR code itself will still scan correctly but the destination page will no longer load.
    </p>

  </div>





  <h3 class="faq-question">
    Can I use generated QR codes commercially?
  </h3>

  <div class="faq-answer">

    <p>
      Yes. Generated QR codes can be used for posters,
      restaurant menus, product packaging, invoices,
      business cards, presentations, advertising campaigns,
      event tickets, and commercial projects.
    </p>

    <p>
      There are no licensing restrictions on QR codes generated using this tool.
    </p>

  </div>





  <h3 class="faq-question">
    Why are some QR codes difficult for phones to scan?
  </h3>

  <div class="faq-answer">

    <p>
      QR readability depends on image clarity, contrast,
      lighting conditions, size, and the amount of encoded information.
    </p>

    <p>
      Very dense QR codes containing large blocks of text may become harder
      for cameras to scan quickly, especially on low-quality displays or printed materials.
    </p>

    <p>
      Using shorter URLs and avoiding blurry screenshots can improve scanning reliability.
    </p>

  </div>





  <h3 class="faq-question">
    Can QR codes redirect users to malware or scam websites?
  </h3>

  <div class="faq-answer">

    <p>
      Yes. Attackers sometimes use QR codes to hide dangerous destinations
      including fake banking portals, malicious downloads,
      cryptocurrency scams, or fraudulent login pages.
    </p>

    <p>
      If you regularly use QR codes on mobile devices,
      reading about
      <a href="<?= BASE_URL ?>/pages/knowledge-base/mobile-privacy/mobile-malware.php">
        mobile malware
      </a>
      and
      <a href="<?= BASE_URL ?>/pages/knowledge-base/cybersecurity/social-engineering.php">
        social engineering
      </a>
      attacks can help improve device security awareness.
    </p>

  </div>





  <h3 class="faq-question">
    What is the difference between static and dynamic QR codes?
  </h3>

  <div class="faq-answer">

    <p>
      Static QR codes permanently store the final content directly inside the QR image.
      Once generated, the destination cannot be edited later.
    </p>

    <p>
      Dynamic QR codes usually redirect through external services that allow
      changing destinations later and often include analytics tracking or click monitoring.
    </p>

    <p>
      PrivacyTestLab generates static QR codes because they are simpler,
      faster, and avoid unnecessary third-party redirects.
    </p>

  </div>





  <h3 class="faq-question">
    Do modern smartphones support QR scanning automatically?
  </h3>

  <div class="faq-answer">

    <p>
      Most modern Android and iPhone devices include native QR scanning support
      directly inside the default camera application.
    </p>

    <p>
      In most cases, simply pointing the camera at the QR code is enough
      for the phone to recognize and open the encoded content automatically.
    </p>

  </div>





  <h3 class="faq-question">
    Can this QR code generator work offline?
  </h3>

  <div class="faq-answer">

    <p>
      Once the page and scripts are fully loaded,
      QR code creation itself happens locally inside your browser using JavaScript.
    </p>

    <p>
      Because generation is client-side, creating QR images does not require
      transmitting the entered content to a remote server.
    </p>

  </div>





  <h3 class="faq-question">
    Where can I learn more about QR code privacy and online security?
  </h3>

  <div class="faq-answer">

    <p>
      PrivacyTestLab also provides educational guides and tools covering
      browser privacy, account security, phishing awareness,
      online scams, and tracking technologies.
    </p>

    <p>
      Helpful related resources include:
    </p>

    <p>
      <a href="<?= BASE_URL ?>/tools/utilities/password-strength-checker.php">
        Password Strength Checker
      </a><br>

      <a href="<?= BASE_URL ?>/pages/knowledge-base/account-security/password-security.php">
        Password Security Guide
      </a><br>

      <a href="<?= BASE_URL ?>/pages/knowledge-base/browser-privacy/javascript-tracking.php">
        JavaScript Tracking Explained
      </a><br>

      <a href="<?= BASE_URL ?>/pages/knowledge-base/cybersecurity/online-scams.php">
        Online Scam Awareness
      </a>
    </p>

  </div>

</section>

<?php require __DIR__ . '/../../app/templates/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/qrcodegenerator.js"></script>
<script src="<?= BASE_URL ?>/assets/js/navbar.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="<?= BASE_URL ?>/assets/js/footer-accordion.js"></script>
</body>
</html>