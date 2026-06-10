<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PrivacyTestLab/app/config.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
}

$pageTitle = "Image Metadata Remover – Scrub EXIF, GPS & Hidden Data Locally";
$pageDescription = "Instantly remove EXIF metadata, GPS location, and timestamps from your photos. 100% private: your images are never uploaded or stored. Safe, fast, and free.";
$pageUrl = BASE_URL . "/tools/privacy/metadata-remover.php";

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

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/layout.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/articles.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/tools/metadata-remover.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<script src="https://cdn.jsdelivr.net/npm/exifr/dist/full.umd.js"></script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "PrivacyTestLab Metadata Remover",
  "url": "<?= htmlspecialchars($pageUrl) ?>",
  "applicationCategory": "SecurityApplication",
  "operatingSystem": "Any",
  "browserRequirements": "Requires JavaScript enabled",
  "description": "Browser-based metadata remover for deleting EXIF data, GPS coordinates, timestamps, and hidden image information without uploading files.",
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
  "name": "What is image metadata (EXIF data) and why should I remove it?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Image metadata, or EXIF (Exchangeable Image File Format) data, is hidden information embedded within your photo files by your camera or smartphone. It includes sensitive details such as the exact GPS coordinates of where the photo was taken, the date and time of capture, the device model, and even camera settings. Removing this data is crucial for privacy because it prevents strangers from tracking your movements, identifying your home or workplace location, and profiling your personal habits."
  }
},

    {
  "@type": "Question",
  "name": "Is it safe to upload my personal photos to an online metadata remover?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Generally, using standard online tools involves a security risk as your images must be uploaded to a remote server for processing. However, PrivacyTestLab is built with modern security architecture that handles all metadata removal entirely inside your local web browser. Your images never leave your computer, ensuring they are not stored, logged, or intercepted by third parties during the scrubbing process."
  }
},

    {
  "@type": "Question",
  "name": "What kind of information is hidden in my photo's metadata?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Photo metadata, often called EXIF data, contains technical and personal information. It includes device details like the camera model and serial number, exposure settings, ISO, and focal length. More importantly for privacy, it frequently stores a timestamp of when the photo was taken and, if enabled, the exact GPS coordinates (latitude/longitude) of the location, creating a detailed digital map of your activities."
  }
},

   {
  "@type": "Question",
  "name": "Will removing metadata reduce the quality or resolution of my image?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "No, removing metadata does not affect the visual quality, resolution, or color profile of your image. Our metadata removal process strictly scrubs the non-visual information (EXIF headers) attached to the file. The actual pixel data—the part of the image you see—remains 100% untouched and identical to the original."
  }
},

{
  "@type": "Question",
  "name": "Does this tool store, log, or keep copies of the images I upload?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "No. PrivacyTestLab does not store, log, or transmit your images to any server. Our metadata remover performs all processing locally within your device's web browser memory. Once you refresh or close your browser tab, the data is completely wiped from your device, ensuring total privacy."
  }
},

{
  "@type": "Question",
  "name": "Can I remove GPS location data without deleting other metadata like camera settings?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Most standard 'metadata removers' are all-or-nothing tools that scrub the entire EXIF header. Because our current implementation focuses on maximum privacy and security, it removes all metadata at once to ensure no hidden tracking data remains. For selective editing—where you want to keep camera settings but remove GPS—you would typically need advanced manual EXIF editing software."
  }
},

{
  "@type": "Question",
  "name": "What file formats are supported for metadata removal?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Our metadata remover currently supports the most common image formats used across the web, including JPEG (.jpg, .jpeg), PNG (.png), and WebP (.webp). These formats are widely used on social media, websites, and mobile devices, making them the most important files to scrub for hidden tracking data before you share them publicly."
  }
},

{
  "@type": "Question",
  "name": "Do social media sites like Facebook or Instagram automatically remove metadata?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Yes, many major platforms like Facebook, Instagram, and X (formerly Twitter) do strip EXIF metadata when you upload photos. However, you should not rely on this as a guaranteed privacy solution. Many forums, personal blogs, email attachments, and direct messaging services do not remove metadata, leaving your private location and device details exposed. It is always safer to scrub your files locally before uploading them anywhere."
  }
},

