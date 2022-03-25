$(function () {
    $('.btn-like').on("click", function (event) {
        event.preventDefault();
        const $btn = $(this);
        const id = $btn.data('post-id');
        const $count = $(`#likecount_${id}`);
        const $icon = $btn.children('i').removeClass('text-red');
        $btn.attr('disabled', true);

        $.ajax({
            type: 'post',
            url: `/like/${id}`,
            dataType: 'json',
        })
            .always(() => {
                $icon.removeClass('text-red');
                $btn.attr('disabled', false);
            })
            .done((data) => {
                if (data.isLiked === 'true') {
                    $icon.addClass('text-red');
                }
                const cnt = data.count;
                $count.text(`${cnt} いいね`);
            })
            .fail((jqXHR) => {
                console.log(jqXHR.status + ': 通信に失敗しました。');
            });
    });
})