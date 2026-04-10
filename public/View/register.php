
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
" method="POST" id = "reg" action = "<?php echo BASE_URL?>/register" enctype="multipart/form-data" >
  <h1>register</h1>
  <input class = "clear" name = "method" value = "add" type="hidden">
  <input class = "clear" placeholder="nick" name="nick">
  <input class = "clear" placeholder="name" name="name">
  <input class = "clear" placeholder="lastname" name="lastname">
  <input class = "clear" placeholder="email" name="email">
  <input class = "clear" placeholder="password" name="password">
  <input class = "clear" placeholder="passwordConfirm" name="passwordConfirm">
  <input class = "clear" type="file" placeholder="img" accept="image/*" name="avatar">
  <button>Register</button>
</form>


<script>

  form = document.getElementById("reg") 

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    const response = await fetch("<?php echo BASE_URL?>/register", {method:"POST", body:formData});
    const text = await response.text();
    const parsed = JSON.parse(text);
 

    if(parsed.status === "error"){
      alert(parsed.msg);
    }else{
      location.href = 'http://localhost/home';
    }

  });
</script>

<?php
require_once(__DIR__ . '/../Partials/blocks/footer.php');
?>