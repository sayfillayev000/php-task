<?php
require './header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];

    $password = $_POST["password"];

    $statement = $pdo->prepare("SELECT * FROM $table  WHERE email = :email");

    $statement->execute(['email' => $email]);

    $user_id = $statement->fetch();

    setcookie('id', $user_id['id']);

    $_SESSION["seccess"] = "user muvaffaqqiyatli login qildi";

    header("location: profile.php");
    exit;
}
?>

<main>
   <h1 style="text-align: center;">welcome</h1>
</main>

<?php
require './footer.php';
