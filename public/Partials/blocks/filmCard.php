<?php
use Core\Storage;

?>
  <div style = "
    display: flex;
  ">
    <img style = "margin:10px" width = 300 height = 400 src="<?php echo Storage::getPoster($film["id"])?>" alt="">
    <div class="meta">
        <h1><?= ($film['name']) ?></h1>
        <strong>Рейтинг:</strong> <?= $film['rating'] ?> <br>
        <strong>Дата выхода:</strong> <?= $film['film_release'] ?> <br>

        <strong>Статус:</strong>
        <?php if ($film['in_stock']): ?>
          <span class="badge in-stock">Доступен</span>
        <?php else: ?>
          <span class="badge not-in-stock">Нет в наличии</span>
        <?php endif; ?>


        <div>
          <strong>Описание:</strong>
          <p><?= nl2br(($film['lor'])) ?></p>
        </div>

        <div class="genres">
          <strong>Жанры:</strong><br>
          <?php foreach ($genres as $genre): ?>
            <a href="/genre/<?= ($genre['id']) ?>"><?= ($genre['name']) ?></a>
          <?php endforeach; ?>
        </div>
    </div>
  </div>