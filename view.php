<?php
$fetchVideos = 'SELECT location FROM videos ORDER BY id DESC';
$result = mysqli_query($con, $fetchVideos);
if (!$result) {
echo "Lỗi không lấy được dữ liệu";
}
else {
while($row = mysqli_fetch_array($result)) {
$location = $row['location'];

echo "<div >";
echo "<video src='".$location."' controls width='320px' height='200px' >";
echo "</div>"; }
}
?>