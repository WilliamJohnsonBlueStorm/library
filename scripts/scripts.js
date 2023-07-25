$("#registerform").submit(function() {
    var txt1 = $('#username').val();
    var txt2 = $('#confirmUsername').val();

    if (txt1 === txt2)
    {
        return true;
    }
    else
    {
        $("#confirmUsername").css({"background-color": "red"});
        $("label[for='confirmUsername']").text("Confirm Username. Username does not match!");

            return false;
        }
});

// $(".book-listing").click(function() {
//     if (confirm('Are you sure you want rent this book?')) {
//         // Save it!
//         console.log('Thing was saved to the database.');
//     } else {
//         // Do nothing!
//         console.log('Thing was not saved to the database.');
//     }
// });
