<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

    <body>

        <title>While Logic</title>


        <?php
        /*
            $Count = 0;
            while ($Count > 100)
            {
                $Numbers[] = $Count;
                ++$Count;

                foreach ($Count as $CurNum)
                    echo "<p>$CurNum</p>";
            }
        */
        ?>


        <?php

            $Count = 1;

            while ($Count <= 100)
            {
            $Numbers[$Count] = $Count;
            $Count++;              
            }

            foreach ($Numbers as $CurNum)
                echo "<p>$CurNum</p>";

        ?>

    </body>

</html>