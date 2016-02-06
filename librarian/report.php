<?php
 // include('session.php');
?>
<?php include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Report</title>
    <link href="../css/jquery-ui.css" rel="stylesheet" />
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/docs.css" rel="stylesheet" media="screen">

   <!--  kini nga css source para ni sa noitification -->
    <link href="../css/style2.css" rel="stylesheet" media="screen">
    <!-- ari ari ra kutob -->

    <link href="../css/font-awesome-animation.min.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li>
                            <a href="dashboard1.php"><i class="icon-home icon-large"></i>&nbsp;Home</a>
                        </li>
                        <li>
                            <a href="f_acc.php"><i class="icon-group icon-large"></i>&nbsp;Accounts</a>
                        </li>
                        <?php
                        include('dropdownlist.php');
                        ?>
                        <?php
                        include('dropdown.php');
                        ?>
                        <li>
                            <a href="books.php"><i class="icon-book icon-large"></i>&nbsp;Book Details</a>
                        </li>
                        <li class="active">
                            <a href="view_borrow.php"><i class="icon-book icon-large"></i>&nbsp;Return Books</a>
                        </li>
                        <?php
                        include('dropdown_reports.php');
                        ?>
                        <?php
                            include('set_logout.php');
                        ?>
                        <li>
                            <div class="pull-right">
                               <div class="admin ">Librarian</div>
                            </div>
                        </li>

                       <!-- mao ni cxa ang pag display sa sa notification diri lang nako gibutang kay wala ko kahibaw asa nga header i butang-->
                        <li id="notification_li">
                            <span id="notification_count">0</span>
                            <a href="#" id="notificationLink" style="color:black;">Notification</a>
                            <div id="notificationContainer">
                                <div id="notificationTitle">Notifications</div>
                                <div id="notificationsBody" class="notifications">
                                    <table class="table table-striped table-hover notification">
                                        <thead>

                                        </thead>
                                        <tbody class="notification">
                                            <?php
                                                $notif = mysql_query("select student.fname as firstname,student.lname as lastname,course.course_name as course
                                                        FROM
                                                        borrow_info
                                                        INNER JOIN student ON borrow_info.id_number = student.id
                                                        INNER JOIN course ON student.crs_id = course.course_id
                                                        WHERE
                                                        borrow_info.borrow_stat = 'Pending'
                                                        GROUP BY
                                                        borrow_info.id_number")or die(mysql_error());
                                                while($row=mysql_fetch_array($notif)){
                                                    echo"<tr>";
                                                    echo"<td>".$row['firstname']."</td>";
                                                    echo"<td>".$row['lastname']."</td>";
                                                    echo"<td>".$row['course']."</td>";
                                                    echo"</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="notificationFooter"><a href="#">See All</a></div>
                            </div>
                            <?php
                                $count = mysql_query("select * from borrow_info where borrow_stat = 'Pending' GROUP BY id_number")or die(mysql_error());
                                $counter = mysql_num_rows($count);
                            ?>
                            <input type="hidden" class="counts" value="<?php echo $counter; ?>">
                        </li>
                        <!-- diri ra kutob -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container" style="margin-top:3%;">
        <div class="control-label col-sm-7">
            <form name="validity" autocomplete="off" id="validity" method="post" action="">
                <table class="maintable table table-striped table-hover">
                    <thead style="background-color:#d1e0e0;">
                        <tr>
                            <th width="30%">Month</th>
                            <th width="40%">Course</th>
                            <th width="30%">No. of Student</th>
                        </tr>
                    </thead>
                    <tbody class="maintbody">
                    </tbody>
                    <tfoot>
                        <div id="page-selection" class="pagination" style="text-align:left; position:fixed; bottom: 60px;width:auto;"></div>
                    </tfoot>
                    <div class="loading"></div>
                </table>
            </form>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/simplePagination.js"></script>
    <script type="text/javascript">

    // Kung asa to ang page nga butangan sa nofication igbaw adto pud ni e butang sa iya javascript
        $(document).ready(function(){
            var counts = $('.counts').val();
            $('#notification_count').text(counts);

            $("#notificationLink").click(function(){
                $("#notificationContainer").fadeToggle(300);
                $("#notification_count").fadeOut("slow");
                return false;
            });
            $(document).click(function(){
            $("#notificationContainer").hide();
            });
            $("#notificationContainer").click(function(){
            return false
            });

            var hideshowcount = $('.counts').val();
            if(hideshowcount > 0){
                $('#notification_count').show();
            }
            else{
                $('#notification_count').hide();
            }
        });

        $(document).ready(function(){
           setTimeout(function(){
           window.location.reload();
           }, 60000);
        })
        // ari ra kutob

        $.getJSON('displayreport.php', function(data){
            $('table.items tbody').empty();
            $.each(data, function(key, value){
                function pad (str, max) {
                    str = str.toString();
                    return str.length < max ? pad("0" + str, max) : str;
                }
                $('table.maintable tbody.maintbody').append('<tr>\
                        <td>'+value.month+'</td> \
                        <td>'+value.course+'</td> \
                        <td>'+value.sum+'</td> \
                    </tr>');
            });
            $('.loading').hide();
            var items = $("table.table tbody tr");
            var numItems = items.length;
            var perPage = 10;
            items.slice(perPage).hide();
            dothings(items, numItems, perPage);
        });

        function dothings(items, numItems, perPage){
        $(".pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            hrefTextPrefix: '#',
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide()
                     .slice(showFrom, showTo).show();
            }
        });
    }
    </script>
</body>
</html>
