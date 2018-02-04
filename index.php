<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS, Normalize First, minify for production -->
    <link rel="stylesheet" type='text/css' href="css/master.css"/>

    <!-- Import web fonts using the link tag instead of CSS @import -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- Icons from http://fontawesome.io/ -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
</head>
<body>

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chrome/‎">install Google Chrome</a> to experience this site.</p>
<![endif]-->

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
            <li class="slide" id="slide1">
                <h2>This is a responsive slider.</h2>
                <p>It comes from <a href="https://github.com/idiot/unslider" target="_blank">Unslider</a>, where you'll
                    also find issue reports (their website is out of date).</p>
                <a class="btn" href="#">Go</a>
            </li>
            <li class="slide" id="slide2">
                <h2>It also adjusts for height...</h2>
                <p>...and has keyboard support.</p>
                <a class="btn" href="#">Go</a>
            </li>
        </ul>
    </div>
</section>

<!-- Three Images Section -->
<section id="three-images">
    <div class="container">
        <header class="body-header">
            <h2>You're probably feeling really inspired.</h2>
            <p>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate,
                nunc.</p>
        </header>
        <article class="cf">
            <div class="img-circle-div">
                <img src="images/circle1.jpg"/>
                <h3>Morbi in sem quis dui</h3>
                <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
            </div>
            <div class="img-circle-div">
                <img src="images/circle2.jpg"/>
                <h3>Nam nulla quam, gravida non</h3>
                <p>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices tem.</p>
            </div>
            <div class="img-circle-div">
                <img src="images/circle3.jpg"/>
                <h3>Suspendisse commodo</h3>
                <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit.</p>
            </div>
        </article>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <div id="footer-text" class="small">
            <p>&copy; <a href="http://mafftor.com" target="_blank">Mafftor</a>
        </div>
    </div>
</footer>

<!-- Reference jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

<!-- Reference Javascript, minify for production -->
<script type="text/javascript" src="js/jquery.event.move.js"></script>
<script type="text/javascript" src="js/jquery.event.swipe.js"></script>
<script type="text/javascript" src="js/unslider.js"></script>

<!-- Unslider script -->
<script>
    $(document).ready(function () {
        var unslider = $('.slider').unslider();
        $('.unslider-arrow').click(function (event) {
            event.preventDefault();
            if ($(this).hasClass('next')) {
                unslider.data('unslider')['next']();
            } else {
                unslider.data('unslider')['prev']();
            }
            ;
        });
        var unslider = $('.slider').unslider();

        unslider.on('movestart', function (e) {
            if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
                e.preventDefault();
            }
        });
    });
</script>
</body>
</html>
