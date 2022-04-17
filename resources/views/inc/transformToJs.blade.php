{{-- よく使うタグ一覧をJSON形式に変換してJavascriptに渡す --}}
<script defer>
    window.laravel = {};
    window.laravel.tags = {{ Js::from($tags->pluck('name') ?? []) }};
</script>