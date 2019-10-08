<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Song Organizer</title>

    <body>
        <h1>Song Organizer</h1>

        <?php
            if (isset($_GET['action']))
            {
                if((file_exists("SongOrganizer/songs.txt")) && (filesize("SongOrganizer/songs.txt") != 0))
                {
                    $SongArray = file("SongOrganizer/songs.txt");
                    switch ($_GET['action']){ 
                        case 'Remove Duplicates':
                            $SongArray = array_unique($SongArray);
                            $SongArray = array_values($SongArray);
                        break;
                        case 'Sort Ascending':
                            sort($SongArray);
                        break;
                        case 'Shuffle':
                            shuffle($SongArray);
                        break;
                    }
                    if(count($SongArray)>0)
                    {
                        $NewSongs = implode($SongArray);
                        $SongStore = fopen("SongOrganizer/songs.txt", wb);
                        if($SongStore === false)
                            echo "There was an error";
                        else
                        {
                            fwrite($SongStore, $NewSongs);
                            fclose($SongStore);
                        }
                    }
                    else
                    {
                        unlink("SongOrganizer/songs.txt");
                    }
                }
            }

            if(isset($_POST['submit']))
            {
                $SongToAdd = stripslashes($_POST['SongName']) . "\n";
                $ExistingSongs = array();
                if(file_exists("SongOrganizer/songs.txt") && (filesize("SongOrganizer/songs.txt")>0))
                {
                    $ExistingSongs = file("SongOrganizer/songs.txt");
                }
            }

            if(in_array($SongToAdd, $ExistingSongs))
            {
                echo "<p>The song you entered already exists<br />\n";
                echo "Your song was not added to the list.</p>";
            }
            else
            {
                $SongFile = fopen("SongOrganizer/songs.txt", ab);
                
            }
        
        ?>

    </body>
</html>