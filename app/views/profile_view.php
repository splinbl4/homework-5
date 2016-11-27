<?php
session_start();
?>
<form action="" method="POST" enctype = "multipart/form-data">
    <label>Имя:</label><br>
    <input name="name" type="text" value="<?php echo $_SESSION['name']?>"><br>
    <label>Возраст:</label><br>
    <input name="age" type="number" value="<?php echo $_SESSION['age']?>"><br>
    <label>О себе:</label><br>
    <textarea name="description" cols="40" rows="3"><?php echo $_SESSION['description']?></textarea><br><br>
    <button name="submit" type="submit">Сохранить изменения</button><br><br>
    <label>Загрузить фото:</label><br><br>
    <input name="file" type="file">
    <button name="submit3" type="submit">Загрузить</button><br><br>
    <?php
    foreach ($data as $item) {
        echo $item->filename;
    }
    ?>
    <a href="cabinet">личный кабинет</a><br>
</form>
