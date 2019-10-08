<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Hit Counter</title>

    <body>
        <h1>Hit Counter</h1>

        <?php
            $CounterFile = "hitcount.txt";
        
            if(file_exists($CounterFile))
            {
                $Hits = file_get_contents($CounterFile);
                ++$Hits;
            }
            else $Hits = 1;

            echo "<h1>There have been $Hits hits to this page.</h1>\n";

            if(file_put_contents($CounterFile, $Hits))
                echo "<p>The counter file has been updated.</p>\n";
        
        ?>

    </body>


</html>