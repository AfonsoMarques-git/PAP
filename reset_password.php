<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body>
    <?php
    $otp = $_POST["otp"];
    include_once 'connect.php';
    $sql = "SELECT * FROM utilizadores WHERE otp = :otp";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["otp" => $otp]);
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
        <fieldset>
            <legend>Reset Password</legend>

            <form action="update_password.php" method="POST">
                <input type="hidden" name="otp" value="<?php echo $otp; ?>">
                <div>
                    <input type="password" name="new_password" required>
                    <span>New Password</span>
                </div>

                <div>
                    <input type="password" name="confirm_password" required>
                    <span>Confirm Password</span>
                </div>

                <button class="btnSend">Submit</button>
            </form>
        </fieldset>
        <?php
    } else {
        echo "Incorrect OTP, try again later...";
    }
    ?>
</body>

</html>