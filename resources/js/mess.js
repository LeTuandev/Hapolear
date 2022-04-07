$(document).ready(function () {
  $('.messenger-icon').click(function () {
    $('.messenger').addClass('active')
  });

  $('.messenger-content-close').click(function () {
    $('.messenger').removeClass('active')
  });
})
