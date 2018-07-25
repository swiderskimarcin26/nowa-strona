
$('#send').click(function() {
    var data=$('#emailForm :input').serializeArray();
    $.ajax({
        url: $('#emailForm').attr('action'),
        type: 'POST',
        data: data,
        success: function(){
            alert('dodano adres email');
        },
        error: function(response){
            alert('błąd podczas dodawania adresu email');
        }
    });

    $('#emailForm').submit( function(){ return false;})

});
