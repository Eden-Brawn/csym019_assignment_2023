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
            let txt = "<col><col><col><colgroup span=\"3\"></colgroup><colgroup span=\"3\"></colgroup><colgroup span=\"2\"></colgroup>" + //colgroup col rowspan colspan from https://jsfiddle.net/SyedFayaz/ud0mpgoh/7/
            "<thead><tr><th rowspan=\"2\">Course</th>"+
            "<th rowspan=\"2\">UCAS Code</th>" + 
            "<th rowspan=\"2\">Starting Month</th>" + 
            "<th colspan=\"3\">Duration</th>"+
            "<th colspan=\"3\">UK Fees</th>" +
            "<th colspan=\"2\">International Fees</th>" +
            "<th rowspan=\"2\">Location</th>" + 
            "<tr><th scope=\"col\">Full Time</th>" + 
            "<th scope=\"col\">Part Time</th>" + 
            "<th scope=\"col\">Foundation</th>"+
            "<th scope=\"col\">Full Time</th>" + 
            "<th scope=\"col\">Part Time</th>" + // table order came from https://www.w3.org/WAI/tutorials/tables/irregular/
            "<th scope=\"col\">Foundation</th>"+
            "<th scope=\"col\">Full Time</th>" + 
            "<th scope=\"col\">Foundation</th></tr>"+
            "</tr></thead>";//th came from https://developer.mozilla.org/en-US/docs/Learn/HTML/Tables/Basics
            let txt2 = "<col><col><colgroup span=\"2\"></colgroup><colgroup span=\"2\"></colgroup><colgroup span=\"2\"></colgroup>" +
            "<thead><tr><th rowspan=\"2\">Course</th>"+
            "<th rowspan=\"2\">Starting Month</th>" + 
            "<th colspan=\"2\">Duration</th>"+
            "<th colspan=\"2\">UK Fees</th>" +
            "<th colspan=\"2\">International Fees</th>" +
            "<th rowspan=\"2\">Location</th>" +
            "<tr><th scope=\"col\">Full Time</th>" + 
            "<th scope=\"col\">Part Time</th>" + 
            "<th scope=\"col\">Full Time</th>" + 
            "<th scope=\"col\">Part Time</th>" +
            "<th scope=\"col\">Full Time</th>" + 
            "<th scope=\"col\">Part Time</th>" +
            "</tr></thead>"; 
            for (let i=0; i < data.courses.length; i++) {
                if(data.courses[i].level == "Undergraduate"){
                    txt += "<tbody><tr id=\"" + data.courses[i].course + "\">" + "<td id=\"course\">" + data.courses[i].course + "</td>" + "<td>" + data.courses[i].ucascode + "</td>" 
                    + "<td>" + data.courses[i].starting + "</td>" + "<td>" + data.courses[i].duration.fulltime + "</td>" + "<td>" + 
                    data.courses[i].duration.parttime + "</td>" + "<td>" + data.courses[i].duration.fulltimefoundation + "</td>" + 
                    "<td>" + data.courses[i].fees.ukfees.fulltime + "</td>" + "<td>" + data.courses[i].fees.ukfees.parttime + "</td>" + 
                    "<td>" + data.courses[i].fees.ukfees.integratedfoundationyear + "</td>" + 
                    "<td>" + data.courses[i].fees.internationalfees.fulltime + "</td>" + "<td>" + data.courses[i].fees.internationalfees.integratedfoundationyear + "</td>" + 
                    "<td>" + data.courses[i].location + "</td>" + "</tr></tbody>";
                }
                if(data.courses[i].level == "Postgraduate"){
                    txt2 += "<tbody><tr id=\"" + data.courses[i].course + "\">" + "<td id=\"course\">" + data.courses[i].course + "</td>" + "<td>" + data.courses[i].starting + "</td>" 
                    + "<td>" + data.courses[i].duration.fulltime + "</td>" + "<td>" + data.courses[i].duration.parttime + "</td>" 
                    + "<td>" + data.courses[i].fees.ukfees.fulltime + "</td>" + "<td>" + data.courses[i].fees.ukfees.parttime + "</td>"  
                    +  "<td>" + data.courses[i].fees.internationalfees.fulltime + "</td>" + "<td>" + data.courses[i].fees.internationalfees.parttime + "</td>" 
                    + "<td>" + data.courses[i].location + "</td>" + "</tr></tbody>";
                }
            }
            document.getElementById("undergradcourse").innerHTML = txt;
            document.getElementById("postgradcourse").innerHTML = txt2;
            
            const rows = document.getElementsByTagName("tr");
            const result = document.getElementById("info");

            const rowPressed = e => { /*The click to show content from https://softauthor.com/get-id-of-clicked-element-in-javascript/#:~:text=The%20buttonPressed()%20callback%20function%20will%20have%20a%20returned%20event,ID%20of%20the%20clicked%20element.*/
                for(let i=0; i < data.courses.length; i++){
                    if(data.courses[i].course == e.target.innerHTML){
                        result.innerHTML = "<h2>" + data.courses[i].course + "</h2>" +
                        "<h3>Details</h3>" +
                        "<p>" + "</p>" +
                        "<h3>Entry Requirments</h3>" +
                        "<p>At A Level: " + data.courses[i].entryrequirements.standard.alevel + "</p>" +
                        "<p>At BTEC: " + data.courses[i].entryrequirements.standard.btec + "</p>" +
                        "<p>At T Level: " + data.courses[i].entryrequirements.standard.tlevel + "</p><p>Integrated Foundation Year:</p>" +
                        "<p>At A Level: " + data.courses[i].entryrequirements.integratedfoundationyear.alevel + "</p>" +
                        "<p>At BTEC: " + data.courses[i].entryrequirements.integratedfoundationyear.btec + "</p>" +
                        "<p>At T Level: " + data.courses[i].entryrequirements.integratedfoundationyear.tlevel + "</p><p>Language Requirements:</p>" +
                        "<p>International students require an " + data.courses[i].entryrequirements.englishlanguagerequirements + "</p>";
                    }
                }
            }

            for (let tr of rows) {
                tr.addEventListener("click", rowPressed);
            }
        }
        else {
            document.getElementById("updatemessage").innerHTML = "An error occurred: " + xhr.status;
        }
    }
}
function showInfo(){
    txt = "<p>yoyoyo</p>";
    document.getElementById("info").innerHTML = txt;
}


setTimeout(() => { //Got this setimeout section from https://www.freecodecamp.org/news/refresh-the-page-in-javascript-js-reload-window-tutorial/
    window.location.reload();
  }, 60000);


  