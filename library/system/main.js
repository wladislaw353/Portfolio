$( document ).ready(function() {

  $('#messengers').submit(function() {
    var msg = $(this).serialize();
    $('#copy').slideUp();
    $.ajax({
      type: 'POST',
      url: '/messengers.php',
      data: msg,
      success: function(data) {
        $('#box').html(data);
        $('#box').slideDown();
        $('html, body').animate({scrollTop: $('#box').offset().top}, 600);
      },
      error:  function(xhr, str){
        alert('Error')
      }
    });
  });
  $('#sender').submit(function() {
    var msg = $(this).serialize();
    $('#copy').slideDown();
    $.ajax({
      type: 'POST',
      url: '/sender.php',
      data: msg,
      success: function(data) {
        $('#box').html(data);
        $('#box').slideDown();
        $('html, body').animate({scrollTop: $('#box').offset().top}, 600);
      },
      error:  function(xhr, str){
        alert('Error')
      }
    });
  });
  $('#bitrix24').submit(function() {
    var msg = $(this).serialize();
    $('#copy').slideUp();
    $.ajax({
      type: 'POST',
      url: '/bitrix24.php',
      data: msg,
      success: function(data) {
        $('#box').html(data);
        $('#box').slideDown();
        $('html, body').animate({scrollTop: $('#box').offset().top}, 600);
      },
      error:  function(xhr, str){
        alert('Error')
      }
    });
  });
  $('#lpcrm').submit(function() {
    var msg = $(this).serialize();
    $('#copy').slideUp();
    $.ajax({
      type: 'POST',
      url: '/lpcrm.php',
      data: msg,
      success: function(data) {
        $('#box').html(data);
        $('#box').slideDown();
        $('html, body').animate({scrollTop: $('#box').offset().top}, 600);
      },
      error:  function(xhr, str){
        alert('Error')
      }
    });
  });

  function CopyToClipboard(containerid) {
    if (document.selection) { 
      var range = document.body.createTextRange();
      range.moveToElementText(document.getElementById(containerid));
      range.select().createTextRange();
      document.execCommand("Copy"); 
      
    } else if (window.getSelection) {
      var range = document.createRange();
      range.selectNode(document.getElementById(containerid));
      window.getSelection().addRange(range);
    }
  }


  $('#copy').on('click', ()=> {
    CopyToClipboard('box');
  });


  $('.slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    autoplay: true,
    autoplaySpeed: 2000
  });
  
});