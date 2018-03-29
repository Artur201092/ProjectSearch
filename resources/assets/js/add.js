$('body').on('click', '#loginForm', function(){
var loginForm = $("#Login");
var formData = loginForm.serialize();
$( '#email-error' ).html( "" );
$( '#password-error' ).html( "" );

$.ajax({
    headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')},
    url:'/user',
    type:'POST',
    data:formData,
    success:function(data) {
      console.log(data);
      if(data.errors) {
          if(data.errors.name){
              $( '#name-error' ).html( data.errors.name[0] );
          }
          }

      }
        if(data.success) {
            $('#success-msg').removeClass('hide');
            setInterval(function(){
                $('#SignIn').modal('hide');
                $('#success-msg').addClass('hide');
            }, 1500);
        }
    },
});
});
