<?php
    // Reference: https://stackoverflow.com/questions/18818340/last-modification-date-of-a-webpage-using-php
    $file = $_SERVER["SCRIPT_FILENAME"];
    if (file_exists($file)) {
        echo "This page was last modified on: " . date("F d Y H:i:s", filemtime($file));
    }
    ?>



