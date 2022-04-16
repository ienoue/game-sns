/**
 * Tagifyの初期設定
 */
import Tagify from '@yaireo/tagify'

const tagifyArr = $('input[name=tags]').map((index, elm) => {
    return new Tagify(elm, {
        whitelist: laravel.tags,
        maxTags: 5,
        delimiters: "　| ",
        pattern: /^[^\s]+$/,
        dropdown: {
            enabled: 2,
            maxItems: 10,
        },
    });
});
