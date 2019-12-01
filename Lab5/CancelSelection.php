<?php session_start() ?>

<!DOCTYPE html>

<h1>Collage Internship</h1>
<h2>Cancel Selection</h2>

<body>
    <?php

        echo $Body;

        $Body = "";
        $errors = 0;

        if(!isset($_SESSION['internID']))
        {
            $Body .= "<p>You have no logged in or registered. Please return to the <a href='InternLogin.php'>Registration / Log In Page</a></p>";
            ++$errors;
        }

        if($errors == 0)
        {
            if(isset($_GET['opportunityID']))
            {
                $OpportunityID = $_GET['opportunityID'];
            }
            else
            {
                $Body .= " <p>You have not selected an opportunity. Please return to <a href='AvailableOpportunities.php?" . SID . "'>Available Opportunities page</a>.</p>\n";
                ++$errors;
            }
        }

        if ($errors == 0)
        {
            $DBConnect = @mysqli_connect('localhost', 'root', "");

            if($DBConnect === FALSE)
            {
                echo "<p>Unable to connect to the database server</p>" . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>";
                ++$errors;
            }
            else
            {
                $DBName = "internships";
                $result = @mysqli_select_db($DBConnect, $DBName);
                if($result === FALSE)
                {
                    $Body .= "<p>Unable to select the database server</p>" . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>";
                    ++$errors;
                }
            }
        }


        if($errors == 0)
        {
            $TableName = "assigned_opportunities";
            $SQLstring = " DELETE FROM $TableName WHERE opportunityID=$OpportunityID AND internID" . $_SESSION['internID'] . " AND date_approved IS NULL " ;
            $QueryResult = @mysqli_query($DBConnect, $SQLstring);
            if($QueryResult === FALSE)
            {
                echo "<p>Unable to execute query</p>" . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>";
                ++$errors;
            }
            else
            {
                $AffectedRows = mysqli_affected_rows($DBConnect);
                if($AffectedRows == 0)
                {
                    $Body .= "<p>You had not previously selected opportunity #" . $OpportunityID . ".</p>";
                }
                else
                {
                    $Body .= "<p>Your request for opportunity #" . $OpportunityID . "has been removed.</p>\p";
                }
            }
            mysqli_close($DBConnect);
        }

        if($_SESSION['internID'] > 0)
        {
            $Body .= "<p>Return to the <a href='AvailableOpportunities.php?" . SID . "'>Available Opportunities</a> page.</p>\n";
        }
        else
        {
            $Body .= "<p>Please <a href='InternLogin.php'>Register</a> to use this page.</p>\n";
        }
    ?>
</body>