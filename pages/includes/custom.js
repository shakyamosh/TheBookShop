$(document).ready(function () {
    $("#alert_msg").hide();
    if (localStorage.getItem('alert_msg'))
    {
        $("#alert_msg").html(localStorage.getItem('alert_msg'));
        $("#alert_msg").show();
        $("#alert_msg").delay(3000).fadeOut();
        localStorage.setItem('alert_msg', '');
    }
    
    $("#logout").on("click", function (e) {
        e.preventDefault();
        //alert("Thank You for using our system");
        localStorage.clear();
        window.location.href = local_site;
    });
});