<?php 
$conn = new mysqli("localhost","root","" ,"multi_images");

foreach ($_FILES['images']['name'] as $i => $value) {
	$image_name = $_FILES['images']['tmp_name'][$i];
	$folder = "upload/";
	$image_path = $folder.$_FILES['images']['name'][$i];
	move_uploaded_file($image_name, $image_path);

$sql = "INSERT INTO images (image_path) VALUES (?)"	;
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$image_path);
$stmt->execute();
}
echo "Image Uploaded Succesfully😎👍";
 ?>