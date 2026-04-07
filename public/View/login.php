
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
" method="POST" action = "<?php echo BASE_URL?>/login" >
    <h1>login</h1>
    <input name = "action" value = "add" type="hidden">
    <input placeholder="email" name="email">
    <input placeholder="password" name="password">
    <button>login</button>
</form>

<?php
require_once(__DIR__ . '/../Partials/blocks/footer.php');
?>
