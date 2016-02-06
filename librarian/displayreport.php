<?php
 include('dbcon.php');
$result=mysql_query("select
Sum(attendances.attendance_count) AS sum, months.name as month, course.course_name as course
FROM
attendances
INNER JOIN months ON month(attendances.login_date) = months.id
INNER JOIN course ON attendances.course_id = course.course_id
GROUP BY
attendances.id_num,
month(attendances.login_date)
ORDER BY
months.id ASC") or die (mysql_error());

    while($row = mysql_fetch_array($result)){
        $data[] = $row;
    }
    header('Content-type: json');
		echo json_encode($data, JSON_PRETTY_PRINT);
?>


