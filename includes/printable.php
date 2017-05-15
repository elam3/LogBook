<?php
    if (isset($_GET['source'])) {
        echo '<h1>Driver.php</h1>';
        highlight_file('includes/Driver.php');

        echo '<h1>index.php</h1>';
        highlight_file($_SERVER['SCRIPT_FILENAME']);

        echo '<h1>header.php</h1>';
        highlight_file('includes/header.php');

        echo '<h1>navigations.php</h1>';
        highlight_file('includes/navigations.php');

        exit;
    }
?>
