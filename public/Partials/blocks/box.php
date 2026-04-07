  <div class="box">
    <div class="head">
      <h2><?php echo $boxHeader?></h2>
      <p class="text-right"><a href="films/<?php echo $boxHeader?>">See all</a></p>
    </div>
    <?php
      foreach($items as $item){
        include(__DIR__ . "/items/filmcard.php");
      } 
    ?>
    <div class="cl">&nbsp;</div>
  </div>