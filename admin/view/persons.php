<?php
require __DIR__."/../Partials/header.php";
require __DIR__."/../Partials/sidebar.php";
?>

<table>

<?php
foreach($persons as $person){
?>
  <tr>
    <td  rowspan="5" style="
      
    ">
    <div style = "background-image: url(http://localhost/storage/personsPhotoDir/<?=$person['id']."/".scandir(__dir__."../../../storage/personsPhotoDir/".$person['id'])["2"] ?>);" class="poster">

    </div>
    </td>
    
    <td class="title"><?=$person['name']?> <?=$person['namelast']?></td>
  </tr>
  <tr>
    <td><strong>Год рождения:</strong> <?=$person['born_date']?></td>
  </tr>
  <tr>
    <td><strong>пол</strong> <?php echo (bool)$person['gender']? "мужской" : "женский"?></td>
  </tr>
  <tr>
    <td>
      <a href="<?php echo $person['wiki_src']?>"><strong>ссылка на вики</strong></a> <br>
      
    </td>
  </tr>
  <tr>
    <td>
      <a>изменить<a>
      <a>удалить<a>
      <a>подробнее<a>
    </td>
  </tr>



<?php
}
?>
</table>

<?php
require __DIR__."/../Partials/footer.php";
?>




<?php
require __DIR__."/../Partials/footer.php";
?>
