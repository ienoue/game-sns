/**
 *  連続Submitを防止する為にボタンを非活性にする
 */
$('#formNewPost, #formGacha, #formNewComment').on('submit', function () {
    const $submit = $(this).find('[type="submit"]');
    $submit.prop("disabled", true);
    setTimeout(() => {
        $submit.prop("disabled", false);
    }, 2000);
});