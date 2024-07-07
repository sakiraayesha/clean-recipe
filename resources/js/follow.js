import './x-csrf-token';

$(function() {
    $(document).on('click', '.follow-button', function() {
        let selectedUser = $(this); 
        let isFollowedByCurrentUser = $(selectedUser).data('followed');

        $.post('/follow', {
            '_method': isFollowedByCurrentUser ? 'delete' : 'post',
            'followed_id': $(selectedUser).data('user-id')
        }).done(function(data) {
            isFollowedByCurrentUser = !isFollowedByCurrentUser;
            $(selectedUser).data('followed', isFollowedByCurrentUser);
            $(selectedUser).text(isFollowedByCurrentUser ? 'Following' : 'Follow');

            if ($('.followers-count').length) {
                $('.followers-count').text(data['followers']);
            }
        }).fail(function(jqXHR) {
            if (jqXHR.status === 401) {
                window.location.href = '/login?redirect_url=' + window.location.href;
            }
        });
    });
});