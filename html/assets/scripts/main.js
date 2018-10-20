/* Base
------------------------------------------------------------ */
(function($) {
  'use strict';
  $(document).ready(function() {

    $('#auth_form').on('submit', function(e) {
      e.preventDefault();
      var $that = $(this);
      var formData = new FormData($that.get(0));
      $('#subm').prop('disabled', true);
      $.ajax({
        url: '/admin/log',
        type: 'POST',
        contentType: false,
        processData: false,
        data: formData,
        cache: false,   
        success: function(data) { 
          if(data != '1')
            $('#result').append(data);
          else 
            alert('Error');
        $('#subm').prop('disabled', false);
        }
      });
    });
    $('.res_case').on('click', function(e) {
      e.preventDefault();
      $(this).slideUp("slow");
    });



    $(window).scroll(function() {
      if($(window).width() < 960) $('.navbar').css('left', -$(this).scrollLeft() + 'px');
      else if($(window).width() >= 960) $('.navbar').css('left', '0');
    });

    $('.disabled').on('click', function(e) { e.preventDefault(); });

    $('.tabs ul.tabs-nav li a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

    var inputPassword = document.querySelector('.input-password-js'), buttonShowPassword = document.querySelector('.btn-show-password-js');
    function showPassword() {
      var attrType = inputPassword.getAttribute('type');
      if(attrType === 'password') { inputPassword.setAttribute('type', 'text'); buttonShowPassword.textContent = 'Hide'; }
      else { inputPassword.setAttribute('type', 'password'); buttonShowPassword.textContent = 'Show'; }
    }
    //buttonShowPassword.addEventListener('click', showPassword);

    $('.widget .list-group a[data-menu]').on('click', function(e) {
      e.preventDefault();
      var dataMenu = $(this).data('menu');
      $('.widget .list-group span.' + dataMenu).slideToggle('fast', function() {
        if($(this).is(':visible')) {
          $(this).css('display', 'block');
        }
      });
    });

  });
}(jQuery));

function endsession() {
  var date = new Date(0);
  document.cookie = "userId=; path=/; expires=" + date.toUTCString();
  document.cookie = "access_hash=; path=/; expires=" + date.toUTCString();
  location.reload();
}
