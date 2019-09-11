<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

    <body>

        <title>Conditional Script</title>

        <?php

            $IntVariable = 75;

            if($IntVariable > 100)
                $Result = '$IntVariable is greater than 100';
            else
                $Result = '$IntVariable is less than or equal to 100';

            echo "<p>$Result</p>";

        ?>

    </body>

</html>