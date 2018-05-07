if (document.location.href.match(/[^\/]+$/)[0] == 'adminUser.php') {
    //alert("hi");   

    $(document).ready(function () {
        $(".user_edit").on("click", function () {
            //alert("hi");
        });

        $("body").on("click", ".btn btn-danger,.user_delete", function () {
            if (confirm("Are you sure to delete this user?")) {
                var id = $(this).attr("id");
                var postData = "id=" + id;
                var url = site_url + localdir + "index.php?method=delete_user";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: postData,
                    success: function (data, textStatus, jqXHR)
                    {
                        if (data.response == 'success') {
                            localStorage.setItem('alert_msg', "<div class='alert alert-success'> <strong>Success!!</strong> Deleted</div>");
                            window.location.href = local_site + "pages/admin/adminUser.php";
                        } else {
                            localStorage.setItem('alert_msg', "<div class='alert alert-warning'> <strong>Error!!</strong>'" + data.response + "' </div>");
                            window.location.href = local_site + "pages/admin/adminUser.php";
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        //if fails
                    }
                });
            }

            
        });
    });
}