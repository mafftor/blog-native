<?php require_once __DIR__ . '../../partials/header.php' ?>

<div class="container">
    <h1>News</h1>
    <?php if ($_SESSION['user']['is_admin']): ?>
        <div class="row">
            <div class="col-xs-12">
                <form class="form" action="/post/store" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="author" placeholder="Author" required>
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control" required>
                            <option value="">- Category -</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="content" rows="4" placeholder="Content"
                                  required></textarea>
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Create the Post →</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
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
                <?php if ($_SESSION['user']['is_admin']): ?>
                    <a onclick="if(!confirm('Are you sure?')) return false;" class="btn btn-danger"
                       href="/post/delete/<?= $post->id ?>"><i class="fa fa-times"></i></a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div><!-- /.container -->

<?php require_once __DIR__ . '../../partials/footer.php' ?>
