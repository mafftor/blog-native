$(function () {
    $('.js-form-post-store').submit(function (e) {
        e.preventDefault();

        var $this = $(this);

        $.ajax({
            url: $this.attr('action'),
            method: $this.attr('method'),
            data: $this.serialize(),
            success: function (response) {
                console.log(response);
                $('#three-images').find('article').prepend(
                    '<div class="img-circle-div">' +
                    '<h3>' + response.author + '</h3>' +
                    '<p>' + response.content + '</p>' +
                    '<p>' + response.created_at + '</p>' +
                    '<a href="/post/show/' + response.id + '">Go to →</a>' +
                    '</div>');
                $this[0].reset();
            }
        });
    });

    $('.js-form-comment-store').submit(function (e) {
        e.preventDefault();

        var $this = $(this);

        $.ajax({
            url: $this.attr('action'),
            method: $this.attr('method'),
            data: $this.serialize(),
            success: function (response) {
                console.log(response);
                $('.comments').prepend(
                    '<div class="comment">' +
                    '<h3>' + response.author + '</h3>' +
                    '<p>' + response.comment + '</p>' +
                    '<p>' + response.created_at + '</p>' +
                    '<hr>' +
                    '</div>');
                $this[0].reset();
            }
        });
    });
});
