<h3>Список пользователей:</h3>
<?php
foreach ($data as $item): ?>
    <?php //echo ?>
    <p>Имя: <?php echo $item['name']?></p>
    <p>Возраст: <?php echo $item['age']?></p>
    <p>Описание: <?php echo $item['description']?></p>
    <hr>
<?php endforeach; ?>
<a href="main">Назад</a><br>