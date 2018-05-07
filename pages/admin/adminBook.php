<!DOCTYPE html>
<html>
    <head>
        <title>TheBookShop</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/bootstrap-table.min.css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/animate.min.css" media="all">       
        <link rel="stylesheet" href="../../assets/css/custom.css" type="text/css">

        <script type="text/javascript" src="../../assets/js/config.js"></script>
        <style>
            .bookArt{
                /*height: 100px;*/
                width: 150px;
            }
        </style>

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

                        <table id ="table_book" class="table table-striped table-hover"
                               data-toggle="table"
                               data-show-export="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="true"
                               data-search="true"
                               data-pagination="true"
                               data-sort-name="book_name"
                               data-sort-order="asc"
                               data-url="">
                            <thead>
                                <tr>
                                    <th data-formatter="runningFormatter">S.No.</th>
                                    <th data-field="book_cover" data-sortable='true'>Book Cover</th>
                                    <th data-field="isbn10" data-sortable='true'>ISBN Number</th>
                                    <th data-field="book_name" data-sortable='true'>Book Name</th>
                                    <th data-field="category" data-sortable='true'>Category</th>
                                    <th data-field="author" data-sortable='true'>Author</th>
                                    <th data-field="publisher" data-sortable='true'>Publisher</th>                                    
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>

                            <tbody id="adminBook">

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px;"></div>
        </div>

        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>        
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../../assets/js/download/bootstrap-table.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/bootstrap-table-export.js"></script>
        <script type="text/javascript" src="../../assets/js/download/tableExport.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/libs/jsPDF/jspdf.min.js"></script>
        <script type="text/javascript" src="../../assets/js/download/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>               

        <script type="text/javascript" src="../../assets/js/custom.js"></script>
        <script type="text/javascript" src="../../assets/js/book.js"></script>

        <script>
            if (document.location.href.match(/[^\/]+$/)[0] == 'adminBook.php')
            {
                $(document).ready(function () {
                    var myDataURL = site_url + localdir + "index.php?method=list_book";
                    document.getElementById('table_book').dataset.url.value = myDataURL;

                    var $table = $('#table_book');
                    $table.bootstrapTable('refresh', {url: myDataURL});
                });

                $('#tableID').tableExport({type: 'pdf',
                    jspdf: {orientation: 'p',
                        margins: {left: 20, top: 10},
                        autotable: false}
                });

                $(document).ready(function () {
                    $('#table').DataTable();
                });
            }
        </script>
    </body>
</html>