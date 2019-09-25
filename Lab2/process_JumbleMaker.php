<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <title>
        Jumble Maker
    </title>

    <body>
        <h1>Jumble Maker</h1><hr />
    
    <?php
        function displayError($fieldName, $errorMsg)
        {
            global $errorCount;
            echo "Error count for \"$fieldName\": $errorMsg<br />\n";
            ++$errorCount;
        }

        function valiateWord($data, $fieldName)
        {
            global $errorCount;

            if (empty($data))
            {
                displayError($fieldName, "This field is required");
                $retval = "";
            }
            else
            {
                $retval = trim($data);
                $retval = stripcslashes($retval);

                if((strlen($retval) < 4) || (strlen($retval) > 7))
                {
                    displayError($fieldName, "Words must be between 4 and 7 characters");
                }
                if (preg_match("/^[a-z]+$/i", $retval) == 0)
                {
                    displayError($fieldName, "Words must contain only letters");
                }
                $retval = strtoupper($retval);
                $retval = str_shuffle($retval);
                return($retval);
            }
        }

        $errorCount = 0;
        $words = array();

        $words[] = valiateWord($_POST['Word1'], "Word 1");
        $words[] = valiateWord($_POST['Word2'], "Word 2");
        $words[] = valiateWord($_POST['Word3'], "Word 3");
        $words[] = valiateWord($_POST['Word4'], "Word 4");

        if ($errorCount > 0)
        {
            echo "please use the \"Back\" button to re-enter data.<br />\n";
        }
        else
        {
            $wordnum = 0;
            foreach($words as $word)
                echo "Word " . ++$wordnum . ": $word<br />\n";
        }

    ?>
    
    
    </body>


</html>