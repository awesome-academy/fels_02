$('form select').on('change', function(){
    $(this).closest('form').submit();
});

function ajaxToggleWordRemember(wordid){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $.ajax({
        url: "/wordRemember",
        type: 'POST',
        cache: false,
        data: {wordid:wordid},
        success: function(data){
            $('#word'+wordid).replaceWith(data);
        },
        error: function (){
            alert(Lang.get('messages.view_bug'));
        }
    });
    
}
$('.saveWord').on('click', function (e) {
    if (confirm($(this).data('confirm'))) {
        top.location.href = '/login';
    }
    else {
        return false;
    }
});
