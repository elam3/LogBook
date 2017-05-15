<script>
// AJAX function replaces sign out button with time output from signout.php
function out() {
    //Pass cell ID number as function variable;
    //grab corresponding user name
    var cellid = arguments[0];
    var visitor = document.getElementById("name" + cellid).innerHTML;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //If AJAX is successful,
            //replace signout cell with time stamp from signout.php
            document.getElementById("out" + cellid).innerHTML = this.responseText;
        }
    };
    //Pass name over AJAX
    xmlhttp.open("GET", "includes/signout-v3.php?x=" + visitor, true);
    xmlhttp.send();
}
</script>
