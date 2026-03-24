<?php

$file = "counter.txt";

// bots filter
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
if (preg_match('/bot|crawl|spider|curl/i', $user_agent)) {
    exit;
}

// bestand maken indien nodig
if (!file_exists($file)) {
    file_put_contents($file, "0");
}

// alleen lezen (geen +1)
if (isset($_GET['read'])) {
    echo file_get_contents($file);
    exit;
}

// anders: verhogen
$count = (int)file_get_contents($file);
$count++;
file_put_contents($file, $count);

echo $count;

?>