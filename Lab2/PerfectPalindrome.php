<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <title>
        Palindrome
    </title>

    <body>
        <h1>Palindrome</h1><hr />
    
    <?php
        $word = array("Racecar", "Pickle");

        foreach ($word as $x)
        
        if (strtolower($x) == strrev(strtolower($x)))
            echo $x . " is a palindrome.<br />";
        else 
            echo $x . " is not a palindrome<br />";

    ?>
    
    
    </body>


</html>