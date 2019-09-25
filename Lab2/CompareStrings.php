<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Compare Strings</title>

    <body>
        <h1>Compare Strings</h1>

        <?php
            $firstString = "Geek2Geek";
            $secondString = "Geezer2Geek";

            if(!empty($firstString) && !empty($secondString)) 
            {
                if($firstString == $secondString)
                    echo "<p>Both strings are the same.</p>";
                else 
                {
                    echo "<p>Both strings have ".similar_text($firstString, $secondString)." characters in common.</p>";
                    echo "<p>You must change ".levenshtein($firstString, $secondString)." characters to make the strings the same.";
                }
            }
            else
                echo "<p>Either the " . $firstString . " or " . $secondString . " is empty.</p>";

        ?>

    </body>


</html>