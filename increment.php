<?php
$conn = mysqli_connect('localhost', 'clienthai', 'test1234', 'endgem');
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
    }


$downs = $_POST['downloads'];
$nameurl = $_POST['title'];
echo "hello there";
// Attempt update query execution
if($_POST['course'] === 'course2' )
{
    $query = "UPDATE course2 SET downloads = ? WHERE url = ?";  
}
elseif($_POST['course'] === 'course1')
{
    $query = "UPDATE course1 SET downloads = ? WHERE url = ?";
}
elseif($_POST['course'] === 'course3')
{
    $query = "UPDATE course3 SET downloads = ? WHERE url = ?";
}
elseif($_POST['course'] === 'course4')
{
    $query = "UPDATE course4 SET downloads = ? WHERE url = ?";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $downs, $nameurl);
$stmt->execute();
header('Location: index.php');
?>


