<?php include __DIR__ . '/../header.php'; ?>


<h2>Комментарии</h2>

    <form action="/comments/<?= $comments->getId() ?>/edit" method="post">
        <br>
        <label for="comments"><b></b></label><br>
        <textarea  name="comments" id="comment" rows="7" cols="80"><?= $_POST['comments'] ?? $comments->getText() ?></textarea><br>
        <br>
        <input type="submit" value="Опубликовать">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>