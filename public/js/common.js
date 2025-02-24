function setMenuActive(fName) {
    //alert(fName);
    $("li.nav-item a").each(function(index) {
        $( this ).removeClass("active");
        if ($( this ).attr("href") == fName) {
            $( this ).addClass("active")
        }
    })
}

function changeColor(e) {
    color = $(e).hasClass("available");
    if (color) {
        $(e).removeClass("available");
        $(e).addClass("unavailable");
    } else {
        $(e).removeClass("unavailable");
        $(e).addClass("available");
    }
}