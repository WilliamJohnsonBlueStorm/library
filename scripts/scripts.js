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
