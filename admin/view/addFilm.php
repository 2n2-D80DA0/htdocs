<?php
require __DIR__."/../Partials/header.php";
require __DIR__."/../Partials/sidebar.php";

?>
<div class="container">
  <h1>Добавить фильм</h1>
  <form id="addFilmForm" action="/admin/film" method="post" enctype="multipart/form-data">
    <label>Название фильма:
      <input type="text" name="film_name" required>
    </label>
<input type="hidden" name="sessid" value="<?=session_id()?>">
    <label>Описание:
      <textarea name="lor" rows="4" required></textarea>
    </label>

    <label>Дата релиза:
      <input type="date" name="release_date" required>
    </label>

    <label>Язык:
      <select name="language" required>
        <option value="">Выберите язык</option>
        <?php foreach($languages as $index => $lang): ?>
          <option value="<?= $lang["id"] ?>"><?= $lang['ru_name'] ?></option>
        <?php endforeach; ?>
      </select>
    </label>

    <label>Жанры:</label>
    <div class="genres-container">
      <div class="genres-list list">
        <h4>Доступные жанры</h4>
        <?php foreach($genres as $index => $genre){ ?>
          <div class="genre-item itemq" data-index="<?= $genre["id"] ?>"><?= $genre['ru_name'] ?></div>
        <?php }; ?>
      </div>
      <div class="selected-genres selected">
      </div>
    </div>

    <label>actors:</label>
    <div class="actors-container">
      <div class="actors-list list">
        <h4>Доступные жанры</h4>
        <?php foreach($persons as $index => $genre){ ?>
          <div class="actors-item itemq" data-index="<?= $genre["id"] ?>"><?= $genre['name']." ".$genre['namelast'] ?></div>
        <?php }; ?>
      </div>
      <div class="selected-actors selected">
      </div>
    </div>


    <label>режисер:</label>
    <div class="directors-container">
      <div class="directors-list list">
        <h4>Доступные жанры</h4>
        <?php foreach($persons as $index => $genre){ ?>
          <div class="directors-item itemq" data-index="<?= $genre["id"] ?>"><?= $genre['name']." ".$genre['namelast'] ?></div>
        <?php }; ?>
      </div>
      <div class="selected-directors selected">
      </div>
    </div>

    
    <label>продюсер:</label>
    <div class="producer-container">
      <div class="producer-list list">
        <h4>Доступные жанры</h4>
        <?php foreach($persons as $index => $genre){ ?>
          <div class="producer-item itemq" data-index="<?= $genre["id"] ?>"><?= $genre['name']." ".$genre['namelast'] ?></div>
        <?php }; ?>
      </div>
      <div class="selected-producer selected">
      </div>
    </div>

    <input type="hidden" name="method" value="add" >

    <label>Постер:
      <input type="file" name="poster" accept="image/*" class="file-input" required>
    </label>
    <label>Фильм:
      <input type="file" name="movie" accept="video/*" class="file-input" required>
    </label>
    <label>Трейлер:
      <input type="file" name="trailer" accept="video/*" class="file-input" required>
    </label>

    <button type="submit">Добавить фильм</button>
  </form>            

</div>

<script>
    const availableGenres = document.querySelectorAll('.genre-item');
    const selectedGenresContainer = document.querySelector('.selected-genres');
    availableGenres.forEach(item => {
      item.addEventListener('click', () => {
        if (!selectedGenresContainer.querySelector(`[data-index='${item.dataset.index}']`)) {
          const cloned = item.cloneNode(true);
          cloned.addEventListener('click', () => cloned.remove());
          selectedGenresContainer.appendChild(cloned);
        }
      });
    });
    const availabledirectors = document.querySelectorAll('.directors-item');
    const selecteddirectorsContainer = document.querySelector('.selected-directors');
    availabledirectors.forEach(item => {
      item.addEventListener('click', () => {
        if (!selecteddirectorsContainer.querySelector(`[data-index='${item.dataset.index}']`)) {
          const cloned = item.cloneNode(true);
          cloned.addEventListener('click', () => cloned.remove());
          selecteddirectorsContainer.appendChild(cloned);
        }
      });
    });
    const availableactors = document.querySelectorAll('.actors-item');
    const selectedactorsContainer = document.querySelector('.selected-actors');
    availableactors.forEach(item => {
      item.addEventListener('click', () => {
        if (!selectedactorsContainer.querySelector(`[data-index='${item.dataset.index}']`)) {
          const cloned = item.cloneNode(true);
          cloned.addEventListener('click', () => cloned.remove());
          selectedactorsContainer.appendChild(cloned);
        }
      });
    });
    const availableproducer = document.querySelectorAll('.producer-item');
    const selectedproducerContainer = document.querySelector('.selected-producer');
    availableproducer.forEach(item => {
      item.addEventListener('click', () => {
        if (!selectedproducerContainer.querySelector(`[data-index='${item.dataset.index}']`)) {
          const cloned = item.cloneNode(true);
          cloned.addEventListener('click', () => cloned.remove());
          selectedproducerContainer.appendChild(cloned);
        }
      });
    });


    
    const form = document.getElementById('addFilmForm');
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const idg = [...selectedGenresContainer.children].map(el => el.dataset.index);
      const idd = [...selecteddirectorsContainer.children].map(el => el.dataset.index);
      const ida = [...selectedactorsContainer.children].map(el => el.dataset.index);
      const idp = [...selectedproducerContainer.children].map(el => el.dataset.index);

      const formData = new FormData(form);
      
      formData.append("genres",JSON.stringify(idg));
      formData.append("directors",JSON.stringify(idd));
      formData.append("actors",JSON.stringify(ida));
      formData.append("producer",JSON.stringify(idp));

      const selectedGenres = Array.from(selectedGenresContainer.querySelectorAll('.genre-item'));
      fetch("/admin/film", {method:"POST", body:formData});
    });
</script>
<style>

</style>


<?php
require __DIR__."/../Partials/footer.php";
?>