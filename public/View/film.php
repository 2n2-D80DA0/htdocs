<?php
  require_once(__DIR__ . '/../Partials/blocks/htmlhead.php');
  require_once(__DIR__ . '/../Partials/blocks/header.php');
  require __DIR__. "/../../vendor/autoload.php";
  use Core\Storage;
  // описание фильма
  // актеры из фильма
  // сам фильм и трейлер
  // похожие фильмы
  // комментарии
    // print_r($film);
    // print_r($genres);
    // print_r($comments);

?>

    <style>
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }
        h1 { margin-top: 0; }

        .meta {
            margin-bottom: 15px;
            color: #555;
        }

        .genres span {
            display: inline-block;
            background: #e3e3e3;
            padding: 5px 10px;
            margin: 3px;
            border-radius: 5px;
            font-size: 14px;
        }

        .comments {
            margin-top: 30px;
        }

        .comment {
            border-top: 1px solid #ddd;
            padding: 10px 0;
        }

        .comment small {
            color: #777;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            color: #fff;
        }

        .in-stock { background: green; }
        .not-in-stock { background: red; }
    </style>
<div class="container">

  <h1><?= ($film['name']) ?></h1>
  <div style = "
    display: flex;
  ">
    <img src="<?php echo Storage::getPoster($film["id"])?>" alt="">
    <div class="meta">
      
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
            <span><?= ($genre['name']) ?></span>
          <?php endforeach; ?>
        </div>
    </div>
  </div>
  
  <div>
    <video width="100%" controls>
      <source src="<?php echo Storage::getFilm($film["id"])?>" type="video/mp4">
      Ваш браузер не поддерживает видео.
    </video>
  </div>

  <form action = "/comment" style = "margin-top:10px;" action="post">
    <input name="action" value="put" type="hidden">
    <textarea name="comment" required placeholder="Ваш комментарий"></textarea><br><br>
    <button type="submit" name="add_comment">Отправить</button>
  </form>

  <form action = "/rating" method="POST">
    <input name="action" value="put" type="hidden">
    <select name="rating" required>
        <option value="">выберите оценку</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <button type="submit" name="add_rating">Оценить</button>
  </form>

  <div class="comments">
    <h2>Комментарии (<?= count($comments) ?>)</h2>

    <?php if (empty($comments)){ ?>
        <p>Комментариев пока нет</p>
    <?php }else{ ?>
      <?php foreach ($comments as $c){ ?>
        <div style = "display:flex" class = "comment">
          <img width = 40px height = 40px src="<?php echo Storage::getAvatar($c["user_id"])?>" alt="">
          <div class="">
            
            <strong>Пользователь #<?= $c['user_id'] ?></strong><br>
            <small><?= $c['created_at'] ?></small>
            <p><?= nl2br(($c['comment'])) ?></p>
          </div>
        </div>
        
      <?php } ?>
    <?php } ?>
  </div>
  

    


