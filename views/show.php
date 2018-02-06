<?php require_once 'partials/header.php' ?>

<!-- Three Images Section -->
<div class="container">
    <h3><?= $post->author ?></h3>
    <p><?= $post->content ?></p>
    <p><?= date('d M H:i', strtotime($post->created_at)) ?></p>
    <a href="#" onclick="window.history.back();">← Go back</a>
</div>
<br>

<!-- First call to action -->
<section class="call-to-action">
    <div class="cta-container">
        <form class="custom__form js-form-comment-store" action="/comment/store" method="post">
            <div>
                <input type="text" name="author" placeholder="Author" required>
            </div>
            <div>
                <textarea name="comment" rows="4" placeholder="Comment" required></textarea>
            </div>
            <div>
                <button class="btn" type="submit">Send</button>
            </div>
            <input type="hidden" name="post_id" value="<?= $post->id ?>">
        </form>
    </div>
</section>

<div class="container comments">
    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <h3><?= $comment->author ?></h3>
            <p><?= $comment->comment ?></p>
            <p><?= date('d M H:i', strtotime($comment->created_at)) ?></p>
            <hr>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once 'partials/footer.php' ?>
