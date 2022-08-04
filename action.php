<?php
// Kết nội CSDL
// $host = "127.0.0.1";
// $user = "root";
// $password = "";
// $dbname = "data";

// $con = mysqli_connect($host, $user, $password,$dbname);

$host     = "localhost";
$port     = 3306;
$socket   = "";
$user     = "root";
$password = "oneteam123@";
$dbname   = "data";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());
// Check connection
// if (!$con) {
// die("Connection failed: " . mysqli_connect_error());
// }
// Kiểm tra button
if(isset($_POST['upload'])){

// Dung lượng cho phép upload lên
$maxsize = 52428800; // 5MB

// Lưu vào thư mục trên máy tính
$name = $_FILES['file']['name'];
$target_dir = "videos/";
$target_file = $target_dir . $_FILES["file"]["name"];

$videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Định dạng mở rộng
$extensions_arr = array("mp4","avi","3gp","mov","mpeg");

if( in_array($videoFileType,$extensions_arr) ){

// Điều kiện kiểm tra dung lượng file
if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
echo "File quá lớn! Vui lòng upload file nhỏ hơn!";
}else{
// Tiếp hành Upload
if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
// Ghi dữ liệu vào Database
$query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

$query = mysqli_query($con,$query);
if($query)
{
echo "Upload thành công.";
}
}
}

}else{
echo "Lỗi định dạng";
}

}
?>