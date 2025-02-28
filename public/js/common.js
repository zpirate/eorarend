function setMenuActive(fName) {
    //alert(fName);
    $("li.nav-item a").each(function(index) {
        $( this ).removeClass("active");
        if ($( this ).attr("name") == fName) {
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

function setFullDayAvailability(e) {
    day = $(e).attr('id').substring(3);
    available = $("td#td_"+ day +"_1").hasClass("available");
    for (i = 1; i <= 9; i++) {
        $("td#td_"+ day +"_"+ i).removeClass("available");
        $("td#td_"+ day +"_"+ i).removeClass("unavailable");
        if (!available) {
            $("td#td_"+ day +"_"+ i).addClass("available");
        } else {
            $("td#td_"+ day +"_"+ i).addClass("unavailable");
        }
    }
}

function saveAvailability() {
    available = "";
    for (d=1; d<=5; d++) {
        for (t=1; t<=9; t++) {
            if ($("td#td_"+ d +"_"+ t).hasClass("available")) {
                available += d +","+ t +";";
            }
        }
    }
    $("input[name='availability']").val(available);
    //alert(available + $('#formId').attr('action'));
    $('#formId').submit();
}