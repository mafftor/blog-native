<?php require_once __DIR__ . '../../partials/header.php' ?>

<div class="container">
    <h1>Edit post - <?= $post->author ?></h1>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <form class="form" action="/post/update" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="author" placeholder="Author" value="<?= $post->author ?>" required>
                </div>
                <div class="form-group">
                    <select name="category_id" class="form-control" required>
                        <option value="">- Category -</option>
                        <?php foreach ($categories as $category): ?>
                            <option <?php if($category->id == $post->category_id): ?>selected<?php endif; ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="4" placeholder="Content" required><?= $post->content ?></textarea>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
                <input type="hidden" name="id" value="<?= $post->id ?>">
            </form>
        </div>
    </div>
</div><!-- /.container -->

<?php require_once __DIR__ . '../../partials/footer.php' ?>
