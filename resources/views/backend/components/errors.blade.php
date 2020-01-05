@error('email')
<script rel="script" type="application/javascript">
    Snackbar.show({
        text: '{{ $message }}',
        pos: 'bottom-center',
        actionTextColor: '#DB4437',
    });
</script>
@enderror
@if($message = session()->get('success'))
    <script rel="script" type="application/javascript">
        Snackbar.show({
            text: '{{ $message }}',
            pos: 'bottom-center',
            actionTextColor: '#0F9D58',
        });
    </script>
@endif
