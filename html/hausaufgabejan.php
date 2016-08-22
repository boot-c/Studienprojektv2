<!DOCTYPE html>
<html>
    <head>
        <title>Hausaufgabe von Jan</title>
        <link href="hausaufgabejan.css" rel="stylesheet" type="text/css">
    </head>
    <script src="jquery.ajaxform.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <body>
        <div id="table"></div>
        <script>
            //show table
            loadDoc('/janphp/show_table.php', show_table, open);

            function loadDoc(url, cfunc, myopen, form) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        cfunc(xhttp);
                    }
                };
                myopen(url, xhttp, form);
            }

            function open(url, xhttp) {
                xhttp.open("GET", url, true);
                xhttp.send();
            }

            function show_table(xhttp) {
                document.getElementById("table").innerHTML = xhttp.responseText;
            }

            //insert
            $(document).on("submit", "#insert_form", function (event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/janphp/insert_into_table.php",
                    data: $(this).serialize(),
                    success: function (data) {
                        $('#table').append($(data).fadeIn('slow'));
                    },
                });
                loadDoc('/janphp/show_table.php', show_table, open);
            });

            //delete
            $(document).on("submit", "#delete_form", function (event) {
                var r = confirm("Are you sure?");
                if (r == true) {
                    event.preventDefault();
                    var row = $(this).closest("tr");
                    $.ajax({
                        type: "POST",
                        url: "/janphp/delete_from_table.php",
                        data: $(this).serialize(),
                        success: function (data) {
                            row.fadeOut(300, function () {
                                $(this).remove();
                            });
                        },
                    });
                }
            });
        </script>
    </body>
</html>

