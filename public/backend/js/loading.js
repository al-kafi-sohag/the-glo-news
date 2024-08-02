$.fn.loading = function(action) {
    $(this).each(function() {
        var $button = $(this);
        var loadingImg = `<img src="${loadingImgUrl}" alt="Loading" class="loading">`;
        if (action === 'enable') {
            $button.data('original-content', $button.html()).html('');
            $button.append(loadingImg);
            $button.prop('disabled', true);
        } else if (action === 'disable') {
            $button.html($button.data('original-content'));
            $button.prop('disabled', false);
        }
    });
};
