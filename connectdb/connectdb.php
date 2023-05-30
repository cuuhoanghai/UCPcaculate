<?php 
    $servername = "localhost"; // Tên máy chủ MySQL
    $username = "root"; // Tên người dùng MySQL
    $password = "your_password"; // Mật khẩu MySQL
    $database = "ucp"; // Tên cơ sở dữ liệu MySQL

    // Thiết lập kết nối
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Kiểm tra kết nối
    if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["FF"])) {
    $resultUCP = ((int)$Calculate + (int)$CalculateAc) * (double)$FF;
    $_SESSION["resultUCP"] = $resultUCP;

    // Truy vấn để chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO use case oint  (UUCW,UAW,VAF,Results) VALUES ('$Calculate', '$CalculateAc','$FF', '$resultUCP')";

    if (mysqli_query($conn, $sql)) {
    echo "Dữ liệu đã được lưu trữ thành công vào cơ sở dữ liệu.";
    } else {
    echo "Lỗi: " . mysqli_error($conn);
    }
    }
    }

    // Đóng kết nối
    mysqli_close($conn);
?>
