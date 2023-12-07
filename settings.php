<?php
require './header.php';

if (isset($_COOKIE['id'])) {

    $statement = $pdo->prepare("SELECT * FROM $table  WHERE id = :id ");

    $statement->execute(['id' => $_COOKIE['id']]);

    $user_id = $statement->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $password = $_POST["password"];

    $statement = $pdo->prepare("UPDATE $table SET firstname = :firstname, surname = :surname,age = :age, phone = :phone, email = :email, city = :city, 	pass = :pass  WHERE id = :id");

    $statement->execute([
        'firstname' => $_POST["firstname"],
        'surname' => $_POST["surname"],
        'age' => $_POST["age"],
        'phone' => $_POST["phone"],
        'email' => $_POST["email"],
        'city' => $_POST["city"],
        'pass' => $_POST["password"],
        'id' => $_COOKIE['id'],
    ]);


    $_SESSION["seccess"] = "profile muvaffaqqiyatli o'zgartirildi";

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
    <h1 style="text-align: center;margin-top: 50px;">Edit Profile</h1>
    <form class="register-form" action="" method="post">
        <label for="firstname">
            <h3>firstname</h3>
            <input required value="<?= $user_id['firstname'] ?>" type="text" placeholder="firstname" name="firstname" id="firstname">
        </label>
        <label for="surname">
            <h3> surname</h3>
            <input required value="<?= $user_id['surname'] ?>" type="text" placeholder="surname" name="surname" id="surname">
        </label>
        <label for="age">
            <h3> age</h3>
            <input required value="<?= $user_id['age'] ?>" type="number" placeholder="age" name="age" id="age">
        </label>
        <label for="phone">
            <h3>phone</h3>
            <input required value="<?= $user_id['phone'] ?>" type="tel" placeholder="phone" name="phone" id="phone">
        </label>
        <label for="email">
            <h3> email</h3>
            <input required value="<?= $user_id['email'] ?>" type="email" placeholder="email" name="email" id="email">
        </label>
        <label for="password">
            <h3> password</h3>
            <input required type='password' value="<?= $user_id['email'] ?>" placeholder="password" name="password" id="password">
        </label>
        <label for="city">
            <h3>city</h3>
            <input required value="<?= $user_id['city'] ?>" type="text" placeholder="city" name="city" id="city">
        </label>
        <button type="submit">Submit</button>
    </form>
</main>

<?php
require './footer.php';
