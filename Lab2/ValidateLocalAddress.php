<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Validate Local Address</title>

    <body>
        <h1>Validate Local Address</h1><hr />

        <?php
            $email = array("jsmith123@example.org", "john.smith.mail@example.org", "john.smith@example.org", "john.smith@example", "jsmith123@mail.example.org");

            foreach($email as $emailAddress)
            {
                echo "The email address &ldquo;" . $emailAddress . "&rdquo; ";
                if (preg_match("/^(([A-Za-z]+\d+)|" . "([A-Za-z]+\.[A-Za-z]+))" . "@((mail\.)?)example\.org$/i",$emailAddress)==1)
                    echo " is valid.<br />";
                else
                    echo " is NOT vaild.<br />";
            }
        ?>

    </body>
    
</html>