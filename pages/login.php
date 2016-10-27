<?php
$users = array_map('str_getcsv', file('data/users.csv'));
array_shift($users);

function loginFormIsValid ()
{
    return post('username') != ''
    && post('password') != '';
}

//если мы отправили запрос
if(requestIsPost()) {
    //если форма нормально заполнена
    if (loginFormIsValid()) {
        //мы подразумеваем здесь юзера, кот-й отправлялся с формы
        $user = [
            post('username'),
            post('password')
        ];
        //перебираем массив и смотрим чтоб совпали ключи
        foreach ($users as $u) {
            if ($user == $u) {
                $_SESSION['user'] = $user[0];
                setFlash('Welcome!');
                redirect('/');
            }
        }
        setFlash('User not found!');
        redirect('/index.php?page=login');
    }
}
?>



<?=getFlash();?>
<form method="post">
    <div class="container">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
        <br>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" class="form-control" >
        <br>
        <button class="btn btn-info active" type="submit">OK</button>

    </div>
</form>