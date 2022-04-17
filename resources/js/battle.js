/**
 *  Popoverプラグインのオプションを変更
 */
import { Popover } from "bootstrap";

Popover.Default.customClass = 'text-center fw-bold';
Popover.Default.trigger = 'manual';
Popover.Default.html = true;

/**
 * 対戦結果をポップオーバーで表示
 */
$(function () {
    $('.btn-like').on("successAjax", function (event, hasWon) {
        if (typeof hasWon === 'boolean') {
            var popover = Popover.getOrCreateInstance(this, {
                content: hasWon ?
                    '<i class="fa-solid fa-crown fa-fw pe-2"></i>勝利しました<br>明日はレア以上確定!</span>' :
                    '<i class="fa-solid fa-skull-crossbones fa-fw pe-2"></i>敗北しました',
            });
            popover.show();
            setTimeout(() => {
                popover.hide();
            }, 3000);
        }
    });
})
