$(document).ready(function() {
    if($('.form-control').hasClass('form-log')) {
        $('#loginModal').modal();
        $('#closeRegisterForm').css('display', 'none');
        $('#btnLogin').addClass('link-login');
        $('#btnRegister').removeClass('link-register');
    }

    if($('.form-control').hasClass('form-reg')) {
        $('#loginModal').modal();
        $('#closeFormLogin').css('display', 'none');
        $('#btnLogin').removeClass('link-login')
        $('#btnRegister').addClass('link-register')
    }

    if($('#message').hasClass('alert-success')) {
        $('#loginModal').modal();
        $('#closeRegisterForm').css('display', 'none');
        $('#btnLogin').addClass('link-login');
        $('#btnRegister').removeClass('link-register');
    }

    if($('#error').hasClass('alert-danger')) {
        $('#loginModal').modal();
        $('#closeRegisterForm').css('display', 'none');
        $('#btnLogin').addClass('link-login');
        $('#btnRegister').removeClass('link-register');
    }
});
