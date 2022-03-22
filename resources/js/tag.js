$(function () {
    const tagifyArr = $('input[name=tags]').map((index, elm) => {
        return new Tagify(elm, {
            whitelist: laravel.tags,
            maxTags: 5,
            // delimiters: "　| ",
            // pattern: /^[^\s\/]+$/,
            dropdown: {
                enabled: 0,
                maxItems: 30,
                closeOnSelect: false,
            },
        });
    });
})