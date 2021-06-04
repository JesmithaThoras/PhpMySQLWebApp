<?php
$conn = mysqli_connect("localhost","root","") ;

mysqli_select_db($conn, "calendar");

if (!$conn)
{
    ysqli_connect_error();
}

$title = $_POST['title'];
$desc = $_POST['desc'];
$eventstart = $_POST['eventstart'];
$eventdate = $_POST['eventdate'];

$sqlInsert = "UPDATE `calendar_events` SET `event_title`='$title',`event_shortdesc` = '$desc', `event_start` = '$eventstart' WHERE `eventdate` = '$eventdate';";

$result = mysqli_query($conn, $sqlInsert);

if (! $result) {
    $result = mysqli_error($conn);
}

header('location:all_events.php');

?>