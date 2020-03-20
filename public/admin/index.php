<?php

require_once '../../views/layout/header.php';
require_once '../../function/bdd.php';
require_once '../../function/admin.php';

$user = getinfo();

?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">login</th>
      <th scope="col">Password</th>
      <th scope="col">email</th>
      <th scope="col">active</th>
      <th scope="col">role</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($user as $users) { ?>
      <tr>
        <td><?php echo $users['ID']; ?></td>
        <td><?php echo $users['login']; ?></td>
        <td><?php echo $users['password']; ?></td>
        <td><?php echo $users['email']; ?></td>
        <td><?php echo $users['active']; ?></td>
        <td><?php echo $users['role']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php require_once '../../views/layout/footer_admin.php';