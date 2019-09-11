<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

    <body>

        <title>Gas Prices</title>

        <?php

            $GasPrice = 2.57;

            if(($GasPrice >= 2) && ($GasPrice <=3))
            {   
                echo "<p>Gas Prices are between 2 and 3.</p>";
            }
            else
            echo "<p>Gas prices are not between 2 and 3.</p>";

        ?>

    </body>

</html>