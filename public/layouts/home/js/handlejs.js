$('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
function play_single_sound($id) {
    document.getElementById('audiotag'+$id).play();
};
addEventListener("load", function () {
    setTimeout(hideURLbar, 0);
}, false);

function hideURLbar() {
    window.scrollTo(0, 1);
};

$(document).ready(function () {
  $.ajax({
    type: 'GET',
    url: 'http://quotes.rest/qod.json?category=management',
    data: {
      get_param: 'value'
    },
    success: function (data) {
        $('#quote1').replaceWith('<h3 id="quote1">' + data.contents.quotes[0].quote + '</h3>')
        $('#author1').replaceWith('<p id="author1">' + data.contents.quotes[0].author + '</p>')
    }
  });
  $.ajax({
    type: 'GET',
    url: 'http://quotes.rest/qod.json?category=life',
    data: {
      get_param: 'value'
    },
    success: function (data) {
        $('#quote2').replaceWith('<h3 id="quote2">' + data.contents.quotes[0].quote + '</h3>')
        $('#author2').replaceWith('<p id="author2">' + data.contents.quotes[0].author + '</p>')
    }
  });
  $.ajax({
    type: 'GET',
    url: 'http://quotes.rest/qod.json?category=funny',
    data: {
      get_param: 'value'
    },
    success: function (data) {
        $('#quote3').replaceWith('<h3 id="quote3">' + data.contents.quotes[0].quote + '</h3>')
        $('#author3').replaceWith('<p id="author3">' + data.contents.quotes[0].author + '</p>')
    }
  });
});
