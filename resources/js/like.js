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
                $icon.removeClass('text-red fa-solid fa-regular');
                $btn.attr('disabled', false);
            })
            .done((data) => {
                if (data.isLiked === 'true') {
                    $icon.addClass('text-red fa-solid');
                } else {
                    $icon.addClass('fa-regular');
                }
                const cnt = data.count;
                $count.text(`${cnt}`);
            })
            .fail((jqXHR) => {
                $icon.addClass(oldIconClass);
                console.log(jqXHR.status + ': 通信に失敗しました。');
            });
    });
})