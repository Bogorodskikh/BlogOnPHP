<?php include __DIR__ . '/../header.php'; ?>

<h1><?= $article->getName() ?></h1>
<p><?= $article->getParsedText() ?></p>

<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
<hr>

<?php if ($user!== null && $user->isAdmin()): ?>
<a href = "http://myproject.loc/articles/<?=$article->getId()?>/edit" > редактировать статью </a>
<br>

<?php endif; ?>
<?php if ($user!==null):?>
<form action="/articles/<?= $article->getId() ?>/comments" method="post">
        
        <br>
        <label for="comments"><b>Коментарии</b></label><br>
        <textarea required placeholder="Что думаете?" name="comments" id="comment" rows="7" cols="80"></textarea><br>
        <br>
        <input type="submit" value="Опубликовать">
    </form>
    <?php else:?> <a href="http://myproject.loc/users/login" ><p> Для добавления комментариев нужно войти на сайт</p></a>
<?php endif; ?>

<?php include __DIR__ . '/../footer.php'; ?>