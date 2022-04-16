/**
 * 投稿内容更新処理
 */
import { Modal } from "bootstrap";

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
                //投稿内容を更新
                //text()だとサニタイズされるが改行されない為に、以下の方法で改行した
                const postText = $('<dummy>').text(data.text).html().replace(/\n/g, '<br>');
                $(`#postText_${data.id}`).empty().html(postText);

                //タグを追加
                $tag.empty();
                if (data.tags?.length) {
                    const $container = $('<div>').addClass(data.containerVisual).appendTo($tag);
                    $.each(data.tags, function (i, tag) {
                        $('<a>').text(tag.value).addClass(data.btnVisual).attr('role', 'button').attr('href', tag.link).appendTo($container);
                    });
                }

                //モーダルを閉じる
                const modal = Modal.getOrCreateInstance(`#modalEdit_${data.id}`);
                modal.hide();
            })
            .fail((jqXHR) => {
                if (jqXHR.responseJSON?.errors) {
                    //バリデーションエラー発生時の処理
                    $.each(jqXHR.responseJSON.errors, (index, val) => {
                        $('<li>').text(val).appendTo($err);
                    });
                } else {
                    const errText = jqXHR.status + ': 通信に失敗しました。';
                    $('<li>').text(errText).appendTo($err);
                }
                $err.parent().removeClass("d-none");
            });
    });
})