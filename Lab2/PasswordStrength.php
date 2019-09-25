<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <title>
        Password Check
    </title>

    <body>
        <h1>Password Check</h1><hr />
    
    <?php
        $passwordArray = array("Gerald111!", "goop", "BOOOOOOP", "Osborne100%", "My Dog Is Great", "hellohello", "HelloHello");

        foreach($passwordArray as $password)
        {
            if((strlen($password) < 8) || (strlen($password)) > 16)
                echo "Password must be between 8 and 16 characters<br />";
            else if (strpos($password, " "))
                echo "Password must not have a space<br />";
                else if(!preg_match('/[A-Z]/', $password))
                    echo "Password must have an uppercase character<br />";
                    else if(!preg_match('/[a-z]/', $password))
                        echo "Password must contan a lowercase character<br />";
                        else if(!preg_match('/[0-9]/', $password))
                            echo "Password must have a number<br />";
                            else if(!preg_match('/[^0-9A-Za-z]/', $password))
                                echo "Password needs a symbol<br />";
                                else 
                                    echo "Password is valid<br />"; 

        }



    ?>
    
    
    </body>


</html>