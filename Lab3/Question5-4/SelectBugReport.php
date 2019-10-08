<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Bug Reporting</title>

    <body>
        <h1>Bug Reporting</h1>

        <h2>Select report number to edit</h2>
        
        <form method="POST" action="EditBugReport.php">
            <select name="reportList">
                <?php
                    $folder = scandir("BugReports");

                    foreach($folder as $report)
                    {
                        echo "<option>" . $report . "</option>";
                    }
                ?>
            </select>

            <p><input type="submit" value="Submit" /></p>
        </form>

    </body>
</html>