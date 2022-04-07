/**
 * 相棒モンスター登録処理
 */
$(function () {
    $('.btn-partner').on("click", function (event) {
        event.preventDefault();
        const id = $(this).data('monster-id');
        const $btn = $('.btn-partner');
        const $partnerName = $('#partner-name');
        $btn.attr('disabled', true);

        $.ajax({
            type: 'post',
            url: `/monsters/${id}`,
            dataType: 'json',
            data: { "_method": "PATCH" }
        })
            .always(() => {
                $btn.attr('disabled', false);
            })
            .done((data) => {
                $btn.removeClass();
                $partnerName.text(data.name);
                $btn.each(function () {
                    $elm = $(this);
                    if(data.id === $elm.data('monster-id')) {
                        $elm.addClass(data.active.btnVisual);
                        $elm.text(data.active.btnText);
                        $elm.attr('disabled', true);
                    } else {
                        $elm.addClass(data.inactive.btnVisual);
                        $elm.text(data.inactive.btnText);
                        $elm.attr('disabled', false);
                    }
                });
            })
            .fail((jqXHR) => {
                console.log(jqXHR.status + ': 通信に失敗しました。');
            });
    });
})