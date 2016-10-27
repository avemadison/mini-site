<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="">
                <?php if (isset($_SESSION['user'])): ?>
                    Hello  <?=$_SESSION['user']?> !
                <?php else : ?>
                    Войдите в систему
                <?php endif ?>
            </a>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="index.php?page=gallery">Галлерея</a></li>
                    <li><a href="index.php?page=video">Видео</a></li>
                    <li><a href="index.php?page=discography">Дискография</a></li>
                    <li><a href="index.php?page=comments">Чат</a></li>
                    <li>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <a href="index.php?page=logout">Выйти</a>
                        <?php else: ?>
                            <a href="index.php?page=login">Войти</a>
                        <?php endif ?>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>

</nav>


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Добро пожаловать</h1>
        <p>На этой платформе собрана полная дискография исполнителей таких жанров как heavy metal, punk, gothic, deathcore, indie rock & post rock. В галлерею помещены
            фотографии исполнителей, которую вы можете дополнять, также присутствует чат для общения пользователей и раздел с клипами исполнителей</p>
    </div>
</div>



