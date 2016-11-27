<form action="" method="POST">
    <label>Логин:</label><br>
    <input name="login" type="text" value="<?php echo $_POST['login']?>"><br>
    <label>Пароль:</label><br>
    <input name="password" type="password" value="<?php echo $_POST['password']?>"><br><br>
    <button name="submit1" type="submit">Войти</button>
    <p>Перейдите на <a href='main'>Главную страницу</a></p>
</form>