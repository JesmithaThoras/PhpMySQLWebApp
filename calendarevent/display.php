<?php
    define("ADAY", (60*60*24));
    if ((!isset($_POST['month'])) || (!isset($_POST['year']))) {
        $nowArray = getdate();
        $month = $nowArray['mon'];
        $year = $nowArray['year'];
    } else {
        $month = $_POST['month'];
        $year = $_POST['year'];
    }
    $start = mktime (12, 0, 0, $month, 1, $year);
    $firstDayArray = getdate($start);
?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<title>
    <?php echo "Calendar: ".$firstDayArray['month']."".$firstDayArray['year']; ?>
</title>
</head>
<body>
    <h1> Event Calendaer </h1>
    <form method="post" class="select" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="month">
        <?php
            $months = Array("January", "February", "March", "April", "May","June", "July", "August", "September", "October", "November", "December");
            for ($x=1; $x <= count($months); $x++) {
            echo"<option value=\"$x\"";
            if ($x == $month) {
            echo " selected";
            }
            echo ">".$months[$x-1]."</option>";
            }
        ?>
        </select>
        <select name="year">
        <?php
            for ($x=1990; $x<=2020; $x++) {
            echo "<option";
            if ($x == $year) {
            echo " selected";
            }
            echo ">$x</option>";
            }
        ?>
        </select>
        <button type="submit" name="submit" class="go" value="submit">Go!</button>
    </form>
    <br>
    <?php
        $days = Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
        echo "<table><tr>\n";
        foreach ($days as $day) {
            echo "<th>".$day."</th>\n";
        }
        for ($count=0; $count < (6*7); $count++) {
            $dayArray = getdate($start);
            if (($count % 7) == 0) {
                if ($dayArray['mon'] != $month) {
                    break;
                } else {
                    echo "</tr><tr>\n";
                }
            }
            if ($count < $firstDayArray['wday'] || $dayArray['mon'] != $month) {
                echo "<td>&nbsp;</td>\n";
            } else {
                // echo "<td>".$dayArray['mday']."</td>\n";
                // $start += ADAY;

                $event_title = "";
                $mysqli = mysqli_connect("localhost", "root", "", "calendar");
                $chkEvent_sql = "SELECT event_title FROM calendar_events WHERE
                    month(eventdate) = '".$month."' AND
                    dayofmonth(eventdate) = '".$dayArray['mday']."'
                    AND year(eventdate) = '".$year."' ORDER BY eventdate";
                $chkEvent_res = mysqli_query($mysqli, $chkEvent_sql)
                    or die(mysqli_error($mysqli));

                if (mysqli_num_rows($chkEvent_res) > 0) {
                    while ($ev = mysqli_fetch_array($chkEvent_res)) {
                        $event_title .= stripslashes($ev['event_title'])."<br>";
                    }
                } else {
                    $event_title = "";
                }

                echo "<td>".$dayArray['mday']."
                <br>".$event_title."</td>\n";
                unset($event_title);
                $start += ADAY;
            }
        }
        echo "</tr></table>";


        mysqli_close($mysqli);
    ?>

<br>
<a href="all_events.php">Add/Modify Event</a>
</body>
</html>