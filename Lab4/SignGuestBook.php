<!DOCTYPE html>

<?php

    if(empty($_POST['first_name']) || empty($_POST['last_name']))
    {
        echo "<p>You must enter your first and last name! Click your browsers back button to return to the guest book form</p>";
    }
    else
    {
        $DBConnect = @mysql_connect("localhost", "root", "");
        if($DBConnect === false)
        {
            echo "<p>Unable to connect to the database server</p>" . "<p>Error code " . mysql_errno() . ": " . mysql_error() . "</p>";
        }
        else
        {
            $DBName = "guestbook";
            if(!@mysql_select_db($DBName, $DBConnect))
            {
                $SQLString = "CREATE DATABASE $DBName";
                $queryResult = mysql_query($SQLString, $DBConnect);

                if($queryResult === false)                
                    echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysql_errno() . ": " . mysql_error() . "</p>";
                else                
                    echo "You are the first visitor!";
                
            }
            mysql_select_db($DBName, $DBConnect);

            $TableName = "visitors";
            $SQLString = "SHOW TABLES LIKE '$TableName'";
            $queryResult = @mysql_query($SQLString, $DBConnect);

            if(mysql_num_rows($queryResult) == 0)
            {
                $SQLString = "CREATE NEW TABLE $TableName (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, last_name VARCHAR(40), first_name VARCHAR(40))";
                $queryResult = @mysql_query($SQLString, $DBConnect);
                if($queryResult === false)
                {
                    echo "<p>Unable to create table</p>" . "<p>Error code " . mysql_errno() . ": " . mysql_error() . "</p>";
                }

                $LastName = stripslashes($_POST['last_name']);
                $FirstName = stripslashes($_POST['first_name']);
                $SQLString = "INSERT INTO $TableName VALUES(NULL< '$LastName', '$FirstName')";
                $queryResult = @mysql_query($SQLString, $DBConnect);

                if($queryResult == false)
                {
                    echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysql_errno() . ": " . mysql_error() . "</p>";
                }
                else
                    echo "Thanks for signing the guestbook.";
            }
            mysql_close($DBConnect);
        }
    }



?>