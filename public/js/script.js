$('#form1').submit(function(e){
    e.preventDefault();

    var i_name = $('#name').val();
    var i_comment = $('#comment').val();

    $.ajax({
       url: 'http://localhost/php_ajax/public/inserir.php',
       method: 'POST',
       data: {name: i_name, comment: i_comment},
       dataType: 'json'
    }).done(function(result){
        $('#name').val('');
        $('#comment').val('');
        console.log(result);
        getComments();
    });
});

function getComments() {
    $.ajax({
        url: 'http://localhost/php_ajax/public/selecionar.php',
        method: 'GET',
        dataType: 'json'
    }).done(function(result){

        for(const i in result) {
            $('.box_comment').prepend(`<div class="b_comm"><h4>${result[i].name}</h4><p>${result[i].comment}</p></div>`);
        }
    });
}

getComments();