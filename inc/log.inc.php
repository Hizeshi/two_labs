<?php
$dt = time();

$page = $_SERVER['REQUEST_URI'];

$ref = $_SERVER['HTTP_REFERER'] ?? '';

$path = $dt . '|' . $page . '|' . $ref . "\n";

$logFile = $_SERVER['DOCUMENT_ROOT'] . '/log/' . PATH_LOG;
file_put_contents($logFile, $path, FILE_APPEND | LOCK_EX);
?>