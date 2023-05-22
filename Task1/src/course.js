//$(document).ready(function(){
//    $("#course").load("course.html");
//});
//REFERECE WHERE DATA CAME FROM
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
            let data = JSON.parse(xhr.responseText);//thead, tbody adn sub headings https://stackoverflow.com/questions/22702825/create-a-table-with-sub-headings-and-side-headings
            let txt = "<col><col><col><colgroup span=\"4\"></colgroup>" + //colgroup col rowspan colspan from https://jsfiddle.net/SyedFayaz/ud0mpgoh/7/
            "<thead><tr><th rowspan=\"2\">Course</th>"+
            "<th rowspan=\"2\">UCAS Code</th>" + 
            "<th rowspan=\"2\">Starting Month</th>" + 
            "<th colspan=\"3\">Duration</th>"+
            "<tr><th scope=\"col\">Full Time</th>" + 
            "<th scope=\"col\">Part Time</th>" + 
            "<th scope=\"col\">Foundation</th></tr>"+
            "</tr></thead>";//th came from https://developer.mozilla.org/en-US/docs/Learn/HTML/Tables/Basics
            let txt2 = "<tr><th>Course</th></tr>"; 
            for (let i=0; i < data.courses.length; i++) {
                if(data.courses[i].level == "Undergraduate"){
                    txt += "<tbody><tr>" + "<td>" + data.courses[i].course + "</td>" + "<td>" + data.courses[i].ucascode + "</td>" 
                    + "<td>" + data.courses[i].starting + "</td>" + "<td>" + data.courses[i].duration.fulltime + "</td>" + "<td>" + 
                    data.courses[i].duration.parttime + "</td>" + "<td>" + data.courses[i].duration.fulltimefoundation + "</td>" + 
                    "<td>" +  + "</td>" + "</tr></tbody>";
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