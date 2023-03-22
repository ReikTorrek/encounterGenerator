<?php
require_once dirname(__DIR__) . '/assets/templates/autoload.php';
require_once __DIR__ . '/connect.php';
session_start();
$userController = new UserController();
$userId = $userController->getUIdByLogin($_SESSION['username']);
$sql = "INSERT INTO roll_plays (name, userId, pic, description) VALUES ('" . $_POST['name'] . "', '" . $userId . "', '" . addPicture() . "', '" . $_POST['description'] . "')";
$connection->query($sql);
header('location: http://localhost/2022/encounterGenerator/');
function addPicture() {
    if (isset($_FILES['pic'])) {
        $image = $_FILES['pic'];
        // Получаем нужные элементы массива "image"
        $fileTmpName = $_FILES['pic']['tmp_name'];
        $errorCode = $_FILES['pic']['error'];
        // Проверим на ошибки
        if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
            // Массив с названиями ошибок
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
                UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
                UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
                UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
                UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
            ];
            // Зададим неизвестную ошибку
            $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
            // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
            $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
            // Выведем название ошибки
            return '';
        }
    }
    $fi = finfo_open(FILEINFO_MIME_TYPE);

// Получим MIME-тип
    $mime = (string) finfo_file($fi, $fileTmpName);

// Проверим ключевое слово image (image/jpeg, image/png и т. д.)
    if (strpos($mime, 'image') === false) {
        echo '<a href="../pages/createGame.php">Назад</a>';
        die('Можно загружать только изображения.');
    }
    $image = getimagesize($fileTmpName);

    $picName = md5_file($fileTmpName);

// Сгенерируем расширение файла на основе типа картинки
    $extension = image_type_to_extension($image[2]);

// Сократим .jpeg до .jpg
    $format = str_replace('jpeg', 'jpg', $extension);

// Переместим картинку с новым именем и расширением в папку /upload
    if (!move_uploaded_file($fileTmpName, dirname(__DIR__) . '/assets/img/games/' . $picName . $format)) {
        echo '<a href="../pages/createGame.php">Назад</a>';
        die('При записи изображения на диск произошла ошибка.');
    }
    return $picName . $format;
}


