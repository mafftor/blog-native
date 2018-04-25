<?php require_once 'partials/header.php' ?>

<!-- Slider Section -->
<section class="slider-main">
    <div id="left-arrow">
        <a href="#" class="unslider-arrow prev">
            <i class="fa fa-chevron-left fa-2x"></i>
        </a>
    </div>
    <div id="right-arrow">
        <a href="#" class="unslider-arrow next">
            <i class="fa fa-chevron-right fa-2x"></i>
        </a>
    </div>
    <div class="slider">
        <ul>
            <?php foreach ($popularPosts as $post): ?>
                <li class="slide" id="slide1">
                    <h2><?= $post->author ?></h2>
                    <p><?= $post->short ?></p>
                    <a class="btn" href="/post/show/<?= $post->id ?>">Go →</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- Three Images Section -->
<section id="three-images">
    <div class="container">
        <article class="cf">
            <?php foreach ($posts as $post): ?>
                <div class="img-circle-div">
                    <h3><?= $post->author ?></h3>
                    <p><?= $post->short ?></p>
                    <p>Comments: <b><?= $post->pc_count ?></b></p>
                    <p><?= date('d M H:i', strtotime($post->created_at)) ?></p>
                    <a href="/post/show/<?= $post->id ?>">Go to →</a>
                </div>
            <?php endforeach; ?>
        </article>
    </div>
</section>

<?php require_once 'partials/footer.php' ?>
