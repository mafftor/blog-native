$(function () {
    $('#form-login').submit(function (e) {
        e.preventDefault();

        var $this = $(this);

        $.ajax({
            url: $this.attr('action'),
            method: $this.attr('method'),
            data: $this.serialize(),
            success: function (response) {
                window.location.reload();
            },
            error: function (error) {
                alert(error.responseJSON.error);
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

                var $counter = $('.js-comments-counter').find('span');
                $counter.text(parseInt($counter.text()) + 1);
            }
        });
    });
});
