// timer
var count=10;
var counter=setInterval(timer, 1000);

function timer()
{
    count=count-1;
    if (count <= 0)
    {
        clearInterval(counter);

        // do when time is over

        // - block actions
        // - get the answers
        // - count the points
        // - show form
        // - save on json the score

        // $("#exampleModalCenter").show();

        disableActions();
        // getAnswers();
        getNames();

        return;
    }

    //Do code for showing the number of seconds here
    document.getElementById("timer").innerHTML=count + " secs"; // watch for spelling
}

function getAnswers(){
    $(".card #name-character").each(function(){
        console.log($(this).val());
    });
}

function disableActions(){
    $(".card #name-character").prop('disabled', true);
}

$(function() {

});

$(document).on("click", ".open-AddBookDialog", function () {
    var myBookId = $(this).data('id');
    $(".modal-body #bookId").val( myBookId );
});

function getNames() {
    $.ajax({
        url: "https://swapi.co/api/people/?page=1",
    })
        .done(function( data ) {
            console.log(data);
        });
}