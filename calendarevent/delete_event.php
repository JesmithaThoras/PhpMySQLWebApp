<?php
$conn = mysqli_connect("localhost","root","") ;

mysqli_select_db($conn, "calendar");

if (!$conn)
{
    ysqli_connect_error();
}

$title = $_POST['title'];
$eventdate = $_POST['eventdate'];

$sqlInsert = "delete from `calendar_events` WHERE  `event_title` = '$title' and `eventdate` = '$eventdate';";

$result = mysqli_query($conn, $sqlInsert);

if (! $result) {
    $result = mysqli_error($conn);
}

header('location:all_events.php');
?>