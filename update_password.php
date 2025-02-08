<?php
include_once 'connect.php';

$otp = $_POST["otp"];
$new_password = $_POST["new_password"];
$confirm_password = $_POST["confirm_password"];

if ($new_password === $confirm_password) {
    // Store the password as plain text
    $plain_password = $new_password;

    try {
        $sql = "UPDATE utilizadores SET palavra_passe = :password, otp = NULL WHERE otp = :otp";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["password" => $plain_password, "otp" => $otp]);

        echo "Password updated successfully.";
    } catch (PDOException $e) {
        echo "Ocorreu um erro ao atualizar a password: " . $e->getMessage();
    }
} else {
    echo "Passwords do not match.";
}
?>
