
<?php
require_once(__DIR__ . '/../Partials/blocks/htmlhead.php');
require_once(__DIR__ . '/../Partials/blocks/header.php');
?>

<form style="
    display:flex;
    flex-direction:column;
    gap: 10px;
    width: 300px;
    text-align:center;
    margin: 200px auto;
    transform:scale(1.6);
" method="POST" action = "<?php echo BASE_URL?>/register" enctype="multipart/form-data" >
  <h1>register</h1>
  <input name = "action" value = "add" type="hidden">
  <input placeholder="nick" name="nick">
  <input placeholder="name" name="name">
  <input placeholder="lastname" name="lastname">
  <input placeholder="email" name="email">
  <input placeholder="password" name="password">
  <input placeholder="passwordConfirm" name="passwordConfirm">
  <input type="file" placeholder="img" accept="image/*" name="avatar">
  <button>Register</button>
</form>
<?php
require_once(__DIR__ . '/../Partials/blocks/footer.php');
?>