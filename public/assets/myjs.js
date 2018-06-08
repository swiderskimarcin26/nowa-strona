function do_this(){

        var checkboxes = document.getElementsByName('approve[]');
        var button = document.getElementById('allcounty');

        if(button.value == 'select'){
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'deselect'
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            button.value = 'select';
        }
    }
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