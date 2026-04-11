<?php
?>

  <div style = "
    display: flex;
  ">
    <a href = "/film/<?= $film["id"]?>">
      <img width=400 height = 400 src="<?php echo $photo ?>" alt="">
    </a>
    <div class="meta">
        <h1><?= ($person['name']." ".$person['namelast']) ?></h1>
        <strong>Дата рождения:</strong> <?= $person['born_date'] ?> <br>

        <strong>пол:</strong>
        <?php if ((bool)$person['gender']): ?>
          <span class="badge ">мужик</span>
        <?php else: ?>
          <span class="badge">женщина</span>
        <?php endif; ?>
	
        <strong></strong>
        <?php if (!(bool)$person['death_date']): ?>
          <span class="badge ">живой</span>
        <?php else: ?>
          <span class="badge">умер в <?php $person['death_date']?></span>
        <?php endif; ?>
        <div>
           <a href = "<?= $person['wiki_src']?>"><strong>ссылка на вики чувака:</strong></a>
        </div>

    </div>
  </div>