<form method="POST">
    <label>Ваш логин:</label><br>
    <input name="login" type="text" value="<?php echo $_POST['login']?>"><br>
    <label>Ваш пароль:</label><br>
    <input name="password" type="password" value="<?php echo $_POST['password']?>"><br>
    <label>Введите Ваш пароль еще раз:</label><br>
    <input name="password2" type="password" value="<?php echo $_POST['password2']?>"><br><br>
    <button name="submit" type="submit">Зарегестрироваться</button>
</form>
<p>Перейдите на <a href='main'>Главную страницу</a></p>

