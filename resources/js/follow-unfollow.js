$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.follow-button', function() {
        $.post('/follow', {
            'followed_id': $('.follow-button').data('user-id')
        }).done(function() {
            $('.follow-button').html('Following');
            $('.follow-button').addClass('unfollow-button').removeClass('follow-button');

            if ($('.followers-count').length) {
                $('.followers-count').html(parseInt($('.followers-count').html()) + 1);
            }
        });
    });

    $(document).on('click', '.unfollow-button', function() {
        $.post('/unfollow', {
            '_method': 'delete',
            'followed_id': $('.unfollow-button').data('user-id')
        }).done(function() {
            $('.unfollow-button').html('Follow');
            $('.unfollow-button').addClass('follow-button').removeClass('unfollow-button');

            if ($('.followers-count').length) {
                $('.followers-count').html(parseInt($('.followers-count').html()) - 1);
            }
        });
    });
});