<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Player List</title>

    <body>
        <h1>Player List</h1>

        <?php
            $fileName = addslashes($_POST["number"]);
            $productName = addslashes($_POST["name"]);
            $productVersion = addslashes($_POST["version"]);
            $productHardware = addslashes($_POST["hardware"]);

            $bugReport = fopen("BugReports/" . $fileName . ".txt", "ab");

            

            fwrite($bugReport, $productName . "\n" . $productVersion . "\n" . $productHardware . "\n");

            echo "Report has been made. <p><a href='bugReports.html'>Return to home page.</a></p>";
        
        ?>

    </body>
</html>