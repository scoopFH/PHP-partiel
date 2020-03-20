<!-- FOOTER -->
<?php

if (!empty($_POST) && !empty($_POST['email'])) {
    $email = $_POST['email'];

    $insert = NULL;

    $pdo = getPdo();

    $query = 'INSERT INTO newsletter (email) VALUES (:email)';
    $stmt = $pdo->prepare($query);
    $insert = $stmt->execute([
        'email' => $email
    ]);
}
?>

<?php if ($insert) { ?>
  <div class="alert alert-success" role="alert">
    Vous êtes abonné ! <a href="/index.php">Retour à la liste</a>
  </div>
<?php } ?>

<?php if ($insert === false) { ?>
  <div class="alert alert-danger" role="alert">
    Vous êtes déjà enregistrez !
  </div>
<?php } ?>

<!-- FOOTER -->
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>


<form method="post">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</html>
<!-- /FOOTER -->
