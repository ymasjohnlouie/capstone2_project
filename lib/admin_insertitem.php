<?php
require_once "connect.php";

if (isset($_POST['submit'])) {
	$product_name = $_POST['product_name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$category = $_POST['category'];

	$file = $_FILES['file'];

	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileName = $_FILES['file']['type'];

		// get the name of the file and the extention
	$fileExt = explode('.', $_FILES['file']['name']); 
		// print_r($fileExt);
	$fileActualExt = strtolower(end($fileExt));
		// print_r($fileActualExt);
		// files to allowed to upload
	$allowed = array('jpg','jpeg','png');
		// print_r($allowed);

		// checks if the $allowed is inside the $fileActualExt
	if (in_array($fileActualExt, $allowed)) {

			// checks if theres no error in the file
		if ($fileError === 0) {

				// check the file size
			if ($fileSize < 5000000) {

				$fileNameNew = uniqid('', true).".". $fileActualExt;

				$fileDestination = '../assets/img/uploads/' . $fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
					// header("Location: upload.php?upload_success");
				$image_path = "assets/img/uploads/" . $fileNameNew;
					echo $fileDestination;

				// $insertitem_qry = "INSERT INTO items (product_name, description, price, category_id, image_path) VALUES ('$product_name', '$description', '$price', '$category', '$image_path')";
				// // $result = mysqli_query($conn, $insertitem_qry);
				// // header("Location: admin_additem.php");
				// var_dump($insertitem_qry);
				// mysqli_close($conn);

			} else {
				echo "Your file is too big!";
			}

		} else {
			echo "There was an error uploading your file!";
		}

	} else {
		echo "You cannot upload files of this type!";
	}
}
?>