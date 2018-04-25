<?php require_once __DIR__ . '../../partials/header.php' ?>

<div class="container">
    <h1>News by Category - <?= $category->name ?></h1>
    <hr>
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-sm-3">
                <h3><?= $post->author ?></h3>
                <p><?= $post->short ?></p>
                <p>Comments: <b><?= $post->pc_count ?></b></p>
                <p><?= date('d M H:i', strtotime($post->created_at)) ?></p>
                <a class="btn btn-default" href="/post/show/<?= $post->id ?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-success" href="/post/edit/<?= $post->id ?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger" href="/post/delete/<?= $post->id ?>"><i class="fa fa-times"></i></a>
            </div>
        <?php endforeach; ?>
    </div>
</div><!-- /.container -->

<?php require_once __DIR__ . '../../partials/footer.php' ?>
