<?php
require __DIR__."/../Partials/header.php";
require __DIR__."/../Partials/sidebar.php";

?>
<div class="container">
  <h1>Добавить человека</h1>
  <form id="addFilmForm" action="http://localhost/admin/person" method="post" enctype="multipart/form-data">
    <label>имя:
      <input type="text" name="name" required>
    </label>
    <label>фамилия:
      <input type="text" name="namelast" required>
    </label>

    <label>Дата рождения:
      <input type="date" name="born" required>
    </label>

    <label>пол:
      <select name="gender" required>
        <option value="1">мужской</option>
        <option value="0">женский</option>
      </select>
    </label>
    <label>ссылка на вики:
      <input type="text" name="wiki" required>
    </label>

    <input  name="method"  type="hidden" value="add">

    <label>фото
      <input type="file" name="image" accept="image/*" class="file-input" required>
    </label>

    <button type="submit">Добавить человека</button>
  </form>
</div>


<?php
require __DIR__."/../Partials/footer.php";
?>