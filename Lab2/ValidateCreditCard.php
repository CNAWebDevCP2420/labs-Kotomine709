<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <title>
        Validate Credit Card
    </title>

    <body>
        <h1>Validate Credit Card</h1><hr />
    
    <?php
        $CreditCard = array("", "8910-1234-5678-6543", "OOOO-9123-4567-1234");

        foreach($CreditCard as $CardNumber)
        {
            if(empty($CardNumber))
                echo"<P>This credit card number is invalid because it contains an empty string.</p>";
            else {
                $creditCardNumber = $CardNumber;
                $creditCardNumber = str_replace("-", "", $creditCardNumber);
                $creditCardNumber = str_replace(" ", "", $creditCardNumber);

                if(!is_numeric($creditCardNumber))
                    echo "<p>Credit card number ".$creditCardNumber." is not valid because it contains non-numeric characters.</P>";
                else
                    echo "<p>Credit card number ".$creditCardNumber." is valid.</p>";
            }
        }
    ?>
    
    
    </body>


</html>