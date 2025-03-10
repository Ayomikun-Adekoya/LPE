
 <?php

$conn= mysqli_connect("localhost", "root", "", "hder");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$lecturer = $_GET['lecturer'];
$code=  $_GET['code'];
$id= $_GET['id'];

$sql = "DELETE FROM course_assign
WHERE lecturer_id = $lecturer;
";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: discharge.php?code=" . $code . "&id=" . $id);
    exit;   
    }
mysqli_close($conn);

exit();    

?>
