$(document).ready(function ()
{
    $("#alert_msg").hide();
    if (localStorage.getItem('alert_msg'))
    {
        $("#alert_msg").html(localStorage.getItem('alert_msg'));
        $("#alert_msg").show();
        $("#alert_msg").delay(3000).fadeOut();
        localStorage.setItem('alert_msg', '');
    }

    $("#logout").on("click", function (e)
    {
        e.preventDefault();
        //alert("Thank You for using our system");
        localStorage.clear();
        window.location.href = local_site;
    });
});

//if (document.location.href.match(/[^\/]+$/)[0] == 'adminBook.php')
//{
//    var myDataURL = site_url + localdir + "index.php?method=list_book";
//    document.getElementById('table').dataset.url.value = myDataURL;
//
//    var $table = $('#table');
//    $table.bootstrapTable('refresh', {url: myDataURL});
//
//    $('#tableID').tableExport({type: 'pdf',
//        jspdf: {orientation: 'p',
//            margins: {left: 20, top: 10},
//            autotable: false}
//    });
//
//    $(document).ready(function () {
//        $('#table').DataTable();
//    });
//}

if (document.location.href.match(/[^\/]+$/)[0] == 'adminUser.php')
{
    $('#tableID').tableExport({type: 'pdf',
        jspdf: {orientation: 'p',
            margins: {left: 20, top: 10},
            autotable: false}
    });

    $(document).ready(function () {
        $('#table').DataTable();
    });
}