<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

    <body>

        <title>Temp Conversion</title>

        <?php

            $Temps = array();
            $TempsF = array();

            for($x = 0; $x <= 100; $x++)
            {
                $temps[$x] = $x;

                $TempsF[$x] = ($x-32) * (5/9);

                echo "Temp in F: ".round($temps[$x])."   Temp in C:".round($TempsF[$x])."</br>";
            }

        ?>

    </body>

</html>