<!DOCTYPE html>


<body>

    <title>Collage Internship</title>

    <h1>Collage internship</h1>
    <h2>Register / Log In</h2>
    <p>New interns, please complete the top form to register as a user. Returning users, please complete the second form to log in.</p>
    <hr />

    <h3>New intern registration</h3>
    <form method="post" action="RegisterIntern.php">
        <p>Enter your name: First<input type="text" name="first" />
        Last<input type="text" name="lst" /></p>

        <p>Enter your e-mail address:<input type="text" name="email" /></p>

        <p>Enter a password for your account:<input type="text" name="password" /></p>
        <p>Confirm your password:<input type="text" name="password2" /></p>

        <p><em>(Passwords are case sensative and must be at least 6 characters long)</em></p>

        <input type="reset" name="reset" value="Reset registration form" />

        <input type="submit" name="register" value="Register" />
    </form>
    <hr />

    <h3>Returning users</h3>
    <form method="post" action="VerifyLogin.php">
        <p>Enter your email address:<input type="text"  name="email" /></p>

        <p>Enter your password:<input type="text" name="password" /></p>

        <p><em>(Passwords are case sensative and must be at least 6 characters long)</em></p>

        <input type="reset" name="reset" value="Reset login form" />

        <input type="submit" name="login" value="Log In" />
    </form>
    <hr />
    
</body>