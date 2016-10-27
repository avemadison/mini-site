<?php
if(is_dir('gallery')==false){
    mkdir('gallery');
}
if($_POST){
    ////загрузка нескольких  файлов
    foreach ($_FILES["photo"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["photo"]["tmp_name"][$key];
            $name = basename($_FILES["photo"]["name"][$key]);
            move_uploaded_file($tmp_name,'gallery/'.$name);
        }
    }
}
$filename = 'gallery/';
$files=scandir($filename);?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
</head>
<body>
<h1>Загрузить файлы в галлерею</h1>
<form enctype="multipart/form-data" method="post">

    <input type="file" name="photo[]" multiple accept="image/*,image/jpeg"> <br>
    <input type="submit" name="submit" value="Отправить">

    <hr>
</form>
<table>
    <?php
    foreach ($files as $value){
        if($value=='.'||$value=='..'){
            continue;
        }?>

        <tr>
            <img src="<?='gallery/'.$value;?>" width="350">
        </tr>

    <?php  }
    ?>
    <style>
        body { background: url(../inc/image/picture6.jpg); }
    </style>

</table>
</body>
</html>