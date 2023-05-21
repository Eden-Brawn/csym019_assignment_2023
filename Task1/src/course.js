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
            let txt = "<tr><th>Course</th></tr>";//th came from https://developer.mozilla.org/en-US/docs/Learn/HTML/Tables/Basics
            let txt2 = "<tr><th>Course</th></tr>";
            for (let i=0; i < data.courses.length; i++) {
                if(data.courses[i].level == "Undergraduate"){
                    txt += "<tr><td>" + data.courses[i].course + "</td></tr>";
                }
                if(data.courses[i].level == "Postgraduate"){
                    txt2 += "<tr><td>" + data.courses[i].course + "</td></tr>";
                }
            }
            document.getElementById("undergradcourse").innerHTML = txt;
            document.getElementById("postgradcourse").innerHTML = txt2;
        }
        else {
            document.getElementById("updatemessage").innerHTML = "An error occurred: " + xhr.status;
        }
    }
}