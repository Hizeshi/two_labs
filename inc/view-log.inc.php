<?php
$logFile = $_SERVER['DOCUMENT_ROOT'] . '/log/' . PATH_LOG;

if (file_exists($logFile)) {
    echo "<h2>Журнал посещений</h2>";
    echo "<div class='log-entries'>";
    
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    if (!empty($lines)) {
        echo "<ul>";
        $lines = array_reverse($lines);
        
        foreach ($lines as $line) {
            $parts = explode('|', $line);
            
            if (count($parts) >= 3) {
                $timestamp = $parts[0];
                $page = $parts[1];
                $referrer = $parts[2];
                
                $formattedDate = date('d-m-Y H:i:s', $timestamp);
                
                echo "<li><strong>$formattedDate</strong> - $page";
                if (!empty($referrer)) {
                    echo " -> $referrer";
                }
                echo "</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>Журнал посещений пуст.</p>";
    }
    
    echo "</div>";
} else {
    echo "<p>Файл журнала не найден.</p>";
}
?>