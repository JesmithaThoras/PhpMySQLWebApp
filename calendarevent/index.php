<!DOCTYPE html>
<html>
<head>
    <h1>Select month and year</h1>
    
    <link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
    <form method="post" class="select"  action="display.php">
        <span>
        <select name="month">
        <?php
            $months = Array("January", "February", "March", "April", "May","June", "July", "August", "September", "October", "November", "December");
            for ($x=1; $x <= count($months); $x++) {
                echo"<option value=\"$x\"";
                
                echo ">".$months[$x-1]."</option>";
            }
        ?>
        </select> 
        </span>

        <span>
        <select name="year">
            <?php 
            $year = date('Y');
            $min = 1990;
            $max = 2020;
            for( $i=$max; $i>=$min; $i-- ) {
                echo '<option value='.$i.'>'.$i.'</option>';
            }
            ?>
        </select>
        </span>
        <button type="submit" name="submit"class="go" value="submit">Go!</button>
    </form>
</body>
</html>
