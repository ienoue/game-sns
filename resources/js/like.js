/**
 * いいね登録・解除処理
 */
$(function () {
    $('.btn-like').on("click", function (event) {
        event.preventDefault();
        const $btn = $(this);
        const id = $btn.data('post-id');
        const $count = $(`#likecount_${id}`);
        const $icon = $btn.children('i');
        const oldIconClass = $icon.attr('class');
        $btn.attr('disabled', true);

        $.ajax({
            type: 'post',
            url: `/like/${id}`,
            dataType: 'json',
        })
            .always(() => {
                $icon.removeClass();
                $btn.attr('disabled', false);
            })
            .done((data) => {
                $icon.addClass(data.visual);
                $count.text(data.count);
            })
            .fail((jqXHR) => {
                $icon.addClass(oldIconClass);
                console.log(jqXHR.status + ': 通信に失敗しました。');
            });
    });
})