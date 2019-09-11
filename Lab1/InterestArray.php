<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

    <body>

        <title>Interest Array</title>

        <?php

            $RatesArray = array(
            $InterestRate1 = .0725,
            $InterestRate2 = .0750,
            $InterestRate3 = .0775,
            $InterestRate4 = .0800,
            $InterestRate5 = .0825,
            $InterestRate6 = .0850,
            $InterestRate7 = .0875
            );

            for ($x=0; $x<7; $x++)
            {
                echo "Interest rate " . ($x + 1) . " is $RatesArray[$x] <br>";
            }

        ?>

    </body>

</html>