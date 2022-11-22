<?php
session_start();

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);;
$password_check = filter_var(trim($_POST['password1']), FILTER_SANITIZE_STRING);;
var_dump($password);
echo '<br>';
var_dump($password_check);

if ($password != $password_check){
    $_SESSION['msgg'] = 'пароли не совпадают';
    header('location: http://localhost/2022/encounterGenerator/pages/registration.php');
    die();
}
if (mb_strlen($login) < 4 || mb_strlen($login) > 90){
    $_SESSION['msgg'] = 'Недопустимая длинна логина';
    header('location: http://localhost/2022/encounterGenerator/pages/registration.php');
    die();
}
elseif (mb_strlen($password) < 5 || mb_strlen($password) > 90){
    $_SESSION['msgg'] = 'Недопустимая длинна пароля (От 9 до 90 символов)';
    header('location: http://localhost/2022/encounterGenerator/pages/registration.php');
    die();
}

require_once ('connect.php');
$query_tag1 = "SELECT * FROM users";
$tag_result1 = mysqli_query($connection, $query_tag1) or die (mysqli_error($connection));
$result = "";
$counter = 0;

while(mysqli_num_rows($tag_result1) > $counter) {
    $result = mysqli_fetch_assoc($tag_result1);
    var_dump($result);
    if ($login == $result['login']) {
        $_SESSION['msgg'] = "Такой логин уже занят";
        header('location: http://localhost/2022/encounterGenerator/pages/registration.php');
        break;
    }
    $counter ++;
}
var_dump($counter);
if ($counter == mysqli_num_rows($tag_result1)){
    $connection->query("INSERT INTO users (login, password) VALUES ('$login', '$password') ");
    $_SESSION['msgg'] = "Вы успешно зарегестрировались!";
    header('location: http://localhost/2022/encounterGenerator/pages/authorize.php');
}



?>