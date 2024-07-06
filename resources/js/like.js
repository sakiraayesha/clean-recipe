import './x-csrf-token';

$(function() {
    $(document).on('click', '.like-icon', function(e) {
        e.preventDefault();
        e.stopPropagation();

        let selectedRecipe = $(this); 
        let isLikedByUser = $(selectedRecipe).data('liked');

        $.post('/like', {
            '_method': isLikedByUser ? 'delete' : 'post',
            'likeable_type': $(selectedRecipe).parent().parent().data('likeable-type'),
            'likeable_id': $(selectedRecipe).parent().parent().data('likeable-id'),
        }).done(function(data) {
            isLikedByUser = !isLikedByUser;
            $(selectedRecipe).data('liked', isLikedByUser);
            $(selectedRecipe).attr('src', getImageUrl(isLikedByUser ? 'liked' : 'like'));
            $(selectedRecipe).next().text(data['likes'] || '');
        }).fail(function(jqXHR) {
            if (jqXHR.status === 401) {
                window.location.href = '/login?redirect_url=' + window.location.href;
            }
        });
    });
});