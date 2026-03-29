<?php
// addFilm.php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить фильм</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .container { max-width: 800px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input, select, textarea, button { margin-top: 5px; width: 100%; padding: 5px; }
        .genres-container { display: flex; gap: 20px; margin-top: 10px; }
        .genres-list, .selected-genres { height: fit-content;   flex-wrap: wrap; display:flex; flex: 1; border: 1px solid #ccc; padding: 10px; min-height: 100px; }
        .genre-item {border: 1px solid red;
    padding: 5px; cursor: pointer; padding: 5px; border-bottom: 1px solid #eee; }
        .genre-item:hover { background-color: #f0f0f0; }
        .file-input { margin-top: 5px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Добавить фильм</h1>
    <form id="addFilmForm">
        <label>Название фильма:
            <input type="text" name="film_name" required>
        </label>

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
                    <option value="<?= $index ?>"><?= htmlspecialchars($lang['ru_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Жанры:</label>
        <div class="genres-container">
            <div class="genres-list">
                <h4>Доступные жанры</h4>
                <?php foreach($genres as $index => $genre): ?>
                    <div class="genre-item" data-index="<?= $index ?>"><?= htmlspecialchars($genre['ru_name']) ?></div>
                <?php endforeach; ?>
            </div>
            <div class="selected-genres">
                <h4>Выбранные жанры</h4>
            </div>
        </div>
        <input type="text" name="method" value="put" >

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

      const formData = new FormData(form);
      const selectedGenres = Array.from(selectedGenresContainer.querySelectorAll('.genre-item'))
        .map(el => el.dataset.index);
      formData.append('genres', JSON.stringify(selectedGenres));

      try {
        const response = await fetch('/admin/films/add', {
          method: 'POST',
          body: formData
        });

        if (response.ok) {
          alert('Фильм успешно добавлен');
          form.reset();
          selectedGenresContainer.innerHTML = '<h4>Выбранные жанры</h4>';
        } else {
          const text = await response.text();
          alert('Ошибка при добавлении фильма: ' + text);
          }
      } catch (err) {
        console.error(err);
        alert('Ошибка сети');
      }
    });
</script>
</body>
</html>