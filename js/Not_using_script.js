// whatever kind of mobile test you wanna do.
if (screen.width < 500) {

    $("body").addClass("nohover");
    $("td, th")
        .attr("tabindex", "1")
        .on("touchstart", function() {
            $(this).focus();
        });

}

//Get all of the tds:
var tds = $("td");
//Loop through all tds:
for (var i = 0; i < tds.length; i++) {
    //Get the previous state of the td:
    var prevState = localStorage.getItem("state" + i);
    console.log(prevState);
    //If prevState is null, set it to "first":
    if (prevState === null) {
        localStorage.setItem("state" + i, "first");
    }
    //Otherwise, restore prevState:
    else {
        //Get the td:
        var cell = $(tds.get(i));
        //Depending on prevState:
        switch (prevState) {
            case "first":
                //Do nothing if it's in the first state because that's the default.
                break;
            case "second":
                //Add the class "red" if it's in the second state:
                cell.addClass("red");
                break;
            case "third":
                //Add the class "yellow" if it's in the third state:
                cell.addClass("yellow");
                break;
            default:
                //If it's something else, set it to "first":
                localStorage.setItem("state" + i, "first");
                prevState = "first";
                break;
        }
        //Set cell's data-state to prevState:
        cell.data("state", prevState);
    }
}

tds.click(function() {
    var cell = $(this),
        state = cell.data('state') || 'first';

    switch (state) {
        case 'first':
            cell.addClass('red');
            cell.data('state', 'second');
            break;
        case 'second':
            cell.addClass('yellow');
            cell.data('state', 'third');
            break;
        case 'third':
            cell.removeClass('red yellow');
            cell.data('state', 'first');
            break;
        default:
            break;
    }

    //Update state:
    state = cell.data("state");
    //Get the index of the td:
    var index = tds.index(cell);
    //Set localStorage using index and state:
    localStorage.setItem("state" + index, state);
});