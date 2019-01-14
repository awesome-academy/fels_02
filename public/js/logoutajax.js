$(document).on('click', '#logout', function () {
    event.preventDefault();
    $.ajax
    ({
        type: 'GET',
        url: '/logout',
        cache: false,
        success: function()
        {
            window.location.href = '/logout';
        },
        error: function (){
            alert('Lỗi đã xảy ra');
        }
    });
    return false;
});
