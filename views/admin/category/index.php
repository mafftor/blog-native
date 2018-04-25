<?php require_once __DIR__ . '../../partials/header.php' ?>

<div class="container">
    <h1>Categories</h1>
    <div class="row">
        <div class="col-xs-12">
            <form class="form" action="/category/store" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Name" required>
                </div>
                <div>
                    <button class="btn btn-success" type="submit">Create the Category →</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php foreach ($categories as $category): ?>
            <div class="col-sm-3">
                <h3><?= $category->name ?></h3>
                <a class="btn btn-default" href="/category/show/<?= $category->id ?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-success" href="/category/edit/<?= $category->id ?>"><i class="fa fa-pencil"></i></a>
                <a onclick="if(!confirm('Are you sure?')) return false;" class="btn btn-danger" href="/category/delete/<?= $category->id ?>"><i class="fa fa-times"></i></a>
            </div>
        <?php endforeach; ?>
    </div>
</div><!-- /.container -->

<?php require_once __DIR__ . '../../partials/footer.php' ?>
