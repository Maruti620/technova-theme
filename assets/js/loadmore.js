jQuery(function ($) {
    let page = 1;
    $('#loadmore').on('click', function () {
        $.post(technova_ajax.ajaxurl, {
            action: 'loadmore',
            page: page,
            nonce: technova_ajax.nonce
        }, function (data) {
            $('#post-container').append(data);
            page++;
            if (page >= technova_ajax.max_pages) {
                $('#loadmore').prop('disabled', true).addClass('opacity-60 cursor-not-allowed');
            }
        });
    });
});
