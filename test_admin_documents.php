<?php
// Test script to check admin document access
// Run this in the browser: http://localhost:8080/test_admin_documents.php

// Set the base paths
$base_public = 'd:\ngo-vikrant\public\uploads\applications\\';
$base_writable = 'd:\ngo-vikrant\writable\uploads\applications\\';

echo "<h2>Testing Admin Document Access</h2>";

// List files in public directory
echo "<h3>Files in Public Directory:</h3>";
if (is_dir($base_public)) {
    $files = scandir($base_public);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..' && $file != '.htaccess' && $file != 'index.html') {
            $filepath = $base_public . $file;
            echo "<p><strong>File:</strong> $file</p>";
            echo "<p><strong>Exists:</strong> " . (file_exists($filepath) ? 'Yes' : 'No') . "</p>";
            echo "<p><strong>Readable:</strong> " . (is_readable($filepath) ? 'Yes' : 'No') . "</p>";
            echo "<p><strong>Size:</strong> " . filesize($filepath) . " bytes</p>";
            echo "<p><strong>MIME:</strong> " . mime_content_type($filepath) . "</p>";
            echo "<p><a href='/admin/view-document/" . urlencode($file) . "' target='_blank'>View Document</a> | ";
            echo "<a href='/admin/download-document/" . urlencode($file) . "'>Download Document</a></p>";
            echo "<hr>";
        }
    }
} else {
    echo "<p>Public uploads directory does not exist!</p>";
}

// Check writable directory for comparison
echo "<h3>Files in Writable Directory:</h3>";
if (is_dir($base_writable)) {
    $files = scandir($base_writable);
    $hasFiles = false;
    foreach ($files as $file) {
        if ($file != '.' && $file != '..' && $file != '.htaccess' && $file != 'index.html') {
            $hasFiles = true;
            echo "<p>$file</p>";
        }
    }
    if (!$hasFiles) {
        echo "<p>No files in writable directory (this is expected)</p>";
    }
} else {
    echo "<p>Writable uploads directory does not exist!</p>";
}

// Check .htaccess configuration
echo "<h3>Security Configuration:</h3>";
$htaccess_public = $base_public . '.htaccess';
if (file_exists($htaccess_public)) {
    echo "<p><strong>Public .htaccess exists:</strong> Yes</p>";
    echo "<pre>" . htmlspecialchars(file_get_contents($htaccess_public)) . "</pre>";
} else {
    echo "<p><strong>Public .htaccess exists:</strong> No</p>";
}
?>