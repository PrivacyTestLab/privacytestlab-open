<?php
/**
 * Dynamic sitemap generator — outputs XML for Googlebot.
 * Always use https://privacytestlab.com as the canonical domain.
 * Submit /sitemap.xml to Google Search Console (static copy).
 * Use this file to regenerate sitemap.xml when pages change.
 */

header('Content-Type: application/xml; charset=utf-8');

$baseUrl = 'https://privacytestlab.com';
$root    = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n\n";

/* ── Helper: emit a <url> block ── */
function sitemap_url(string $loc, string $lastmod, string $changefreq, string $priority): void {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . "</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>$changefreq</changefreq>\n";
    echo "    <priority>$priority</priority>\n";
    echo "  </url>\n";
}

/* ── Hardcoded homepage (highest priority) ── */
sitemap_url($baseUrl . '/', date('Y-m-d'), 'weekly', '1.00');

/* ── Sections to scan with their SEO settings ── */
$sections = [
    'articles'  => ['priority' => '0.75', 'changefreq' => 'monthly'],
    'tools'     => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'guides'    => ['priority' => '0.70', 'changefreq' => 'monthly'],
    'writters'  => ['priority' => '0.65', 'changefreq' => 'monthly'],
    'pages'     => ['priority' => '0.55', 'changefreq' => 'monthly'],
    'legal'     => ['priority' => '0.30', 'changefreq' => 'yearly'],
];

/* ── Files that should never appear in the sitemap ── */
$excludeFiles = [
    'article-card.php',
    'submit-issue.php',
    'report-issue.php',
];

/* ── Subfolder priority overrides for tools ── */
$toolPriority = [
    '/tools/leak-tests/'   => '0.90',
    '/tools/security/'     => '0.90',
    '/tools/network-tools/'=> '0.85',
    '/tools/privacy-tools/'=> '0.85',
    '/tools/speed/'        => '0.75',
    '/tools/utilities/'    => '0.75',
];

foreach ($sections as $section => $cfg) {

    $folder = $root . '/' . $section;
    if (!is_dir($folder)) continue;

    echo "\n  <!-- $section -->\n";

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folder, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {

        if (!$file->isFile()) continue;
        if (strtolower($file->getExtension()) !== 'php') continue;

        $filename = $file->getFilename();

        /* Skip non-public / component files */
        if (in_array($filename, $excludeFiles, true)) continue;

        $fullPath = str_replace('\\', '/', $file->getPathname());

        /* Build relative URL path (no extension, no /index.php) */
        $rel = str_replace($root, '', $fullPath);
        $rel = preg_replace('#/index\.php$#i', '/', $rel);
        $rel = preg_replace('#\.php$#i', '', $rel);

        /* Determine priority — tools have subfolder overrides */
        $priority = $cfg['priority'];
        if ($section === 'tools') {
            foreach ($toolPriority as $prefix => $p) {
                if (str_starts_with($rel, $prefix)) {
                    $priority = $p;
                    break;
                }
            }
        }

        /* pages: override specific high-value pages */
        if ($section === 'pages' && str_contains($rel, 'article-suggestion')) {
            $priority   = '0.60';
            $changefreq = 'weekly';
        } else {
            $changefreq = $cfg['changefreq'];
        }

        $lastmod = date('Y-m-d', filemtime($fullPath));

        sitemap_url($baseUrl . $rel, $lastmod, $changefreq, $priority);
    }
}

echo "\n</urlset>\n";
