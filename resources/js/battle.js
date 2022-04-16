/**
 *  Popoverプラグインのオプションを変更
 */
import { Popover } from "bootstrap";

Popover.Default.customClass = 'text-center fw-bold fs-5';
Popover.Default.trigger = 'manual';
Popover.Default.html = true;

/**
 * 対戦結果をポップオーバーで表示
 */
$(function () {
    $('.btn-like').on("successAjax", function (event, isWin) {
        if (typeof isWin === 'boolean') {
            var popover = Popover.getOrCreateInstance(this, {
                content: isWin ?
                    '<i class="fa-solid fa-crown fa-fw pe-2"></i>勝利しました' :
                    '<i class="fa-solid fa-skull-crossbones fa-fw pe-2"></i>敗北しました',
            });
            popover.show();
            setTimeout(() => {
                popover.hide();
            }, 3000);
        }
    });
})
