/**
 * フォロー登録・解除処理
 */
$(function () {
    $('.btn-follow').on("click", function (event) {
        event.preventDefault();
        const $btn = $(this);
        const name = $btn.data('user-name');
        const $icon = $btn.children('i');
        $btn.attr('disabled', true);
        const oldBtnClass = $btn.attr('class');
        const oldIconClass = $icon.attr('class');

        $.ajax({
            type: 'post',
            url: `/follow/${name}`,
            dataType: 'json',
        })
            .always(() => {
                $btn.attr('disabled', false);
                $btn.removeClass();
                $icon.removeClass();
            })
            .done((data) => {
                $btn.addClass(data.visual);
                $btn.children('span').text(data.text);
                $icon.addClass(data.icon);
            })
            .fail((jqXHR) => {
                $btn.addClass(oldBtnClass);
                $icon.addClass(oldIconClass);
                console.log(jqXHR);
            });
    });
})