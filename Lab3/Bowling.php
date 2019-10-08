<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Player List</title>

    <body>
        <h1>Player List</h1>

        <?php
            $playerList = fopen("players.txt", "ab");

            $name = addslashes($_POST['name']);
            $age = addslashes($_POST['age']);
            $averge = addslashes($_POST['average']);

            fwrite($playerList, $name . ", " . $age . ", " . $averge . "\n");

            echo "Player '$name' has been added!";
        
        ?>

    </body>


</html>