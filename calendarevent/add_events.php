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

$sqlInsert = "INSERT INTO `calendar_events` (`event_title`, `event_shortdesc`, `event_start`, `eventdate`) VALUES ('".$title."','".$desc."','".$eventstart ."','".$eventdate."')";

$result = mysqli_query($conn, $sqlInsert);

if (! $result) {
    $result = mysqli_error($conn);
}

header('location:all_events.php');

?>

