$(document).on("click", "#btn_edit", function(){
    var id = document.getElementById('user_id').value;
    $.ajax({
        url: "/profile/"+id,
        type: 'GET',
        cache: false,
        success: function(data){
            $('#home').html(data);
        },
        error: function (){
            alert(Lang.get('messages.view_bug'));
        }
    });
    return false;
});