{
  "@type": "Question",
  "name": "Why does my screenshot show metadata even though I didn't take it with a camera?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Screenshots often contain metadata added by your operating system, such as the exact time of capture and the software used to create the image (e.g., 'macOS Preview' or 'Windows Snipping Tool'). While they typically lack GPS coordinates, they can still reveal information about your system configuration and the exact time you captured your screen, which can be used to track user habits or document workflows."
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

<div class="meta-page">

  <!-- HERO -->
  <section class="meta-hero">

    <h1>
      Remove hidden <span>metadata</span> from images
    </h1>

    <p>
      Remove EXIF data, GPS coordinates, timestamps, camera details,
      and hidden metadata before sharing images online.
      Everything runs locally in your browser for better privacy.
    </p>

  </section>

  <!-- TOOL -->
  <section class="meta-tool-section">

    <div class="meta-tool-card">

      <!-- LEFT -->
      <div class="meta-left">

        <div class="meta-header">

          

          <div>

            <h2>Upload an image</h2>

         

          </div>

        </div>

        

        <!-- UPLOAD -->
        <div
          class="upload-area"
          id="upload-area"
        >

          <img
            src="../../assets/img/icons/upload-cloud.png"
            alt="Upload"
            class="upload-icon"
          >

          <h3>Drop image here</h3>

          <p>
            or choose a file from your device
          </p>

          <input
            type="file"
            id="image-input"
            accept="image/png,image/jpeg,image/webp"
            hidden
          >

          <button
            type="button"
            id="choose-file-btn"
          >
            Choose Image
          </button>

          <!-- QUICK ACTIONS -->
          <div class="upload-actions">

            <button
              type="button"
              class="upload-action-btn"
              id="paste-btn"
            >
              <img
                src="../../assets/img/icons/clipboard.png"
                alt="Clipboard"
              >
              Paste
            </button>

            <button
              type="button"
              class="upload-action-btn"
              id="url-btn"
            >
              <img
                src="../../assets/img/icons/link.png"
                alt="URL"
              >
              URL
            </button>

          </div>

        </div>

        <!-- IMAGE INFO -->
        <div
          class="image-info"
          id="image-info"
        >

          <div class="info-row">

            <div class="info-label">
              <img
                src="../../assets/img/icons/image-file.png"
                alt="Image"
              >
              File Name
            </div>

            <div
              class="info-value"
              id="file-name"
            >
              —
            </div>

          </div>

          <div class="info-row">

            <div class="info-label">
              <img
                src="../../assets/img/icons/metadata.png"
                alt="Metadata"
              >
              Metadata Status
            </div>

            <div
              class="info-value"
              id="metadata-status"
            >
              Waiting for image
            </div>

          </div>

          <div class="info-row">

            <div class="info-label">
              <img
                src="../../assets/img/icons/gps.png"
                alt="GPS"
              >
              GPS Location
            </div>

            <div
              class="info-value"
              id="gps-status"
            >
              —
            </div>

          </div>

          <div class="info-row">

            <div class="info-label">
              <img
                src="../../assets/img/icons/camera.png"
                alt="Camera"
              >
              Camera Information
            </div>

            <div
              class="info-value"
              id="camera-status"
            >
              —
            </div>

          </div>

          <div class="info-row">

            <div class="info-label">
              <img
                src="../../assets/img/icons/clock.png"
                alt="Timestamp"
              >
              Timestamp Data
            </div>

            <div
              class="info-value"
              id="timestamp-status"
            >
              —
            </div>

          </div>

        </div>

        <!-- ACTIONS -->
        <div class="tool-buttons">

          <button
            type="button"
            id="clean-btn"
            disabled
          >
            Remove Metadata
          </button>

          <button
            type="button"
            id="download-btn"
            disabled
          >
            <img
              src="../../assets/img/icons/download.png"
              alt="Download"
            >
            Download Clean Image
          </button>

        </div>

        
      </div>

      <!-- RIGHT -->
      <div class="meta-right">

        <div class="preview-box">

          <div class="preview-inner">

            <span id="preview-placeholder">
              Image Preview
            </span>

            <img
              id="preview-image"
              alt="Preview"
            >

          </div>

        </div>

        <!-- RESULT -->
        <div
          class="result-box"
          id="result-box"
        >

          <div class="result-header">

            <img
              src="../../assets/img/icons/success-check.png"
              alt="Success"
            >

            <h3>Metadata removal complete</h3>

          </div>

          <p>
            Hidden EXIF information has been removed from the image.
            The cleaned file is now safer to share across social media,
            forums, email, and cloud platforms.
          </p>

        </div>
<!-- PRIVACY NOTE -->
        <div class="privacy-note">

          <img
            src="../../assets/img/icons/privacy-shield.png"
            alt="Privacy"
          >

          <p>
            PrivacyTestLab does not upload, log, or permanently store your images.
            Metadata removal happens locally inside your browser session.
          </p>

        </div>

        

      </div>

    </div>

  </section>

  

</div>


<!-- FAQ -->
<div class="article-container-layer">
    <section class="faq-section">

       <!-- Replace your current H1 with this -->
<h1 class="article-main-title">The Hidden Information in Your Photos: A Guide to Metadata</h1>
        <div class="faq-block" id="what-is-metadata" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid #e2e8f0;">
    <h3 style="font-size: 1.25rem; color: #1e293b; margin-bottom: 12px;">What is image metadata (EXIF data) and why should I remove it?</h3>
    <p style="line-height: 1.75; color: #475569; font-size: 1rem;">
        Think of metadata as a "digital fingerprint" attached to your images. Every time you snap a photo, your device automatically records a wealth of hidden technical data.
    </p>
    
    <div style="background: #f8fafc; padding: 15px; border-left: 4px solid #3b82f6; margin: 15px 0;">
        <strong style="color: #1e293b;">Common metadata includes:</strong>
        <ul style="margin: 8px 0 0 20px; color: #475569;">
            <li><strong>GPS Coordinates:</strong> Your exact physical location.</li>
            <li><strong>Timestamp:</strong> The precise second the photo was taken.</li>
            <li><strong>Device Info:</strong> The model of your phone and often its unique serial number.</li>
            <li><strong>Technical Settings:</strong> Lens type, exposure, and ISO.</li>
        </ul>
    </div>

    <p style="line-height: 1.75; color: #475569; font-size: 1rem;">
        Removing this data before uploading photos to public forums, email, or social media ensures that you are only sharing the image itself—not a roadmap of your private life.
    </p>
</div>




 <div class="faq-block" id="safety-privacy" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">Is it safe to upload my personal photos to an online metadata remover?</h3>
    
    <div class="faq-body" style="margin-top: 14px;">
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            This is the most critical question when using privacy tools. For standard online services, the answer is often <strong>"No,"</strong> because they require you to transmit your image to their server, exposing your data to potential interception, logging, or data breaches on their end.
        </p>

        <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 20px; border-radius: 0 8px 8px 0; margin: 24px 0;">
            <strong style="color: #065f46; display: block; font-size: 0.95rem; margin-bottom: 10px;">🛡️ The PrivacyTestLab Difference: Local Processing</strong>
            <p style="margin: 0; font-size: 0.95rem; color: #064e3b; line-height: 1.6;">
                Our Image Metadata Remover utilizes a strict <span class="highlight-green">client-side approach</span>. By leveraging modern browser APIs (including tools like <code>exifr</code> for accurate auditing and the HTML5 Canvas for purging, as utilized in our tool's architecture), the entire scrubbing process happens entirely within your own web browser. No data is ever transmitted or stored on our servers.
            </p>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 0; font-size: 1rem;">
            This architectural distinction—where we only act as the *provider* of the cleaning software rather than the *processor* of your data—makes our tool exceptionally safe. When you use this tool, your private photos remain exactly where they belong: under your exclusive control.
        </p>
    </div>
</div>



<div class="faq-block" id="what-is-hidden-in-metadata" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">What kind of information is hidden in my photo's metadata?</h3>
    
    <div class="faq-body" style="margin-top: 14px;">
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            When you snap a photo, your device doesn't just save the image pixels; it appends a "Data Header" to the file. This header is the metadata, and it is surprisingly detailed. To visualize how this works, think of your image as a letter—the photo is the content, and the metadata is the envelope containing the sender's details and a GPS tracking chip.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px; margin: 24px 0;">
            <div style="background: #fdf2f8; border: 1px solid #fbcfe8; padding: 16px; border-radius: 8px;">
                <strong style="color: #9d174d; display: block; margin-bottom: 8px;">📍 Location Data</strong>
                <p style="margin: 0; font-size: 0.9rem; color: #831843;">Includes Latitude, Longitude, and sometimes Altitude, pin-pointing your location within a few meters.</p>
            </div>
            <div style="background: #fdf2f8; border: 1px solid #fbcfe8; padding: 16px; border-radius: 8px;">
                <strong style="color: #9d174d; display: block; margin-bottom: 8px;">⏱️ Time & Date</strong>
                <p style="margin: 0; font-size: 0.9rem; color: #831843;">The exact date and microsecond the shutter was pressed, revealing your daily routines.</p>
            </div>
            <div style="background: #fdf2f8; border: 1px solid #fbcfe8; padding: 16px; border-radius: 8px;">
                <strong style="color: #9d174d; display: block; margin-bottom: 8px;">📱 Device Signature</strong>
                <p style="margin: 0; font-size: 0.9rem; color: #831843;">The specific camera model, manufacturer, and software version used to process the image.</p>
            </div>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-top: 16px; font-size: 1rem;">
            While useful for photographers organizing their professional portfolio, this information is a goldmine for data scrapers and bad actors. By auditing your files with our <a href="<?= BASE_URL ?>/tools/security/metadata-remover.php" style="color: #2563eb; text-decoration: underline;">online metadata audit tool</a>, you can see exactly which of these data points are attached to your current files before you accidentally share them publicly.
        </p>
    </div>
</div>


        <!-- QUESTION 4 BLOCK: Passphrase vs Random Password -->
<div class="faq-block" id="will-quality-decrease" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">Will removing metadata reduce the quality or resolution of my image?</h3>
    
    <div class="faq-body" style="margin-top: 14px;">
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            One of the most common hesitations users have is the fear that "cleaning" a file will compress it or blur it. Let's be clear: <strong>Metadata removal and image compression are two entirely different technical processes.</strong>
        </p>

        <div style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 20px; background: #ffffff;">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="width: 40px; height: 40px; background: #dcfce7; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">✅</div>
                <h4 style="margin: 0; color: #1e293b;">Metadata Scrubbing</h4>
            </div>
            <p style="margin: 0 0 15px 55px; color: #64748b; font-size: 0.95rem;">Only removes the invisible "envelope" of text data attached to the file. The image itself stays 100% original.</p>

            <div style="display: flex; align-items: center; margin-bottom: 5px;">
                <div style="width: 40px; height: 40px; background: #fee2e2; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">⚠️</div>
                <h4 style="margin: 0; color: #1e293b;">Image Compression</h4>
            </div>
            <p style="margin: 0 0 0 55px; color: #64748b; font-size: 0.95rem;">Actually resamples or re-encodes the image pixels to save space, which <em>can</em> cause loss of detail.</p>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-top: 20px; font-size: 1rem;">
            Our tool operates solely on the first process. When you scrub an image using our <a href="<?= BASE_URL ?>/tools/security/metadata-remover.php" style="color: #2563eb; text-decoration: underline;">online metadata remover</a>, the pixel-perfect integrity of your photograph is preserved. Whether you are uploading a raw high-resolution shot or a standard JPEG, the final output will be visually indistinguishable from the source.
        </p>
    </div>
</div>




    <!-- QUESTION 5 BLOCK: Privacy Guarantee & Data Retention -->
<div class="faq-block" id="data-storage-policy" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">Does this tool store, log, or keep copies of the images I upload?</h3>
    
    <div class="faq-body" style="margin-top: 14px;">
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            We know that when you are dealing with private photos—especially those containing sensitive location or personal information—the biggest concern is, <em>"Who else is seeing this?"</em>
        </p>

        <!-- DIFFERENT DESIGN: Minimalist "No-Log" Status Grid -->
        <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 24px; border-radius: 12px; display: flex; justify-content: space-between; text-align: center;">
            <div style="flex: 1;">
                <div style="font-size: 1.5rem; margin-bottom: 8px;">🚫</div>
                <strong style="display: block; color: #475569;">No Server Uploads</strong>
            </div>
            <div style="flex: 1;">
                <div style="font-size: 1.5rem; margin-bottom: 8px;">🚫</div>
                <strong style="display: block; color: #475569;">No Activity Logs</strong>
            </div>
            <div style="flex: 1;">
                <div style="font-size: 1.5rem; margin-bottom: 8px;">🚫</div>
                <strong style="display: block; color: #475569;">No Permanent Storage</strong>
            </div>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-top: 20px; font-size: 1rem;">
            Unlike traditional cloud-based photo editors, we operate on a "Zero-Trust" model. The processing happens strictly within your browser's local memory (RAM). Because there is no server-side component for this specific tool, it is mathematically impossible for us to store or view your files. 
        </p>
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-top: 10px; font-size: 1rem;">
            For your peace of mind, feel free to turn off your Wi-Fi after the page has loaded; our tool will continue to function perfectly, proving that no network connection or external database is required. Learn more about our commitment to user security on our <a href="<?= BASE_URL ?>/security-policy" style="color: #2563eb; text-decoration: underline;">Security Policy page</a>.
        </p>
    </div>
</div>


<!-- QUESTION 6 BLOCK: Selective vs. Total Scrubbing -->
<div class="faq-block" id="selective-metadata-removal" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">Can I remove GPS location data without deleting other metadata like camera settings?</h3>
    
    <div class="faq-body" style="margin-top: 14px;">
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            It is a great question for photography enthusiasts who want to share their technical skills (like aperture, ISO, and shutter speed) without sharing their home address. 
        </p>

        <!-- DIFFERENT DESIGN: A Simple Comparison Table -->
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="background: #f8fafc;">
                    <tr>
                        <th style="padding: 12px; border-bottom: 1px solid #e2e8f0;">Feature</th>
                        <th style="padding: 12px; border-bottom: 1px solid #e2e8f0;">Our Tool</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #e2e8f0;">Privacy Goal</td>
                        <td style="padding: 12px; border-bottom: 1px solid #e2e8f0; color: #0f172a;">Maximum Security</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #e2e8f0;">Metadata Scrubbing</td>
                        <td style="padding: 12px; border-bottom: 1px solid #e2e8f0; color: #0f172a;">Full/Comprehensive</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px;">Selective Editing</td>
                        <td style="padding: 12px; color: #64748b;">Not Supported</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-top: 20px; font-size: 1rem;">
            While selective editing is technically possible with complex desktop software, our <a href="<?= BASE_URL ?>/tools/security/metadata-remover.php" style="color: #2563eb; text-decoration: underline;">browser-based metadata remover</a> is optimized for a <em>"clean-slate"</em> approach. When it comes to privacy, we believe in the safest path: removing all hidden data identifiers. This eliminates the risk of accidentally leaving behind a partial data trail that could still be used to identify your location or device.
        </p>
    </div>
</div>




<!-- QUESTION 7 BLOCK: Supported Formats -->
<div class="faq-block" id="supported-formats" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">What file formats are supported for metadata removal?</h3>
    
    <div class="faq-body" style="margin-top: 14px;">
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            To ensure the highest level of privacy across your digital life, we have optimized our tool to handle the formats you use most frequently. 
        </p>

        <!-- DIFFERENT DESIGN: A Simple "Tag" Style List -->
        <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 20px;">
            <span style="background: #e0f2fe; color: #0369a1; padding: 8px 16px; border-radius: 20px; font-weight: 600; border: 1px solid #bae6fd;">JPEG / JPG</span>
            <span style="background: #e0f2fe; color: #0369a1; padding: 8px 16px; border-radius: 20px; font-weight: 600; border: 1px solid #bae6fd;">PNG</span>
            <span style="background: #e0f2fe; color: #0369a1; padding: 8px 16px; border-radius: 20px; font-weight: 600; border: 1px solid #bae6fd;">WebP</span>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; font-size: 1rem;">
            Whether you are uploading a photo from your iPhone, a screenshot from your computer, or a web graphic, our <a href="<?= BASE_URL ?>/tools/security/metadata-remover.php" style="color: #2563eb; text-decoration: underline;">PrivacyTestLab utility</a> is built to strip the metadata headers from these files. If you have a specific, less common file format that you think needs support, feel free to <a href="<?= BASE_URL ?>/contact" style="color: #2563eb; text-decoration: underline;">reach out to us</a>—we are constantly updating our tools based on user feedback.
        </p>
    </div>
</div>


<div class="faq-block" id="social-media-privacy" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">Do social media sites like Facebook or Instagram automatically remove metadata?</h3>
    
    <div class="faq-body" style="margin-top: 14px;">
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            This is a common misconception. While it is true that giant platforms like Instagram and Facebook strip EXIF data to reduce file sizes and protect user privacy, <strong>you are playing a dangerous game if you rely on them to do it for you.</strong>
        </p>

        <div style="background: #fffbeb; border: 1px solid #fde68a; padding: 20px; border-radius: 8px; color: #92400e;">
            <strong style="display: block; margin-bottom: 8px;">⚠️ The "Platform Reliance" Trap</strong>
            <p style="margin: 0; font-size: 0.95rem; line-height: 1.6;">
                If you upload a photo to a forum, a personal website, a private cloud storage link, or send it as an email attachment, <strong>the metadata remains intact.</strong> Platforms do not disclose their internal data-stripping policies for every single upload, meaning your GPS data could be visible to anyone who downloads that file.
            </p>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-top: 20px; font-size: 1rem;">
            Taking control of your own data means not trusting third-party platforms to "clean up" after you. By running your images through our <a href="<?= BASE_URL ?>/tools/security/metadata-remover.php" style="color: #2563eb; text-decoration: underline;">local metadata scrubbing tool</a> before you hit the "upload" button, you ensure that your privacy is secured from the moment the file leaves your computer—regardless of where it lands on the internet.
        </p>
    </div>
</div>


<div class="faq-block" id="screenshot-metadata" style="margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid #f1f5f9;">
    <h3 class="faq-question">Why does my screenshot show metadata even though I didn't take it with a camera?</h3>
    
    <div class="faq-body" style="margin-top: 14px;">
        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-bottom: 16px; font-size: 1rem;">
            It is a common myth that only "photos" have metadata. In reality, modern operating systems like Windows, macOS, Android, and iOS are designed to catalog almost every file you create—including screenshots.
        </p>

        <div style="background-color: #f0f9ff; border: 1px solid #bae6fd; padding: 20px; border-radius: 8px;">
            <p style="margin: 0; color: #0c4a6e; font-size: 0.95rem; line-height: 1.6;">
                <strong>What your OS hides in your screenshots:</strong>
                <ul style="margin: 10px 0 0 20px; padding: 0;">
                    <li><strong>Creation Time:</strong> Reveals the exact moment you captured the screen.</li>
                    <li><strong>Software Source:</strong> Identifies if you used the Windows Snipping Tool, macOS Preview, or a third-party app.</li>
                    <li><strong>Color Profiles:</strong> Technical data about your screen calibration and resolution settings.</li>
                </ul>
            </p>
        </div>

        <p class="faq-answer" style="line-height: 1.75; color: #334155; margin-top: 20px; font-size: 1rem;">
            While screenshots rarely contain GPS location data, they can reveal information about your workflow, your device's operating system, and the specific time you were active at your computer. If you are sharing a screenshot of a private conversation, a document, or your desktop, scrubbing it with our <a href="<?= BASE_URL ?>/tools/security/metadata-remover.php" style="color: #2563eb; text-decoration: underline;">metadata scrubbing tool</a> is a simple, effective way to ensure that your digital footprint stays minimal.
        </p>
    </div>
</div>


</section>
</div>

<?php require __DIR__ . '/../../app/templates/footer.php'; ?>

<script src="<?= BASE_URL ?>/assets/js/metadata-remover.js"></script>
<script src="<?= BASE_URL ?>/assets/js/navbar.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="<?= BASE_URL ?>/assets/js/footer-accordion.js"></script>
</body>
</html>