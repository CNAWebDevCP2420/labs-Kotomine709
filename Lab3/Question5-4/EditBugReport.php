<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Bug Reporting</title>

    <body>
        <h1>Bug Reporting</h1>

        <h2>Select report number to edit</h2>     


        <?php
            $fileName = $_POST["reportList"];          

            $bugReport = fopen("BugReports/" . $fileName, "ab+");

            $productName = readline($bugReport);
            $productVersion = readline($bugReport);
            $productHardware = readline($bugReport);

            
           echo "<form method'POST' action='BugReports.php'>
           <p>Product Name <input type='text' name='name' value='" . $productName . "'/></p>
           <p>Version <input type='text' name='version' value='" . $productVersion . "'/></p>
           <p>Hardware <input type='text' name='hardware' value='" . $productHardware . "'/></p>
           <p><input type='submit' value='Submit' /></p>      
           <br />      
           </form>";
        
        ?>





        
    </body>
</html>