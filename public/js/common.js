function setMenuActive(fName) {
    //alert(fName);
    $("li.nav-item a").each(function(index) {
        $( this ).removeClass("active");
        if ($( this ).attr("href") == fName) {
            $( this ).addClass("active")
        }
    })
}