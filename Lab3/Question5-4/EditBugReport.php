<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Bug Reporting</title>

    <body>
        <h1>Bug Reporting</h1>

        <h2>You may edit the report contents here</h2>     


        <?php
            $fileName = $_POST["reportList"];          

            $bugReport = fopen("BugReports/" . $fileName, "a+b");

            $name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
            $productName = fgets($bugReport);
            $productVersion = fgets($bugReport);
            $productHardware = fgets($bugReport);

            
           echo "<form method='POST' action='BugReports.php'>
           <p>Report Number <input type='text' name='number' value='" . $name . "' readonly/></p>
           <p>Product Name <input type='text' name='name' value='" . $productName . "'/></p>
           <p>Version <input type='text' name='version' value='" . $productVersion . "'/></p>
           <p>Hardware <input type='text' name='hardware' value='" . $productHardware . "'/></p>
           <p><input type='submit' value='Submit' /></p>      
           <br />      
           </form>";
        
        ?>





        
    </body>
</html>