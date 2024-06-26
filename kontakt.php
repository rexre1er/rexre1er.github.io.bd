<style>

input[type="text"],
select {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 8px;
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #154457;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #154457;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  margin: 0 10px;
  font-size: 15px;
  background-color: #356274;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
}

label {
  display: inline-block;
  margin-bottom: 5px;
}
</style>
<div >
                <h2>Оставить заявку</h2>
                <div class="contact-info" style="display: flex; justify-content: space-between; margin-bottom: 40px;">
                    <div class="address" style="flex-basis: 48%;">
                        <h3>Адрес:</h3>
                        <p>426008, Удмуртская Республика, г. Ижевск, ул. Ленина, 1 </p>
                    </div>
                    <div class="phone-email" style="flex-basis: 48%;">
                        <h3>Телефон:</h3>
                        <p>+7 (3412) 222 860</p>
                        <h3>Email:</h3>
                        <p> info@rcoko18.udmr.ru</p>
                    </div>
                </div>
             <h3>Форма обратной связи</h3>
                    <form action="kontakt.php" method="post">
                            <label for="FIO">Ваше имя:</label><br>
                            <input type="text"  name="FIO" required><br>
                            <label for="mail">Ваш Email:</label><br>
                            <input type="text"  name="mail" required><br>
                            <label for="messeg">Ваше сообщение:</label><br>
                            <textarea  name="messeg" rows="4" cols="50" required></textarea><br><br>
                            <input type="submit" value="Отправить">
                            <a href="RCOKO_and_Bd.html"type="submit" class="button">Вернуться</a>
                    </form>
            </div>
                    <?
                    $db_host='127.0.0.1';
                    $db_user='root';
                    $db_password='';
                    $db_name='Практика';

                    $mysqli=new mysqli($db_host, $db_user, $db_password, $db_name);
                    $mysqli->query("SET NAMES 'utf8'");

                    if ($mysqli->connect_errno) {
                        echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
                    }
                    else{
                        echo "";
                    }
                    $FIO = $_POST['FIO'];
                    $mail = $_POST['mail'];
                    $messeg = $_POST['messeg'];

                    $addUser = $mysqli->query("INSERT INTO kontakt (FIO, mail, messeg) VALUES ('$FIO', '$mail', '$messeg')");
                         // Проверка успешного выполнения запроса
                      // Проверка успешного выполнения запроса
                      if ($addUser) {
                        echo 'Пользователь успешно добавлен.';
                    } else {
                        echo 'Ошибка при добавлении пользователя: ' . $mysqli->error; 
                    }
                    $mysqli->close();

                    ?>