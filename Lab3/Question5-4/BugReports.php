<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Bug Report</title>

    <body>
        <h1>Bug Report</h1>

        <?php
            $fileName = addslashes($_POST["number"]);
            $productName = addslashes($_POST["name"]);
            $productVersion = addslashes($_POST["version"]);
            $productHardware = addslashes($_POST["hardware"]);

            //Whats the point of fopen() and dclose()??? I just used file_put_contents()??
            //$bugReport = fopen("BugReports/" . $fileName . ".txt", "ab");

            

            file_put_contents("BugReports/" . $fileName . ".txt", $productName . "\n" . $productVersion . "\n" . $productHardware . "\n");

            echo "Report has been created/modified. <p><a href='bugReports.html'>Return to home page.</a></p>";
        
        ?>

    </body>
</html>