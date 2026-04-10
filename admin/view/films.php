<?php
require __DIR__."/../Partials/header.php";
require __DIR__."/../Partials/sidebar.php";

?>

<table>

<?php
foreach($films as $film){
?>
  <tr>
    <td  rowspan="8" style="
      
    ">
    <div style = "background-image: url(http://localhost/storage/miniature/<?=$film['id']."/".scandir(__dir__."../../../storage/miniature/".$film['id'])["2"] ?>);" class="poster">

    </div>
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
    <td><strong>В режиссёрах:</strong> в продах </td>
  </tr>
  <tr>
    <td><strong>В продюсерах:</strong> в режисерах</td>
  </tr>
  <tr>
    <td><strong>В актерах:</strong> в актерах</td>
  </tr>
  <tr>
    <td><strong>есть ли фильм на сайте:</strong> <?php echo (bool)$film['in_stock']? "есть на сайте" : "пока только трейлер"?> </td>
  </tr>
  <tr>
    <td><strong>Описание:</strong><br>
      <?=$film['lor']?>
    </td>
  </tr>
  <tr>
    <td>
      <form action="http://localhost/admin/film/<?= $film['id'] ?>" method="post">
        <td>
          <button type="submit" name="method" value="delete" onclick="return confirm('Удалить фильм?')">
            Удалить
          </button>
        </td>
    </form>
    </td>
  </tr>



<?php
}
?>
</table>

<?php
require __DIR__."/../Partials/footer.php";
?>

