<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 

    <title>Sign GuestBook</title>

    <body>
        <h1>Sign GustBook</h1>

        <?php
            if(empty($_POST['first_name']) || empty($_POST['last_name']))
            {
                echo "You must enter your first and last name. Click your browsers back button to return to the guest book.";
            }
            else
            {
                $FirstName = addslashes($_POST['first_name']);
                $LastName = addslashes($_POST['last_name']);
                $GuestBook = fopen("guestbook.txt", "ab");

                if(is_writable("guestbook.txt"))
                {
                    if(fwrite($GuestBook, $LastName . ", " . $FirstName . "\n"))
                    {
                        echo "<p>Thank your for signing our guestbook!</p>\n";
                    }
                    else
                    {
                        echo"<p>Cannot add your name to the guest book.</p>";
                    }
                }
                else
                {
                    echo "Cannot write to the file";
                    fclose($GuestBook);
                }
            }

        
        ?>

    </body>


</html>