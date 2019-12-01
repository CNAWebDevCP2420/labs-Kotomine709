<!DOCTYPE html>

<body>

    <?php

        if(isset($_COOKIE['lastVisit']))
        {
            $LastVisit = "<p>Your last visit was on " . $_COOKIE['lastVisit'] . "</p>";
        }
        else
        {
            $LastVisit = "<p>This is your first visit!</p>\n";
        }

        setcookie("lastVisit", date("F j, Y, g:i a"), time()+60*60*24*365);

    ?>

    <?php echo $LastVisit; ?>
</body>