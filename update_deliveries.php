<?php
include("cnx.php");
?>

<?php
if(isset($_POST['publication']) && !empty($_POST['publication']) && isset($_POST['publisher']) && !empty($_POST['publisher'])) {
    $publication = $_POST['publication'];
    $publisher = $_POST['publisher'];

    //Actualizar BD
    $result = mysqli_query($conn, "SELECT $publication FROM deliveries WHERE Name='$publisher'");
    
    $row = mysqli_fetch_array($result);
    
    $flag = $row[$publication];
    
    if($flag==1)
        $result = mysqli_query($conn, "UPDATE deliveries SET $publication=0 WHERE Name='$publisher'");
    else
        $result = mysqli_query($conn, "UPDATE deliveries SET $publication=1 WHERE Name='$publisher'");
}
?>