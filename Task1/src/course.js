//$(document).ready(function(){
//    $("#course").load("course.html");
//});

window.onload = makeAjaxRequest;

function makeAjaxRequest() {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } 
    else {
        if (window.ActiveXObject) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }

    if (xhr) {
        xhr.open("GET", "course.json", true);
        xhr.send();
        xhr.onreadystatechange = showContents;
    }
    else {
        document.getElementById("updatemessage").innerHTML = "Could not perform stated Request";
    }
}

function showContents() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            let data = JSON.parse(xhr.responseText);
            let txt = "";
            for (let i=0; i < data.courses.length; i++) {
                txt += "<tr><td>" + data.courses[i].course + "</td></tr>";
            }
            document.getElementById("undergradcourse").innerHTML = txt;
        }
        else {
            document.getElementById("updatemessage").innerHTML = "An error occurred: " + xhr.status;
        }
    }
}