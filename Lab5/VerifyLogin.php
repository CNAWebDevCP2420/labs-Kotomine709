<!DOCTYPE html>

<h1>Collage Internship</h1>
<h2>Verify Intern Login</h2>

<?php

    //Connect to database
    $DBConnect = @mysqli_connect("localhost", "root", "");

    $errors = 0;
    if($DBConnect === false)
    {
        echo "<p>Unable to connect to database server</p>";
        echo "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n";
        ++$errors;
    }
    else
    {
        $DBName = "internships";
        $result = @mysqli_select_db($DBName, $DBConnect);
        if($result === false)
        {
            echo "<p>Unable to connect to database</p>";
            echo "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n";
            ++$errors;
        }
    }

    //Run query to see if the data entered matches a table row
    $TableName = "interns";
    if($errors == 0)
    {
        $SQLString = "SELECT internID, first, last FROM $TableName WHERE email = '" . stripslashes($_POST['email']) . "' AND password_md5 ='" . md5(stripslashes($_POST['password'])) . "'";
        $queryResult = @mysqli_query($DBConnect, $SQLString);

        if(mysqli_num_rows($queryResult) == 0)
        {
            echo "<p>The email address / password entered is not valid</p>\n";
            ++$errors;
        }
        else
        {
            $Row = mysqli_fetch_assoc($queryResult);
            $InternID = $Row['internID'];
            $InternName = $Row['first'] . " " . $Row['last'];
            echo "<p>Welcome back, $InternName</p>\n";
        }
    }

    //Errors prevented verification, tell user
    if($errors  >0)
    {
        echo "<p>Please use your browsers back button to return and fix the indicated errors.</p>\n";
    }

    //Saves info to an invisible input so it's passed to the next page
    if($errors == 0)
    {
        echo "<form method='post' action='AvailableOpportunities.php>\n' ";
        echo "<input type='hidden' name='interID' value='$InternID'>\n ";
        echo "<input type='submit' name='submit' value='View available opportunities'>\n ";
        echo "</form>";
    }
?>