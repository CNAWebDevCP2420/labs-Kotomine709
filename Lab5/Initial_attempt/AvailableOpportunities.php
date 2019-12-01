<!DOCTYPE html>

<h1>Collage Internship</h1>
<h2>Available Opportunities</h2>

<?php

    if(isset($_REQUEST['internID']))
    {
        $InternID = $_REQUEST['internID'];
    }
    else
    {
        $InternID = -1;
    }

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
        $result = @mysqli_select_db($DBConnect, $DBName);
        if($result === false)
        {
            echo "<p>Unable to connect to database</p>";
            echo "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n";
            ++$errors;
        }
    }

    $TableName = "interns";
    if($errors == 0)
    {
        $SQLString = "SELECT * FROM $TableName WHERE internID = $InternID";

        $QueryResult = mysqli_query($DBConnect, $SQLString);

        if($QueryResult === false)
        {
            echo "<p>Unable to execute the query.";
            echo "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n";
            ++$errors;
        }
        else
        {
            if(mysqli_num_rows($QueryResult) == 0)
            {
                echo "<p>Invalid intern ID!</p>";
                ++$errors;
            }
        }
    }

    if($errors == 0)
    {
        $Row = mysqli_fetch_assoc($QueryResult);
        $InternName = $Row['first'] . " " . $Row['last'];
    }
    else
    {
        $InternName = "";
    }

    $TableName = "assigned_opportunities";
    $ApprovedOpportunities = 0;

    $SQLString = "SELECT COUNT(opportunityID) FROM $TableName WHERE internID = '$InternID' AND date_approved IS NOT NULL ";

    $QueryResult = @mysqli_query($DBConnect, $SQLString);

    if(mysqli_num_rows($QueryResult) > 0) // (result != 0) && (result != NULL)
    {
        $Row = mysqli_fetch_row($QueryResult);
        $ApprovedOpportunities = $Row[0];

        mysqli_free_result($QueryResult);
    }

    $SelectedOpportunities = array();
    $SQLString = "SELECT opportunityID FROM $TableName WHERE internID = '$InternID' ";
    
    $QueryResult = @mysqli_query($DBConnect, $SQLString);

    if(mysqli_num_rows($QueryResult) > 0)
    {
        while (($Row = mysqli_fetch_row($QueryResult)) !== FALSE)
        {
            $SelectedOpportunities[] = $Row[0];
        }
        mysqli_free_result($QueryResult);
    }

    $AssignedOpportunities = array();

    $SQLString = "SELECT opportunityID FROM $TableName WHERE date_approved IS NOT NULL ";
    
    $QueryResult = @mysqli_query($DBConnect, $SQLString);

    if(mysqli_num_rows($QueryResult) > 0)
    {
        while(($Row = mysqli_fetch_row($QueryResult)) !== FALSE)
        {
            $AssignedOpportunities = $Row[0];
        }
        mysqli_free_result($QueryResult);
    }

    $TableName = "opportunities";
    $Opportunities = array();
    $SQLString = "SELECT opportunityID, company, city, start_date, end_date, position, description FROM $TableName";

    $QueryResult = @mysqli_query($DBConnect, $SQLString);

    if(mysqli_num_rows($QueryResult) > 0)
    {
        while(($Row = mysqli_fetch_assoc($QueryResult)))
            $Opportunities[] = $Row;
        mysqli_free_result($QueryResult);
    }
    mysqli_close($DBConnect);

    echo "<table border='1' width='100%'>\n ";
    echo "<tr>\n";
    echo "    <th style='background-color:cyan'>Company</th>\n";
    echo "    <th style='background-color:cyan'>City</th>\n";
    echo "    <th style='background-color:cyan'>Start</th>\n";
    echo "    <th style='background-color:cyan'>End</th>\n";
    echo "    <th style='background-color:cyan'>Position</th>\n";
    echo "    <th style='background-color:cyan'>Description</th>\n";
    echo "    <th style='background-color:cyan'>Status</th>\n";
    echo "</tr>\n";

    foreach($Opportunities as $Opportunity)
    {
        if(!in_array($Opportunity['opportunityID'], $AssignedOpportunities))
        {
            echo "<tr>\n";
            echo "    <td>" . htmlentities($Opportunity['company']) . "</td>\n";
            echo "    <td>" . htmlentities($Opportunity['city']) . "</td>\n";
            echo "    <td>" . htmlentities($Opportunity['start_date']) . "</td>\n";
            echo "    <td>" . htmlentities($Opportunity['end_date']) . "</td>\n";
            echo "    <td>" . htmlentities($Opportunity['position']) . "</td>\n";
            echo "    <td>" . htmlentities($Opportunity['description']) . "</td>\n";
            echo "    <td>";
            if(in_array($Opportunity['opportunityID'], $SelectedOpportunities))
            {
                echo "Selected";
            }
            else
            {
                if($ApprovedOpportunities > 0)
                {
                    echo "Open";
                }
                else
                {
                    echo "<a href='RequestOpportunity.php?internID=$InternID&opportunityID=" . $Opportunity['opportunityID'] . "'>Available</a>";
                }
                echo "</td>\n";
                echo "</tr>\n";
            }
        }
    }

?>