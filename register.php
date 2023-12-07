<?php
require './header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // createTable();

    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $password = $_POST["password"];

    $statement = $pdo->prepare("INSERT INTO $table (firstname, surname,age,phone,email,city,pass) VALUES (:firstname, :surname,:age,:phone,:email,:city,:pass) ");

    $statement->execute([
        "firstname" => $firstname,
        "surname" => $surname,
        "age" => $age,
        "phone" => $phone,
        "email" => $email,
        "city" => $city,
        'pass' => $password,
    ]);

    $statement = $pdo->prepare("SELECT * FROM $table  WHERE email = :email");

    $statement->execute(['email' => $email]);

    $user_id = $statement->fetch();

    setcookie('id', $user_id['id']);

    $_SESSION["seccess"] = "profile muvaffaqqiyatli yaratildi";
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
        <label for="firstname">
            <h3>firstname</h3>
            <input required type="text" placeholder="firstname" name="firstname" id="firstname">
        </label>
        <label for="surname">
            <h3> surname</h3>
            <input required type="text" placeholder="surname" name="surname" id="surname">
        </label>
        <label for="age">
            <h3> age</h3>
            <input required type="number" placeholder="age" name="age" id="age">
        </label>
        <label for="phone">
            <h3>phone</h3>
            <input required type="tel" placeholder="phone" name="phone" id="phone">
        </label>
        <label for="email">
            <h3> email</h3>
            <input required type="email" placeholder="email" name="email" id="email">
        </label>
        <label for="password">
            <h3> password</h3>
            <input required type='password' placeholder="password" name="password" id="password">
        </label>
        <label for="city">
            <h3>city</h3>
            <input required type="text" placeholder="city" name="city" id="city">
        </label>
        <button type="submit">Submit</button>
    </form>
</main>

<?php
require './footer.php';
