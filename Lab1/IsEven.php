<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

    <body>

        <title>Is it even</title>

        <?php

            $number = "6.4";
            echo "Your entry is: $number<br>";

            if (is_numeric($number))
            {
                echo "We'll round out this number and see if it's even.<br>";
                round($number);
                if ($number % 2 == 0)
                {
                    echo "$number is even!";
                }
                else
                    echo "$number is an odd number.";
            }
            else
                echo "This is not a number."

        ?>

    </body>

</html>