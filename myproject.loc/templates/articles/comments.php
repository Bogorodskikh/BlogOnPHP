<?php include __DIR__ . '/../header.php'; ?>

<h1><?= $article->getName() ?></h1>
<p><?= $article ->getText() ?></p>
<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
<hr>
<h2>Комментарии</h2>
<?php foreach ($comments as $comment): ?>
    <p><?= $comment ->getText() ?></p>
    <br>
    <?php if ($user===$article->getAuthor() || $user->isAdmin()): ?>
    <a href = "http://myproject.loc/comments/<?=$comment->getId()?>/edit" > редактировать  </a>
    <a href = "http://myproject.loc/comments/<?=$comment->getId()?>/delete" > | удалить  </a>
    <?php endif; ?>
    <p>Опубликованно пользователем: <?= $user->getNickname() ?></p>
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>