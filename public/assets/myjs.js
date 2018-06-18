
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



//function mysql_query(query, args=null){
//    var json=null;
//    
//    $.ajax({
//        type: "POST",
//        async: false,
//        url: "loader.php",
//        data: ( query : query, args : args ),
//        success: function(response){
//            json= JSON.parse(response);
//        }
//    });
//    return json;
//}    