<?php
$conn = mysqli_connect('localhost', 'clienthai', 'YES', 'endgem');
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
    }


$downs = $_POST['downloads'];
$nameurl = $_POST['title'];
echo "hello there";
// Attempt update query execution
if($_POST['course'] === 'course2' )
{
    $query = "UPDATE coursecontent SET downloads = ? WHERE url = ? AND course = '2'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $downs, $nameurl);
    $stmt->execute();
    header('Location: course2.php');  
}
elseif($_POST['course'] === 'course1')
{
    $query = "UPDATE coursecontent SET downloads = ? WHERE url = ? AND course = '1'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $downs, $nameurl);
    $stmt->execute();
    header('Location: index.php');
}
elseif($_POST['course'] === 'course3')
{
    $query = "UPDATE coursecontent SET downloads = ? WHERE url = ? AND course = '3'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $downs, $nameurl);
    $stmt->execute();
    header('Location: course3.php');
}
elseif($_POST['course'] === 'course4')
{
    $query = "UPDATE coursecontent SET downloads = ? WHERE url = ? AND course = '4'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $downs, $nameurl);
    $stmt->execute();
    header('Location: course4.php');
}


?>


