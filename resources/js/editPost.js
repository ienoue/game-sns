/**
 * 投稿内容更新処理
 */
$(function () {
    $('.btn-edit').on("click", function (event) {
        event.preventDefault();
        const $btn = $(this);
        const id = $btn.data('post-id');
        const $form = $(`#formEdit_${id}`);
        const $err = $(`#formErr_${id}`);
        const $tag = $(`#postTag_${id}`);
        $btn.attr('disabled', true);

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            dataType: 'json',
            data: $form.serialize(), //Formの内容をシリアライズした結果を渡す
        })
            .always(() => {
                $err.parent().addClass("d-none");
                $err.empty();
                $btn.attr('disabled', false);
            })
            .done((data) => {
                //text()だとサニタイズされるが改行されない為に、以下の方法で改行した
                //投稿内容を更新
                postText = $('<dummy>').text(data.text).html().replace(/\n/g, '<br>');
                $(`#postText_${data.id}`).empty().html(postText);
                
                //タグを追加
                $tag.empty();
                if (data.tags?.length) {
                    $container = $('<div>').addClass('mt-3').appendTo($tag);
                    $.each(data.tags, function (i, tag) {
                        $('<a>').text(tag.value).addClass(data.visual).attr('role', 'button').attr('href', tag.link).appendTo($container);
                    });
                }

                //モーダルを閉じる
                const elm = document.getElementById(`modalEdit_${data.id}`);
                const modal = Modal.getOrCreateInstance(elm);
                modal.hide();
            })
            .fail((jqXHR) => {
                if (jqXHR.responseJSON?.errors) {
                    //バリデーションエラー発生時の処理
                    $.each(jqXHR.responseJSON.errors, (index, val) => {
                        test = $('<li>').text(val).appendTo($err);
                    });
                } else {
                    const errText = jqXHR.status + ': 通信に失敗しました。';
                    test = $('<li>').text(errText).appendTo($err);
                }
                $err.parent().removeClass("d-none");
            });
    });
})