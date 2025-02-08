<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request OTP</title>
</head>
<body>
    <fieldset>
        <legend>Send OTP</legend>

        <form action="sendOTP.php" method="POST">
            <div>
                <input type="text" name="email" required placeholder="Email">
            </div>

            <button class="btnSend">Enviar</button>
        </form>
    </fieldset>
</body>
</html>