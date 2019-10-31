<!DOCTYPE html>

<?php

    $DBConnect = @mysql_connect("localhost", "root", "");
    if($DBConnect === false)
    {
        echo "<p>Unable to connect to the database server</p>" . "<p>Error code " . mysql_errno() . ": " . mysql_error() . "</p>";
    }
    else
    {
        $DBName = "guestbook";
        if(!@mysql_select_db($DBName, $DBConnect))
            echo "<p>There are no entries</p>";
        else
        {
            $TableName = "visitors";
            $SQLString = "SELECT * FROM $TableName";
            $queryResult = @mysql_query($SQLString, $DBConnect);

            if(mysql_num_rows($queryResult) == 0)
            {
                echo "<p>There are no entries</p>";
            }
            else
            {
                echo "<p>The following visitors have signed out guest book:</p>";
                echo "<table width='100%' border='1'";
                echo "<tr><th>First Name</th><th>Last Name</th></tr>";
                while (($row = mysql_fetch_assoc($queryResult)) !== false)
                {
                    echo "<tr><td>{$row['first_name']}</td>";
                    echo "<td>{$row['last_name']}</td></tr>";
                }
            }
            mysql_free_result($queryResult);
        }
        mysql_close($DBConnect);

    }
    
?>