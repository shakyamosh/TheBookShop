<!DOCTYPE html>
<html>
    <head>
        <title>TheBookShop</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/bootstrap-table.min.css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/animate.min.css" media="all">       
        <link rel="stylesheet" href="../../assets/css/custom.css" type="text/css">

        <script type="text/javascript" src="../../assets/js/config.js"></script>

        <script>
            if (localStorage.getItem('loggedIn') == null) {
                try {
                    //stop most browsers loading
                    window.stop();
                    //alert("Please Login First");
                } catch (e) {
                    //IE stop loading content
                    document.execCommand('Stop');
                }
                window.location.href = local_site;
            }

            function runningFormatter(value, row, index) {
                return 1 + index;
            }
        </script>

        <style>
            label, input { display:block; }
            input.text { margin-bottom:12px; width:95%; padding: .4em; }
            fieldset { padding:0; border:0; margin-top:25px; }
            h1 { font-size: 1.2em; margin: .6em 0; }
            div#users-contain { width: 350px; margin: 20px 0; }
            div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
            div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
            .ui-dialog .ui-state-error { padding: .3em; }
            .validateTips { border: 1px solid transparent; padding: 0.3em; }
        </style>
    </head>
    <body>

        <?php include 'adminNav.php' ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="table-responsive" style="border: none; margin-bottom: 15px;">
                        <table id ="table_comment" class="table table-striped table-hover"
                               data-toggle="table"
                               data-show-export="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="true"
                               data-search="true"
                               data-pagination="true"
                               data-sort-name="name"
                               data-sort-order="asc"
                               data-url="">
                            <thead>
                                <tr>
                                    <th data-formatter="runningFormatter">S.No.</th>
                                    <th data-field="name" data-sortable='true'>Name</th>
                                    <th data-field="email" data-sortable='true'>Email</th>
                                    <th data-field="phone" data-sortable='true'>Phone</th>
                                    <th data-field="comment" data-sortable='true'>Comment</th>
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>

                            <tbody id="recent_cmnt">

                            </tbody>
                        </table>

                        <div id="dialog-confirm" title="Delete Comment">
                            <p style="margin: 14px 0px;">
                                <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                                This item will be permanently deleted and cannot be recovered. Are you sure?
                            </p>
                            <!--<button class="btn btn-default" id="">Delete</button>-->
                        </div>

                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px;"></div>
        </div>  

        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery-ui.min.js"></script>        
        <script type="text/javascript" src="../../assets/js/download/bootstrap-table.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/bootstrap-table-export.js"></script>
        <script type="text/javascript" src="../../assets/js/download/tableExport.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/libs/jsPDF/jspdf.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>

        <script type="text/javascript" src="../../assets/js/custom.js"></script>

        <script>
//            var cmnt = '';
//            var count = 1;
//            var url = site_url + localdir + "index.php?method=late_cmnt";
//            $.ajax({
//                url: url,
//                type: "POST",
//                data: null,
//                dataType: "JSON",
//                success: function (data, textStatus, jqXHR)
//                {
//                    if (data.response == null || jQuery.isEmptyObject(data.response))
//                    {
//                        $("#rcnt_cmnt").html("<td colspan='5'><h2>No comments found !!</h2></td>");
//                    } else
//                    {
//                        var nowComnt = data.response;
//
//                        $.each(nowComnt, function (index, value)
//                        {
//                            var status = '';
//                            if (value.status == 1)
//                            {
//                                status = "<span class='label label-success'>Active</span>";
//                            } else
//                            {
//                                status = "<span class='label label-danger'>In Active</span>";
//                            }
//
//                            cmnt += "<tr><td>" + count + "</td><td>" + value.name + "</td><td>" + value.email + "</td><td>"
//                                    + value.comment + "</td><td>" + status + "</td><td>" +
//                                    "<button class='btn btn-danger btn-sm commentDel' id='" + value.contact_id + "'><span class='glyphicon glyphicon-trash'></span></button>" + "</td></tr>";
//                            count++;
//                        });
//                        $("#recent_cmnt").html(cmnt);
//                    }
//                }
//            });

//            if (document.location.href.match(/[^\/]+$/)[0] == 'comment.php')
//            {
//                $(document).ready(function () {
//                    var myDataURL = site_url + localdir + "index.php?method=late_cmnt";
//                    document.getElementById('table_comment').dataset.url.value = myDataURL;
//
//                    var $table = $('#table_comment');
//                    $table.bootstrapTable('refresh', {url: myDataURL});
//
//                    $("body").on("click", ".comment_del", function () {
//                        alert("hello");                        
//                    });
//
//                });
//
//                $('#tableID').tableExport({type: 'pdf',
//                    jspdf: {orientation: 'p',
//                        margins: {left: 20, top: 10},
//                        autotable: false}
//                });
//
//                $(document).ready(function () {
//                    $('#table_comment').DataTable();
//                });                
//            }

            if (document.location.href.match(/[^\/]+$/)[0] == 'comment.php')
            {
                $(document).ready(function () {
                    var myDataURL = site_url + localdir + "index.php?method=late_cmnt";
                    document.getElementById('table_comment').dataset.url.value = myDataURL;

                    var $table = $('#table_comment');
                    $table.bootstrapTable('refresh', {url: myDataURL});

                    $("body").on("click", ".comment_del", function () {
                        alert("hello");
                        //dialog.dialog("open");

                        if (confirm("Are you sure to delete?")) {
                            var cmnt_id = $(this).attr("id");
                            //alert(id);
                            var postData = "cmnt_id=" + cmnt_id;
                            
                            var url = site_url + localdir + "index.php?method=delete_cmnt";
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: postData,
                                success: function (data, textStatus, jqXHR)
                                {
                                    if (data.response == 'success') {
                                        localStorage.setItem('divnotification', "<div class='alert alert-success'> <strong>Success!!</strong> Delted</div>");
                                        window.location.href = local_site + "pages/admin/comment.php";
                                    } else {
                                        localStorage.setItem('divnotification', "<div class='alert alert-warning'> <strong>Error!!</strong>'" + data.response + "' </div>");
                                        window.location.href = site_url + lochrefdir + "user_management.html";
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    //if fails
                                }
                            });
                        }
                    });

                    var dialog;

                    dialog = $("#dialog-confirm").dialog({
                        autoOpen: false,
                        resizable: false,
                        height: 'auto',
                        width: 400,
                        modal: true,
                        buttons: {
                            "Delete": function () {
                                delete_msg();
                            },
                            Cancel: function () {
                                $(this).dialog("close");
                            }
                        }
                    });
                });

                function delete_msg() {
                    alert();
                }

                $('#tableID').tableExport({type: 'pdf',
                    jspdf: {orientation: 'p',
                        margins: {left: 20, top: 10},
                        autotable: false}
                });

                $(document).ready(function () {
                    $('#table_comment').DataTable();
                });
            }
        </script>

    </body>
</html>