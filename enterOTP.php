<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
</head>

<body>
    <fieldset>
        <legend>Enter OTP</legend>

        <form action="reset_password.php" method="POST">
            <div>
                <input type="password" name="otp" required>
            </div>

            <button class="btnSend">Submit</button>
        </form>
    </fieldset>
</body>

</html>