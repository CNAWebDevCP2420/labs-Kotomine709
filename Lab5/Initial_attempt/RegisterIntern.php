<!DOCTYPE html>

<h1>Collage Internship</h1>
<h2>Intern Registration</h2>

<?php

    $errors = 0;
    $email = "";

    //Checks for a blank or incorrect email address
    if(empty($_POST['email']))
    {
        ++$errors;
        echo "<p>You need to enter an email address.</p>\n";
    }
    else
    {
        $email = stripslashes($_POST['email']);

        if(preg_match("/^[\w-]+(\.[w-]+)*@" . "[\w-]+(\.[\w-]+)(\.[a-zA-Z]{2, })$/i", $email) == 0)
        {
            ++$errors;
            echo "<p>You need to enter a valid email address.</p>";
            $email = "";
        }
    }

    //Checks for blank password
    if(empty($_POST['password']))
    {
        ++$errors;
        echo "<p>You need to enter a password.</p>";
        $password = "";
    }
    else
    {
        $password = stripslashes($_POST['password']);
    }

    //Check if confirmation password is empty
    if(empty($_POST['password2']))
    {
        ++$errors;
        echo "<p>You must enter a confirmation password</p>";
        $password2 = " ";
    }
    else
    {
        $password2 = stripslashes($_POST['password2']);
    }

    //Checks if passwords match
    if((!empty($password)) && (!empty($password2)))
    {
        if(strlen($password) < 6)
        {
            ++$errors;
            echo "<p>The password is too short</p>";
            $password = "";
            $password2 = "";
        }

        if($password <> $password2)
        {
            ++$errors;
            echo "<p>Passwords do not match.</p>";
            $password = "";
            $password2 = "";
        }
    }

    //Connect to database -------------------------
    if($errors == 0)
    {
        $DBConnect = @mysqli_connect("localhost", "root", "");

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
    }

    $TableName = "interns";

    if($errors == 0)
    {
        $SQLString = "SELECT count(*) FROM $TableName WHERE email=$email";
        $QueryResult = @mysqli_query($DBConnect, $SQLString);

        if($QueryResult !== false)
        {
            $Row = mysqli_fetch_row($QueryResult);
            if($Row[0]>0)
            {
                echo "<p>The email address entered (" . htmlentities($email) . ") is already registered.</p>\n";
                ++$errors;
            }
        }
    }

    if($errors > 0)
    {
        echo "<p>Please use your browsers back button to return to the form and fix the errors indicated.</p>";
    }

    if($errors == 0)
    {
        $first = stripslashes($_POST['first']);
        $last = stripslashes($_POST['last']);

        $SQLString = "INSERT INTO TABLE $TableName (first, last, email, password_md5) VALUES ('$first', '$last', '$email', '" . md5($password) . "')";

        $QueryResult = mysqli_query($DBConnect, $SQLString);

        if($QueryResult === false)
        {
            echo "<p>Unable to register you.</p>";
            echo "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n";
            ++$errors;
        }
        else
        {
            $InternID = mysql_insert_id($DBConnect);
        }
        mysqli_close($DBConnect);
    }

    if($errors = 0)
    {
        $InternName = $first . " " . $last;
        echo "<p>Thank you, $InternName. ";
        echo "Your new intern ID is <strong>" . $InternID . "</strong>.</p>\n";
    }

    //Saves info to an invisible input so it's passed to the next page if you press the submit button
    if($errors == 0)
    {
        echo "<form method='post' action='AvailableOpportunities.php>\n' ";
        echo "<input type='hidden' name='interID' value='$InternID'>\n ";
        echo "<input type='submit' name='submit' value='View available opportunities'>\n ";
        echo "</form>";
    }

?>