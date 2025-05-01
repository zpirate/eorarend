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


function colorLessonNumber(id) {
    if ($("span#lesson_" + id).text() == $("span#subject_" + id).text()) {
        $("#tr_" + id).removeClass("unfit");
        $("#tr_" + id).addClass("fit");
    } else {
        $("#tr_" + id).removeClass("fit");
        $("#tr_" + id).addClass("unfit");
    }
}

function updateSubject(e, url, day, hour) {
    //alert("Updating timetable for " + day + " " + hour + " " + subjectId);
    var oldVal = $(e).attr('data-oldvalue');
    var curVal = $(e).val();
    // alert("oldVal: " + oldVal + ", curVal: " + curVal);
    // alert($("span#subject_" + oldVal).text());
    $("span#subject_" + oldVal).text(parseInt($("span#subject_" + oldVal).text()) - 1);
    $("span#subject_" + curVal).text(parseInt($("span#subject_" + curVal).text()) + 1);
        $.ajax({
        url: url,
        type: 'POST',
        data: {
            class_id: $("select[name='class_id']").find(":selected").val(),
            day: day + 1,
            hour: hour + 1,
            subject_id: curVal
        },
        success: function(response) {
         },
        error: function(xhr, status, message) {
            // Handle error
            alert("Hiba történt a mentés közben! (" + message + ")");
        }
    });
    $(e).attr('data-oldvalue', curVal);
    colorLessonNumber(curVal);
    colorLessonNumber(oldVal);
}

function updateClassroom(url, day, hour, classroomId) {
    //alert("Updating timetable for " + day + " " + hour + " " + subjectId);
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            class_id: $("select[name='class_id']").find(":selected").val(),
            day: day + 1,
            hour: hour + 1,
            classroom_id: classroomId
        },
        success: function(response) {
         },
        error: function(xhr, status, message) {
            // Handle error
            alert("Hiba történt a mentés közben! (" + message + ")");
        }
    });

}