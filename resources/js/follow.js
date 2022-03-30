/**
 * フォロー登録・解除処理
 */
$(function () {
    $('.btn-follow').on("click", function (event) {
        event.preventDefault();
        const $btn = $(this);
        const name = $btn.data('user-name');
        $btn.attr('disabled', true);
        const oldBtnClass = $btn.attr('class');
        $.ajax({
            type: 'post',
            url: `/follow/${name}`,
            dataType: 'json',
        })
            .always(() => {
                $btn.attr('disabled', false);
                $btn.removeClass();
            })
            .done((data) => {
                $btn.addClass(data.visual);
                $btn.children('span').text(data.text);
            })
            .fail((jqXHR) => {
                $btn.addClass(oldBtnClass);
                console.log(jqXHR.status + ': 通信に失敗しました。');
            });
    });
})