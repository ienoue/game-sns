<script defer>
    window.laravel = {};
    window.laravel.tags = {{ Js::from($tags->pluck('name') ?? []) }};
</script>