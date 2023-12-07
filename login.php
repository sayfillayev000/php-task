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
    <?php if (isset($_SESSION["seccess"])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION["seccess"] ?>
            <?php unset($_SESSION["seccess"]) ?>
        </div>
    <?php endif; ?>
    <form class="register-form" action="" method="post">
        <label for="email">
            <h3> email</h3>
            <input required type="email" placeholder="email" name="email" id="email">
        </label>
        <label for="password">
            <h3> password</h3>
            <input required type='password' placeholder="password" name="password" id="password">
        </label>
        <button type="submit">Submit</button>
    </form>
</main>

<?php
require './footer.php';
