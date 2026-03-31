<!-- Форма создания -->
<form action="http://localhost/admin/genre" method="post">
    <input type="hidden" name="method" value="put">

    <input type="text" name="ru_name" placeholder="Русское название" required>
    <input type="text" name="en_name" placeholder="English name" required>

    <button type="submit">Создать жанр</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>RU</th>
            <th>EN</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach ($genres as $genre): ?>
        <tr>
            <form action="http://localhost/admin/genres/<?= $genre['id'] ?>" method="post">
                <td><?= $genre['id'] ?></td>

                <td>
                    <input type="text" name="ru_name" value="<?= htmlspecialchars($genre['ru_name']) ?>">
                </td>

                <td>
                    <input type="text" name="en_name" value="<?= htmlspecialchars($genre['en_name']) ?>">
                </td>

                <td>
                    <button type="submit" name="method" value="patch">
                        Сохранить
                    </button>
                    <button type="submit" name="method" value="delete"
                            onclick="return confirm('Удалить?')">
                        Удалить
                    </button>
                </td>
            </form>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>