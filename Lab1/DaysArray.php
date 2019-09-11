<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

    <body>

        <title>Days Array</title>

        <?php

            $Days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

            echo "<p>The days in english are: </p>";
            foreach ($Days as $value)
                echo $value."<br>";

            $Days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

            echo "<p>The days in french are: </p>";
            foreach ($Days as $value)
                echo $value."<br>";


        ?>

    </body>

</html>