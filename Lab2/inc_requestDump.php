<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Request Dump Include</title>

    <body>
        <h1>Request Dump</h1>

        <?php

            $rows = 10; // amout of tr 
            $cols = 10;// amjount of td 
            function drawTable($rows, $cols)
            {
            echo "<table border='1'>"; 

            for($tr=1;$tr<=$rows;$tr++){ 

                echo "<tr>"; 
                    for($td=1;$td<=$cols;$td++){ 
                        echo "<td align='center'>" . $tr*$td . "</td>"; 
                    } 
                echo "</tr>"; 
            } 

            echo "</table>";
            }

        ?>

        </body>
    
    
    </html>