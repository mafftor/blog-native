<?php require_once __DIR__ . '../../partials/header.php' ?>

<div class="container">
    <h1>Edit category - <?= $category->name ?></h1>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <form class="form" action="/category/update" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Name" value="<?= $category->name ?>" required>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
                <input type="hidden" name="id" value="<?= $category->id ?>">
            </form>
        </div>
    </div>
</div><!-- /.container -->

<?php require_once __DIR__ . '../../partials/footer.php' ?>
