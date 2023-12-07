<?php
require './header.php';

if (isset($_COOKIE['id'])) {

    $statement = $pdo->prepare("SELECT * FROM $table  WHERE id = :id LIMIT 1 ");

    $statement->execute(['id' => $_COOKIE['id']]);

    $user_id = $statement->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" &&  isset($_POST['DELETE'])) {

    $statement = $pdo->prepare("DELETE FROM $table WHERE id = :id");

    $statement->execute(['id' => $user_id['id']]);

    $_SESSION["seccess"] = "User Muvaffaqqiyatli o'chirildi";
}
?>

<main>
    <?php if (isset($_SESSION["seccess"])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION["seccess"] ?>
            <?php unset($_SESSION["seccess"]) ?>
        </div>
    <?php endif; ?>

    <div style="width: 600px; margin: 50px auto" class="profile__card">
        <h2>firstname :<?= $user_id['firstname'] ?></h2>
        <h2>surname : <?= $user_id['surname'] ?></h2>
        <h2>age : <?= $user_id['age'] ?></h2>
        <h2>phone : <?= $user_id['phone'] ?></h2>
        <h2>email : <?= $user_id['email'] ?></h2>
        <h2>city : <?= $user_id['city'] ?></h2>
        <h2>pass : <?= $user_id['pass'] ?></h2>

    </div>
    <form action="" method="post">
        <input type="hidden" name="DELETE">
        <button style="display:block; margin:0 auto; cursor: pointer; padding:10px 15px" type="submit">profile delete</button>
        </form>
</main>

<?php
require './footer.php';
