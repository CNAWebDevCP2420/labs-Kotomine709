<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <title>
        Palindrome
    </title>

    <body>
        <h1>Palindrome</h1><hr />
    
    <?php
        $word = array("Madam, I'm Adam", "Horse Radish");

        foreach ($word as $x)
        {
        $y = preg_replace("/[^a-zA-Z]+/", "", $x);

        if (strtolower($y) == strrev(strtolower($y)))
            echo $x . " is a palindrome.<br />";
        else 
            echo $x . " Is not a palindrome<br />";
        }

    ?>
    
    
    </body>


</html>