<!DOCTYPE html>
<html>
    <head>
        <title>TheBookShop</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/jquery-ui.css" type="text/css">
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
    </head>
    <body>

        <?php include 'adminNav.php' ?>

        <div class="container">
            <div class="row">
                <div id="alert_msg"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="table-responsive" style="border: none; margin-bottom: 15px;">
                        <table id ="table_user" class="table table-striped table-hover"
                               data-toggle="table"
                               data-show-export="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="true"
                               data-search="true"
                               data-pagination="true"
                               data-sort-name="fname"
                               data-sort-order="asc"
                               data-url="">
                            <thead>
                                <tr>
                                    <th data-formatter="runningFormatter">S.No.</th>                                    
                                    <th data-field="fname" data-sortable='true'>First Name</th>
                                    <th data-field="lname" data-sortable='true'>Last Name</th>
                                    <th data-field="email" data-sortable='true'>Email</th>
                                    <th data-field="dob" data-sortable='true'>Date of Birth</th>
                                    <th data-field="visibility" data-sortable='true'>User Type</th>                                    
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>

                            <tbody id="rcnt_signup">

                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px;"></div>
        </div>

        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/bootstrap-table.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/bootstrap-table-export.js"></script>
        <script type="text/javascript" src="../../assets/js/download/tableExport.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/libs/jsPDF/jspdf.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>

        <script type="text/javascript" src="../../assets/js/custom.js"></script>
        <script type="text/javascript" src="../../assets/js/user.js"></script>

        <script>
            $(document).ready(function () {
                var myDataURL = site_url + localdir + "index.php?method=user";
                document.getElementById('table_user').dataset.url.value = myDataURL;

                var $table = $('#table_user');
                $table.bootstrapTable('refresh', {url: myDataURL});
            });
        </script>
    </body>
</html>