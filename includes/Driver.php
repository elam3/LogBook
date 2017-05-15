<h3 id='logbook'>Building Log Book</h3>
<div class='row logbook'>
    <?php include('includes/logbookView.php'); ?>
    <?php signIn(); ?>
    <?php echo displayTable(); ?>
</div>


<div class='row'>
</div>


<h3 id='stats'>Building Statistics</h3>
<div class='row stats'>
    <?php include('includes/statsView.php'); ?>
</div>
