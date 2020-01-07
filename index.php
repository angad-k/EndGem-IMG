<?php 
    $conn = mysqli_connect('localhost', 'clienthai', 'YES', 'endgem');

    // check connection
    if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
    }
	// write query for all pizzas
	$sql = 'SELECT title, url, downloads, Date FROM coursecontent WHERE course = 1 ORDER BY downloads DESC';
	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);
	// fetch the resulting rows as an array
	$course = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// free the $result from memory (good practise)
	mysqli_free_result($result);
	
?>


<html>
    <head>
        <title>EndGem</title>
        <link rel = 'stylesheet' href = 'stylesheets/mainStyle.css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        
    </head>
    <body>
        <div class = TopPane>
            <img  class = logo src = "resources/images/logo.png">
            <table class = CoursesPane>
                <tr>
                    <td>
                        <a href = 'index.php' class = "pressedbtn"><b>Course 1</b></a>
                    </td>
                    <td>
                        <a href = 'course2.php' class = "pressablebtn"><b>Course 2</b></a>
                    </td>
                    <td>
                        <a href = 'course3.php' class = "pressablebtn"><b>Course 3</b></a>
                    </td>
                    <td>
                        <a href = 'course4.php' class = "pressablebtn"><b>Course 4</b></a>
                    </td>
                </tr>
            </table>
            <div class = "wrapperWithPadding">
                <button class = optionsbutton id = options onclick= "showGems();"><img class = options src = "resources/images/options.png"></button>
                <button class = plusbutton id = plus onclick="window.location.href = '/EndGem/add.php'"><img class =plus src = "resources/images/plus.png" ></button>
            </div>
            
              
            <script>
                var i =0;
                               
                function add(titlep, filep, downloadsp, datep ) 
                { 
                    const coursediv = document.createElement("div");
                    coursediv.className = "course";
                    coursediv.id = i++;
                    const pdfimage = document.createElement("img");
                    pdfimage.src = "resources/images/pdflogo.png"
                    pdfimage.className = "pdflogo"
                    coursediv.appendChild(pdfimage);

                    const dbtn = document.createElement("button");
                    dbtn.className = "downloadbtn";
                    
                    const downloadimage = document.createElement("img");
                    downloadimage.src = "resources/images/download.png";
                    downloadimage.className = "download";
                    dbtn.appendChild(downloadimage);
                    dbtn.id = "btn" + coursediv.id;
                    
                    dbtn.onclick = function() { downloadpressed(dbtn.id, filep) };
                    coursediv.appendChild(dbtn);

                    var tbl = document.createElement("table");
                    var tblBody = document.createElement("tbody");
                    tbl.className = "titledate";
                    var row = document.createElement("tr");
                    var cell = document.createElement("td");
                    cell.className = "title"
                    var cellText = document.createTextNode(titlep);
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                    tblBody.appendChild(row);
                    var row2 = document.createElement("tr");
                    var cell2 = document.createElement("td");
                    cell2.className = "date"
                    
                    var cellText2 = document.createTextNode(datep);
                    cell2.appendChild(cellText2);
                    row2.appendChild(cell2);
                    tblBody.appendChild(row2);
                    tbl.appendChild(tblBody)
                    coursediv.appendChild(tbl);
                   
                    var noofdown = document.createElement("p");
                    noofdown.textContent = "No. of downloads = " + downloadsp;
                    noofdown.id = "dwn" + coursediv.id;
                    noofdown.className = "nodown";
                    coursediv.appendChild(noofdown);

                    document.body.append(coursediv);
                } 
                var toggle = 0;
                function showGems()
                {
                    if(toggle == 0){
                    const GemsBackground = document.createElement("div");
                    GemsBackground.id = "gems"
                    GemsBackground.className = "gemback";
                    var i = 1;
                    const gemTable = document.createElement("table");
                    gemTable.className = "tableGems";
                    var tblBody = document.createElement("tbody");
                    const row = document.createElement("tr");
                    const cell1 = document.createElement("td");
                    cell1.textContent = "Title";
                    row.appendChild(cell1);
                    const cell2 = document.createElement("td");
                    cell2.textContent = "Downloads";
                    row.appendChild(cell2);
                    const cell3 = document.createElement("td");
                    cell3.textContent = "Course";
                    row.appendChild(cell3);
                    const cell4 = document.createElement("td");
                    cell4.textContent = "Date";
                    row.appendChild(cell4);
                    tblBody.appendChild(row);
                    




                    <?php 
                    // write query for all pizzas
	                $sql2 = 'SELECT title, downloads, course, Date FROM coursecontent ORDER BY downloads DESC LIMIT 15';
	                // get the result set (set of rows)
	                $result2 = mysqli_query($conn, $sql2);
	                // fetch the resulting rows as an array
	                $course2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
	                // free the $result from memory (good practise)
	                mysqli_free_result($result2);
                    foreach($course2 as $coursecont): ?>
                    
                    var rowa = document.createElement("tr");
                    var cell1a = document.createElement("td");
                    cell1a.textContent = i++ + ") " + "<?php echo htmlspecialchars($coursecont['title']); ?>";
                    rowa.appendChild(cell1a);
                    var cell2a = document.createElement("td");
                    cell2a.textContent = "<?php echo htmlspecialchars($coursecont['downloads']); ?>";
                    rowa.appendChild(cell2a);
                    var cell3a = document.createElement("td");
                    cell3a.textContent ="course" + "<?php echo htmlspecialchars($coursecont['course']); ?>";
                    rowa.appendChild(cell3a);
                    var cell4a = document.createElement("td");
                    cell4a.textContent = "<?php echo htmlspecialchars($coursecont['Date']); ?>";
                    rowa.appendChild(cell4a);
                    tblBody.appendChild(rowa);



                    <?php endforeach ?>


                    

                    gemTable.appendChild(tblBody);
                    GemsBackground.appendChild(gemTable);
                    document.body.appendChild(GemsBackground);
                    toggle = 1;
                    }
                    else
                    {
                        const GemsBackground  = document.getElementById("gems");
                        GemsBackground.remove();
                        toggle = 0;
                    }
                }
                
                function downloadpressed(id_btn, filep)
                {
                   var btnid = id_btn;
                   console.log("a0 " + btnid);
                   var btn = document.getElementById(btnid);                
                   
                   var divid = parseInt(btnid.substring(3));
                   console.log("a " + divid);
                                   
                   var noofdown = document.getElementById("dwn" + divid);
                   var nostr = noofdown.textContent;
                   var no = parseInt(nostr.substring(18));
                   no++;                   

                   var formd = document.createElement("form");
                   formd.setAttribute("action", "increment.php"); 
                   formd.setAttribute("method", "post"); 
                   
                   var fileName = document.createElement('input'); 
                   fileName.setAttribute("name", "title");
                   fileName.setAttribute("value", filep);
                   formd.appendChild(fileName);

                   var course = document.createElement('input'); 
                   course.setAttribute("name", "course");
                   course.setAttribute("value", "course1");
                   formd.appendChild(course);

                   var downloads = document.createElement('input'); 
                   downloads.setAttribute("name", "downloads");
                   downloads.setAttribute("value", no);
                   formd.appendChild(downloads);

                   fileEnd = filep.substring((filep.length - 3));
                   if(fileEnd !== 'pdf')
                   {
                       filep = filep + '.pdf';
                       console.log("reached");
                   }

                   window.open('uploads/' + filep);
                   document.body.append(formd);
                   formd.submit();
                }
            </script>  
            <?php foreach($course as $coursecont): ?>
                <script> add('<?php echo htmlspecialchars($coursecont['title']); ?>', '<?php echo htmlspecialchars($coursecont['url']); ?>' , '<?php echo htmlspecialchars($coursecont['downloads']); ?>', '<?php echo htmlspecialchars($coursecont['Date']); ?>' ) </script>
            <?php endforeach; ?>
    </body>
</html>