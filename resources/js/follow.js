/**
 * フォロー登録・解除処理
 */
$(function () {
    $('.btn-follow').on("click", function (event) {
        event.preventDefault();
        const $btn = $(this);
        const name = $btn.data('user-name');
        $btn.attr('disabled', true);
        $.ajax({
            type: 'post',
            url: `/follow/${name}`,
            dataType: 'json',
        })
            .always(() => {
                $btn.attr('disabled', false);
            })
            .done((data) => {
                $btn.removeClass();
                $btn.addClass(data.visual);
                $btn.children('span').text(data.text);
            })
            .fail((jqXHR) => {
                console.log(jqXHR.status + ': 通信に失敗しました。');
            });
    });
})