<?php
$target_dir = "uploads/";


if(isset($_POST["submit"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($FileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

            $conn = mysqli_connect('localhost', 'clienthai', 'YES', 'endgem');

            // check connection
	        if(!$conn){
		        echo 'Connection error: '. mysqli_connect_error();
            }
            
            
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $date = mysqli_real_escape_string($conn, $_POST['date']);
            $url = mysqli_real_escape_string($conn, $_FILES["fileToUpload"]["name"]);
            
            if($_POST["course"] == "course1")
            {
                $sql = "INSERT INTO coursecontent(title, url, downloads, Date, course) VALUES('$title','$url','0', '$date', '1')";
            }
            if($_POST["course"] == "course2")
            {
                $sql = "INSERT INTO coursecontent(title, url, downloads, Date, course) VALUES('$title','$url','0', '$date', '2')";
            }
            if($_POST["course"] == "course3")
            {
                $sql = "INSERT INTO coursecontent(title, url, downloads, Date, course) VALUES('$title','$url','0', '$date', '3')";
            }
            if($_POST["course"] == "course4")
            {
                $sql = "INSERT INTO coursecontent(title, url, downloads, Date, course) VALUES('$title','$url','0', '$date', '4')";
            }


            if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
            
            




        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

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
            
            
            <button class = back id = back onclick="window.location.href = '/EndGem/'">Back</button>
        </div>
                     
        <div class = addform>
            <h4><u>Add a file</u></h4>
            <form class = "addingform" action = "add.php" method = "POST" enctype="multipart/form-data" id = "formcourse">
                <label>Title :</label>
                <br>
			    <input type="text" class = "textinput" name="title" value="">
                <div class="red-text"></div>

                <label>Select course : </label>
                <br>
			    <select name = "course" class = "dropdownc">
                    <option value = "course1">Course 1</option> 
                    <option value = "course2">Course 2</option> 
                    <option value = "course3">Course 3</option> 
                    <option value = "course4">Course 4</option>
                </select> 
                <div></div>
                <hr class = "blackline">
                <script>
                var d = new Date();
                console.log((d.getMonth()+1));
                var cellText2 = (d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear());

                const formc = document.getElementById("formcourse");
                var datep = document.createElement('input'); 
                datep.setAttribute("name", "date");
                datep.setAttribute("value", cellText2);
                datep.style.display = "none";
                formc.appendChild(datep);

                 
                </script>
                

                
                
			    <input type="file" name="fileToUpload" class = "uploader" size="60" />
                <div class="red-text"></div>

                

                <input type="submit" value="Submit" name="submit" class = "submitter"/>                
            </form>
        </div>
       

        
    </body>
</html>
