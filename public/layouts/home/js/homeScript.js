$('form select').on('change', function(){
    $(this).closest('form').submit();
});
