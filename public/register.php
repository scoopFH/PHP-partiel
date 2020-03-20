<?php require_once '../views/layout/header.php';
require_once '../function/bdd.php';

if (!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['email']) && !empty($_POST['role'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $role =$_POST['role'];

    $insert = NULL;

    $pdo = getPdo();
if ( ($_POST['password'] == $_POST['confirm_password'])){
    $query = 'INSERT INTO users (login, password, confirm_password, email, active, role) VALUES (:login, :password, :confirm_password, :email, 1, :role)';
    $stmt = $pdo->prepare($query);

    $insert = $stmt->execute([
        'login' => $login,
        'password' => password_hash("$password", PASSWORD_BCRYPT, ['cost' => 12]),
        'confirm_password' => password_hash("$password", PASSWORD_BCRYPT, ['cost' => 12]),
        'email' => $email,
        'role' => $role,
    ]);
} else { ?>
    <div class="alert alert-danger" role="alert">
        ERREUR !!!!!!!!!!!
    </div>
<?php }
}
?>

<?php if ($insert) { ?>
    <div class="alert alert-success" role="alert">
        Vous êtes Nouveau !
    </div>
<?php } ?>

<?php if ($insert === false) { ?>
    <div class="alert alert-danger" role="alert">
        Vous êtes déjà enregistrez !
    </div>
<?php } ?>

<form method="post">
    <div class="form-group">
        <label for="login">Login</label>
        <input type="login" class="form-control" id="login" placeholder="Enter Login" name="login">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    </div>
    <div class="form-group">
        <label for="confirm_password">Password</label>
        <input type="password" class="form-control" id="confirm_password" placeholder="retype" name="confirm_password">
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" id="email"  placeholder="email" name="email">
    </div>
    <div class="form-group">
        <label for="role">Rôle</label>
        <select class="form-control" id="role" name="role">
            <option>admin</option>
            <option>visiteur</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once '../views/layout/footer.php';
