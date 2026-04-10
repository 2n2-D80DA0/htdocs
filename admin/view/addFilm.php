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
          <option value="<?= $index ?>"><?= $lang['ru_name'] ?></option>
        <?php endforeach; ?>
      </select>
    </label>

    <label>Жанры:</label>
    <div class="genres-container">
      <div class="genres-list">
        <h4>Доступные жанры</h4>
        <?php foreach($genres as $index => $genre){ ?>
          <div class="genre-item" data-index="<?= $index ?>"><?= $genre['ru_name'] ?></div>
        <?php }; ?>
      </div>
      <div class="selected-genres">
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

    
    const form = document.getElementById('addFilmForm');
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const id = [...selectedGenresContainer.children].map(el => el.dataset.index);
      const formData = new FormData(form);
      
      formData.append("postArray",JSON.stringify(id));

      const selectedGenres = Array.from(selectedGenresContainer.querySelectorAll('.genre-item'));
      fetch("/admin/film", {method:"POST", body:formData});
    });
</script>
<style>

</style>


<?php
require __DIR__."/../Partials/footer.php";
?>