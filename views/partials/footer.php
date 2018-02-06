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
<script type="text/javascript" src="/js/jquery.event.move.js"></script>
<script type="text/javascript" src="/js/jquery.event.swipe.js"></script>
<script type="text/javascript" src="/js/unslider.js"></script>

<script type="text/javascript" src="/js/common.js"></script>

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
