if (document.location.href.match(/[^\/]+$/)[0] == 'adminBook.php')
{
//    var book = '';
//    var count = 1;
//    var url = site_url + localdir + "index.php?method=list_book";
//    $.ajax({
//        url: url,
//        type: "POST",
//        data: null,
//        dataType: "JSON",
//        success: function (data, textStatus, jqXHR)
//        {
//            if (data.response == null || jQuery.isEmptyObject(data.response))
//            {
//                $("#adminBook").html("<td colspan='5'><h2>No comments found !!</h2></td>");
//            } else
//            {
//                var dispBook = data.response;
//
//                $.each(dispBook, function (index, value)
//                {
//                    book += "<tr><td>" + count
//                            + "</td><td><div class='bookArt'><img src='../../image/" + value.book_cover + "' height='75%' width='75%'></div></td><td>"
//                            + value.isbn10 + "</td><td>" + value.book_name + "</td><td>" + value.author + "</td><td>"
//                            + value.category + "</td><td>" + value.publisher + "</td><td>"
//                            + "<button class='btn btn-success btn-sm bookEdit' id='" + value.book_id + "'><span class='fa fa-edit fa-lg'></span></button> &nbsp; <button class='btn btn-danger btn-sm bookDel' id='" + value.book_id + "'><span class='glyphicon glyphicon-trash'></span></button>" + "</td></tr>";
//                    count++;
//                });
//                $("#adminBook").html(book);
//            }
//        }
//    });
}

$(document).ready(function ()
{

    $("body").on("click", ".bookEdit", function (e)
    {
        e.preventDefault();
        //alert("edit book");

        var book_id = $(this).attr("id");
        localStorage.setItem('book_id', book_id);
        //alert(book_id);
        window.location.href = local_site + "pages/admin/editBook.php";
    });


    $("body").on("click", ".bookDel", function (e)
    {
        e.preventDefault();
        //alert("delete book");

        if (confirm("Are you sure you want to delete this?")) {
            var book_id = $(this).attr("id");
            alert(book_id);
            var postData = "book_id=" + book_id;
            alert(postData);
            var url = site_url + localdir + "index.php?method=delete_book";
            $.ajax({
                url: url,
                type: "POST",
                data: postData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data.response == 'success') {
                        localStorage.setItem('alert_msg', "<div class='alert alert-success'> <strong>Success!!</strong>Deleted</div>");
                        window.location.href = local_site + "pages/admin/adminBook.php";
                    } else {
                        localStorage.setItem('alert_msg', "<div class='alert alert-warning'> <strong>Error!!</strong>Not deleted.</div>");
                        window.location.href = local_site + "pages/admin/adminBook.php";
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {

                }
            });
        }
    });


    if (document.location.href.match(/[^\/]+$/)[0] == 'editBook.php')
    {
        var book_id = localStorage.getItem("book_id");
        //alert(book_id);

        var postData = "book_id=" + book_id;
        var url = site_url + localdir + "index.php?method=edit_book";
        $.ajax({
            url: url,
            type: "POST",
            data: postData,
            success: function (data, textStatus, jqXHR)
            {
                var details = data.response;
                $("#updtBook_form, #book_id").val(details.book_id);
                $("#updtBook_form, #isbn").val(details.isbn10);
                $("#updtBook_form, #category").val(details.category);
                $("#updtBook_form, #title").val(details.title);
                $("#updtBook_form, #name").val(details.book_name);
                $("#updtBook_form, #author").val(details.author);
                $("#updtBook_form, #publisher").val(details.publisher);
                $("#updtBook_form, #publish_date").val(details.publish_date);
                $("#updtBook_form, #price").val(details.price);
                $("#updtBook_form, #format").val(details.format);
                $("#updtBook_form, #lang").val(details.language);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert(errorThrown, textStatus);
            }
        });

        $("#updtBook_form").on("submit", function (e)
        {
            e.preventDefault();

            var updatedData = $(this).serialize();

            var url = site_url + localdir + "index.php?method=update_book";
            $.ajax({
                url: url,
                type: "POST",
                data: updatedData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data.response === 'success') {
                        localStorage.setItem('alert_msg', "<div class='alert alert-success'> <strong>Success!! </strong>Updated.</div>");
                        window.location.href = local_site + "pages/admin/editBook.php";
                    } else {
                        localStorage.setItem('alert_msg', "<div class='alert alert-danger'> <strong>Error!! </strong>Not Updated.</div>");
                        window.location.href = local_site + "pages/admin/editBook.php";
                    }
                },
            });
        });
    }
});