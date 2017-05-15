<?php
    if (isset($_GET['source'])) {
        echo '<h1>Driver.php</h1>';
        highlight_file('includes/Driver.php');

        echo '<h1>logbookView.php</h1>';
        highlight_file('includes/logbookView.php');

        echo '<h1>statsView.php</h1>';
        highlight_file('includes/statsView.php');

        echo '<h1>ajax.php</h1>';
        highlight_file('includes/ajax.php');

        echo '<h1>signout-v3.php</h1>';
        highlight_file('includes/signout-v3.php');

        echo '<h1>Functions.php</h1>';
        highlight_file('includes/Functions.php');

        echo '<h1>index.php</h1>';
        highlight_file($_SERVER['SCRIPT_FILENAME']);

        echo '<h1>header.php</h1>';
        highlight_file('includes/header.php');

        echo '<h1>navigations.php</h1>';
        highlight_file('includes/navigations.php');

        exit;
    }
?>
