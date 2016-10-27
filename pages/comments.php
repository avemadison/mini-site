<?php

if (!isset($_SESSION['security_number'])) {
    $_SESSION['security_number'] = rand(1000, 9999);
}
// if form submitted
if (requestIsPost()) {
    if (formIsValid()) {

        $comment = $_POST;
        $comment['datetime'] = date('Y-m-d H:i:s');
        //$comment = serialize($comment);

        save($comment, 'data/comments.txt');

        setFlash('Comment added');
        redirect('/index.php?page=comments');
    }
        setFlash('Fill the fields, please!');
    }
if (!file_exists('data/comments.txt')) {
    $file = fopen('data/comments.txt', 'w');
    fclose($file);
}
$commentsRaw = file('data/comments.txt');
$comments = [];
foreach ($commentsRaw as $comment) {
    $comments[] = unserialize($comment);
}
$username = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>



    <b><?=getFlash();?></b>
    <form method='post'>
        <div class="container">
            <label for='username'></label>
            <input class='form-control' placeholder="Имя" type='text' value='<?=post('username', $username)?>' name='username' id='username'>


            <label for='email'></label>
            <input class='form-control' placeholder="Email" type='email' value='<?=post('email')?>' id='email' name='email'>


            <label for='message'></label>
            <textarea class='form-control' placeholder="Сообщение" name='message' id='message'><?=post('message')?></textarea>
            <br>
            <img src="../captcha.php">

            <input type="text" name="captcha" class='form-control'>
            <br><br>

            <button class='btn btn-primary'>Отправить</button>
        </div>
    </form>

    <hr>

<?php foreach ($comments as $comment) : ?>
    <b><?=$comment['username']?></b> <?=$comment['datetime']?> <br>
    <?=$comment['message']?>
    <br><br>
<?php endforeach;?>