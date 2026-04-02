<?php
require __DIR__."/../Partials/header.php";
require __DIR__."/../Partials/sidebar.php";

?>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    table {
      border-collapse: collapse;
      width: 600px;
    }
    td {
      border: 1px solid #ccc;
      padding: 10px;
      vertical-align: top;
    }
    .poster {
      width: 200px;
    }
    .poster img {
      width: 100%;
      height: auto;
      display: block;
    }
    .title {
      font-size: 20px;
      font-weight: bold;
    }
  </style>

<table>

  <tr>
    <td class="poster" rowspan="9">
      <img src="poster.jpg" alt="Постер">
    </td>
    <td class="title"><?=$film['name']?></td>
  </tr>
  <tr>
    <td><strong>Год выпуска:</strong> <?=$film['film_release']?></td>
  </tr>
  <tr>
    <td><strong>Жанр:</strong> <?=$film['name']?></td>
  </tr>
  <tr>
    <td><strong>В режиссёрах:</strong> в продах</td>
  </tr>
  <tr>
    <td><strong>В продюсерах:</strong> в режисерах</td>
  </tr>
  <tr>
    <td><strong>В актерах:</strong> в актерах</td>
  </tr>
  <tr>
    <td><strong>есть ли фильм на сайте:</strong> <?php echo (bool)$film['name']? "есть на сайте" : "пока только трейлер"?> </td>
  </tr>
  <tr>
    <td><strong>Описание:</strong><br>
      <?=$film['lor']?>
    </td>
  </tr>
  <tr>
    <td>
      <a>изменить<a>
      <a>удалить<a>
      <a>подробнее<a>
    </td>
  </tr>

</table>


<?php
require __DIR__."/../Partials/footer.php";
?>