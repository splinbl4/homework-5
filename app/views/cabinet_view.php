<h3>Личные данные</h3>
<p>Ваше имя: <?php echo $data['name']?></p>
<p>Ваш возраст: <?php echo $data['age']?> лет</p>
<p>О себе: <?php echo $data['description']?></p>
<p>Список загруженных файлов: </p>
<?php
 foreach ($data1 as $item) {
     echo $item->filename . '<br>';
 }
 ?>
<p><a href="profile">Редактировать</a></p>
<p>Перейти на <a href="/">Главную страницу</a></p>