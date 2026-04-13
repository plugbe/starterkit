<?php
header('Content-Type: application/json');

$php = PHP_VERSION;
$kirby = null;

// Try Kirby 3/4 composer.json
$composer = __DIR__ . '/kirby/composer.json';
if (file_exists($composer)) {
    $json = json_decode(file_get_contents($composer), true);
    if (isset($json['version'])) {
        $kirby = $json['version'];
    }
}

// Try Kirby 2.x
$kirby2 = __DIR__ . '/kirby/kirby.php';
if ($kirby === null && file_exists($kirby2)) {
    $contents = file_get_contents($kirby2);

    // Pattern 1: define('KIRBY_VERSION', '2.x.x')
    if (preg_match('/define\s*\(\s*[\'"]KIRBY_VERSION[\'"]\s*,\s*[\'"]([\d\.]+)[\'"]\s*\)/i', $contents, $m)) {
        $kirby = $m[1];
    }

    // Pattern 2: c::set('version', '2.x.x')
    if ($kirby === null && preg_match('/c::set\s*\(\s*[\'"]version[\'"]\s*,\s*[\'"]([\d\.]+)[\'"]\s*\)/i', $contents, $m)) {
        $kirby = $m[1];
    }

    // Pattern 3: generic fallback for 2.x version strings
    if ($kirby === null && preg_match('/(["\'])((2\.)\d+(\.\d+)?)(["\'])/', $contents, $m)) {
        $kirby = $m[2];
    }
}

echo json_encode([
    "php" => $php,
    "kirby" => $kirby,
]);
