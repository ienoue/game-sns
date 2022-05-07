$(function () {
    // スクロールの値が上端からいくつになればボタンを表示するか
    const showThreshold = 100;
    const $scrollTop = $('#scrollTop');

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > showThreshold) {
            $scrollTop.fadeIn();
        } else {
            $scrollTop.fadeOut();
        }
    });
    
    $scrollTop.on('click', function () {
        $('body, html').animate({ scrollTop: 0 }, 300);
        return false;
    });
});