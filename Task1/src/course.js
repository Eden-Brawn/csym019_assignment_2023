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
            let txt = "<col><col><col><col><colgroup span=\"3\"></colgroup><colgroup span=\"3\"></colgroup><colgroup span=\"2\"></colgroup>" + //colgroup col rowspan colspan from https://jsfiddle.net/SyedFayaz/ud0mpgoh/7/
            "<thead><tr><th rowspan=\"2\"></th><th rowspan=\"2\">Course</th>"+
            "<th rowspan=\"2\">UCAS Code</th>" + 
            "<th rowspan=\"2\">Starting Month</th>" + 
            "<th colspan=\"3\">Duration</th>"+
            "<th id=\"fees\" colspan=\"3\">UK Fees</th>" +
            "<th id=\"fees\" colspan=\"2\">International Fees</th>" +
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
            let txt2 = "<col><col><col><colgroup span=\"2\"></colgroup><colgroup span=\"2\"></colgroup><colgroup span=\"2\"></colgroup>" +
            "<thead><tr><th rowspan=\"2\"></th><th rowspan=\"2\">Course</th>"+
            "<th rowspan=\"2\">Starting Month</th>" + 
            "<th colspan=\"2\">Duration</th>"+
            "<th id=\"fees\" colspan=\"2\">UK Fees</th>" +
            "<th id=\"fees\" colspan=\"2\">International Fees</th>" +
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
                    txt += "<tbody><tr id=\"" + data.courses[i].course + "\">" + "<td><img src=\"" + data.courses[i].image + "\"></td>" + "<td id=\"course\">" + data.courses[i].course + "</td>" + "<td>" + data.courses[i].ucascode + "</td>" 
                    + "<td>" + data.courses[i].starting + "</td>" + "<td>" + data.courses[i].duration.fulltime + "</td>" + "<td>" + 
                    data.courses[i].duration.parttime + "</td>" + "<td>" + data.courses[i].duration.fulltimefoundation + "</td>" + 
                    "<td id=\"num\">" + data.courses[i].fees.ukfees.fulltime + "</td>" + "<td id=\"num\">" + data.courses[i].fees.ukfees.parttime + "</td>" + 
                    "<td id=\"num\">" + data.courses[i].fees.ukfees.integratedfoundationyear + "</td>" + 
                    "<td id=\"num\">" + data.courses[i].fees.internationalfees.fulltime + "</td>" + "<td id=\"num\">" + data.courses[i].fees.internationalfees.integratedfoundationyear + "</td>" + 
                    "<td>" + data.courses[i].location + "</td>" + "</tr></tbody>";
                }
                if(data.courses[i].level == "Postgraduate"){
                    txt2 += "<tbody><tr id=\"" + data.courses[i].course + "\">" + "<td><img src=\"" + data.courses[i].image + "\"></td>" + "<td id=\"course\">" + data.courses[i].course + "</td>" + "<td>" + data.courses[i].starting + "</td>" 
                    + "<td>" + data.courses[i].duration.fulltime + "</td>" + "<td>" + data.courses[i].duration.parttime + "</td>" 
                    + "<td id=\"num\">" + data.courses[i].fees.ukfees.fulltime + "</td>" + "<td id=\"num\">" + data.courses[i].fees.ukfees.parttime + "</td>"  
                    +  "<td id=\"num\">" + data.courses[i].fees.internationalfees.fulltime + "</td>" + "<td id=\"num\">" + data.courses[i].fees.internationalfees.parttime + "</td>" 
                    + "<td>" + data.courses[i].location + "</td>" + "</tr></tbody>";
                }
            }
            document.getElementById("undergradcourse").innerHTML = txt;
            document.getElementById("postgradcourse").innerHTML = txt2;
            
            const rows = document.getElementsByTagName("tr");
            const result = document.getElementById("info");

            const rowPressed = e => { /*The click to show content from https://softauthor.com/get-id-of-clicked-element-in-javascript/#:~:text=The%20buttonPressed()%20callback%20function%20will%20have%20a%20returned%20event,ID%20of%20the%20clicked%20element.*/
                for(let i=0; i < data.courses.length; i++){
                    if(data.courses[i].level == "Undergraduate"){
                        if(data.courses[i].course == e.target.innerHTML){
                            result.innerHTML = "<h2 id=\"title\">" + data.courses[i].course + "</h2>" +
                            "<div id=\"details\"><h3>Details</h3><p>" + data.courses[i].description + "</p></div>" +
                            "<div id=\"entry\"><h3>Entry Requirements</h3><ul><li>At A Level: " + data.courses[i].entryrequirements.standard.alevel + "</li>" +
                            "<li>At BTEC: " + data.courses[i].entryrequirements.standard.btec + "</li>" +
                            "<li>At T Level: " + data.courses[i].entryrequirements.standard.tlevel + "</li></ul><p>Integrated Foundation Year:</p>" +
                            "<ul><li>At A Level: " + data.courses[i].entryrequirements.integratedfoundationyear.alevel + "</li>" +
                            "<li>At BTEC: " + data.courses[i].entryrequirements.integratedfoundationyear.btec + "</li>" +
                            "<li>At T Level: " + data.courses[i].entryrequirements.integratedfoundationyear.tlevel + "</li></ul><p>Language Requirements:</p>" +
                            "<ul><li>International students require an " + data.courses[i].entryrequirements.englishlanguagerequirements + "</li></ul></div>" +
                            "<div id=\"duration\"><h3>Duration</h3><ul><li>Fulltime students will study for " + data.courses[i].duration.fulltime + "</li><li>Parttime students will study for " + data.courses[i].duration.parttime + 
                            "</li><li>Fulltime students with a foundation year will study for " + data.courses[i].duration.fulltimefoundation + "</li></ul></div>" +
                            "<div id=\"tuition\"><h3>Tuition fees</h3><ul><li>The fee for a full time uk student: £" + data.courses[i].fees.ukfees.fulltime + "</li>" +
                            "<li>The fee for a part time uk student: £" + data.courses[i].fees.ukfees.parttime + "</li><li>The fee for an UK students integrated foundation year: £" + data.courses[i].fees.ukfees.integratedfoundationyear +
                            "</li><li>The fee for a full time international student: £" + data.courses[i].fees.internationalfees.fulltime + "</li>" +
                            "<li>The fee for international students integrated foundation year: " + data.courses[i].fees.ukfees.integratedfoundationyear + "</li>" +
                            "<li>The fee for a work placement year: £" + data.courses[i].fees.optionalworkplacementyear + "</li></ul></div><div id=\"modules\"><h3>Modules</h3><strong><p>Year 1</p></strong><p><strong>" + 
                            data.courses[i].yearone.moduleone +"</strong></p><p>"+data.courses[i].yearone.descriptionone +"</p>"+ "<p><strong>" + data.courses[i].yearone.moduletwo +"</strong></p><p>"+data.courses[i].yearone.descriptiontwo +"</p>"+ "<p><strong>" + 
                            data.courses[i].yearone.modulethree +"</strong></p><p>"+data.courses[i].yearone.descriptionthree +"</p>"+"<p><strong>" + data.courses[i].yearone.modulefour +"</strong></p><p>"+data.courses[i].yearone.descriptionfour +"</p>"+"<p><strong>" + 
                            data.courses[i].yearone.modulefive +"</strong></p><p>"+data.courses[i].yearone.descriptionfive +"</p>"+"<p><strong>" + data.courses[i].yearone.modulesix +"</strong></p><p>"+data.courses[i].yearone.descriptionsix +"</p>"+
                            "<strong><p>Year 2</p></strong><p><strong>" + 
                            data.courses[i].yeartwo.moduleone +"</strong></p><p>"+data.courses[i].yeartwo.descriptionone +"</p>"+ "<p><strong>" + data.courses[i].yeartwo.moduletwo +"</strong></p><p>"+data.courses[i].yeartwo.descriptiontwo +"</p>"+ "<p><strong>" + 
                            data.courses[i].yeartwo.modulethree +"</strong></p><p>"+data.courses[i].yeartwo.descriptionthree +"</p>"+"<p><strong>" + data.courses[i].yeartwo.modulefour +"</strong></p><p>"+data.courses[i].yeartwo.descriptionfour +"</p>"+"<p><strong>" + 
                            data.courses[i].yeartwo.modulefive +"</strong></p><p>"+data.courses[i].yeartwo.descriptionfive +"</p>"+"<p><strong>" + data.courses[i].yeartwo.modulesix +"</strong></p><p>"+data.courses[i].yeartwo.descriptionsix +"</p>"+
                            "<strong><p>Year 3</p></strong><p><strong>" + 
                            data.courses[i].yeartwo.moduleone +"</strong></p><p>"+data.courses[i].yeartwo.descriptionone +"</p>"+ "<p><strong>" + data.courses[i].yeartwo.moduletwo +"</strong></p><p>"+data.courses[i].yeartwo.descriptiontwo +"</p>"+ "<p><strong>" + 
                            data.courses[i].yeartwo.modulethree +"</strong></p><p>"+data.courses[i].yeartwo.descriptionthree +"</p>"+"<p><strong>" + data.courses[i].yeartwo.modulefour +"</strong></p><p>"+data.courses[i].yeartwo.descriptionfour +"</p>"+"<p><strong>" + 
                            data.courses[i].yeartwo.modulefive +"</strong></p><p>"+data.courses[i].yeartwo.descriptionfive +"</p>"+"<p><strong>" + data.courses[i].yeartwo.modulesix +"</strong></p><p>"+data.courses[i].yeartwo.descriptionsix +"</p>"+"</div>";
                        }
                    }    
                }
            }
            const pRowPressed = e => { /*The click to show content from https://softauthor.com/get-id-of-clicked-element-in-javascript/#:~:text=The%20buttonPressed()%20callback%20function%20will%20have%20a%20returned%20event,ID%20of%20the%20clicked%20element.*/
                for(let i=0; i < data.courses.length; i++){
                    if(data.courses[i].level == "Postgraduate"){
                        if(data.courses[i].course == e.target.innerHTML){
                            result.innerHTML = "<h2 id=\"title\">" + data.courses[i].course + "</h2>" +
                            "<div id=\"details\"><h3>Details</h3><p>" + data.courses[i].description + "</p></div>" +
                            "<div id=\"entry\"><h3>Entry Requirements</h3><ul><li>At T Level: " + data.courses[i].entryrequirements.postgradentry +"</li></ul>" +
                            "<p>Language Requirements:</p><ul><li>International students require an " + data.courses[i].entryrequirements.englishlanguagerequirements + "</li></ul></div>" +
                            "<div id=\"tuition\"><h3>Tuition fees</h3><ul><li>The fee for a full time uk student: £" + data.courses[i].fees.ukfees.fulltime + "</li>" +
                            "<li>The fee for a part time uk student: £" + data.courses[i].fees.ukfees.parttime + "</li>" + 
                            "</li><li>The fee for a full time international student: £" + data.courses[i].fees.internationalfees.fulltime + "</li>" +
                            "</div><div id=\"duration\"><h3>Duration</h3>" +
                            "<ul><li>Fulltime students will study for " + data.courses[i].duration.fulltime + "</li><li>Parttime students will study for " + data.courses[i].duration.parttime + 
                            "</ul></div><div id=\"modules\"><h3>Modules</h3><strong><p>Year 1</p></strong><p><strong>" + 
                            data.courses[i].yearone.moduleone +"</strong></p><p>"+data.courses[i].yearone.descriptionone +"</p>"+ "<p><strong>" + data.courses[i].yearone.moduletwo +"</strong></p><p>"+data.courses[i].yearone.descriptiontwo +"</p>"+ "<p><strong>" + 
                            data.courses[i].yearone.modulethree +"</strong></p><p>"+data.courses[i].yearone.descriptionthree +"</p>"+"<p><strong>" + data.courses[i].yearone.modulefour +"</strong></p><p>"+data.courses[i].yearone.descriptionfour +"</p>"+"<p><strong>" + 
                            data.courses[i].yearone.modulefive +"</strong></p><p>"+data.courses[i].yearone.descriptionfive +"</p>"+"<p><strong>" + data.courses[i].yearone.modulesix +"</strong></p><p>"+data.courses[i].yearone.descriptionsix +"</p></div>";
                        }
                    }
                }
            }

            for (let tr of rows) {
                tr.addEventListener("click", rowPressed);
            }
            for (let tr of rows) {
                tr.addEventListener("click", pRowPressed);
            }
        }
        else {
            document.getElementById("updatemessage").innerHTML = "An error occurred: " + xhr.status;
        }
    }
}

setTimeout(() => { //Got this setimeout section from https://www.freecodecamp.org/news/refresh-the-page-in-javascript-js-reload-window-tutorial/
    window.location.reload();
  }, 600000);

  
document.getElementById("fees").addEventListener("click", convert);
  