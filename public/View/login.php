
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
" method="POST" action = "<?php echo BASE_URL?>/login" id = "login" >
    <h1>login</h1>
    <input name = "method" value = "add" type="hidden">
    <input placeholder="email" name="email">
    <input placeholder="password" name="password">
    <button>login</button>
</form>

<script>

    form = document.getElementById("login") 

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const response = await fetch("/login", {method:"POST", body:formData});
      const text = await response.text();
      const parsed = JSON.parse(text);

      [...form.getElementsByClassName('clear')].forEach((el)=>{
        el.value = "";
      });

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
