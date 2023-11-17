<?php 
$conn = mysqli_connect("localhost", "root", "", "data");

if (isset($_POST['imageUrl'])) {
    global $conn; 

    $imageUrl = $_POST['imageUrl'];

    $content = file_get_contents($imageUrl);

    $extension = image_type_to_extension( getimagesize($imageUrl)[2] );

    $newImageName = uniqid() . $extension;
    $destination = "uploads/" . $newImageName;

    file_put_contents($destination, $content);

    $query = "INSERT INTO tb_data VALUES('', '$destination')";
    mysqli_query($conn, $query);
}
