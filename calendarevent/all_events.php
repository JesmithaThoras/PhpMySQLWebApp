<!DOCTYPE html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<html>
<br>
    <form method="post" action="add_events.php">
        <h3><u>Add Event</u></h3>
            Event title:<input type="text" class="input_field"  name="title"  required>
            Event date:<input type="date" class="input_field" name="eventdate"  required>
            Event time:<input type="time" class="input_field"  name="eventstart"  >
            Short Description:<textarea name="feed" rows="10" cols="50" style="margin: 0px; width: inherit; height: 100px;"></textarea>
            
            
            <button type="submit" class="submit-btn" >Add</button>
    </form>

    <form method="post" action="update_events.php">
        <h3><u>Update Event</u></h3>
            Event title:<input type="text" class="input_field" name="title"  required>
            Event date:<input type="date" class="input_field" name="eventdate"  required>
            Event time:<input type="time" class="input_field" name="eventstart"  >
            Short Description:<textarea name="feed" rows="10" cols="50" style="margin: 0px; width: inherit; height: 100px;"></textarea>
            
            
            <button type="submit" class="submit-btn">Update</button>
    </form>

    <form method="post" action="delete_event.php">
        <h3><u>Delete Event</u></h3>
            Event title:<input type="text" class="input_field" name="title"  required>
            Event date:<input type="date" class="input_field" name="eventdate"  required>
            <button type="submit" class="submit-btn">Delete</button>
    </form>
</html>