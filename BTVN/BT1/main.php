<?php
// Start session để lưu danh sách nhân viên
session_start();

if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['ten'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['diachi'] ?? '');
    $phone = trim($_POST['sdt'] ?? '');

    // Thêm thông tin vào danh sách nếu tất cả trường không rỗng
    if ($name && $email && $address && $phone) {
        $_SESSION['list'][] = [
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'phone' => $phone
        ];
    }

    // Chuyển hướng để tránh resubmission khi reload trang
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


$list_table = $_SESSION['list'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./assets/css/bai_5_2.css">
    <title>Form_Jquery_Validate</title>
</head>

<body>
    <div class="container">

        <?php require 'header.php'; ?>
        <?php require 'section-one.php'; ?>

        <button type="button" class="btn btn-success mt-5 mb-2">Thêm mới</button>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                   
                </tr>
            </thead>

            <tbody>
                <?php foreach ($list_table as $index => $employee): ?>
                    <tr>
                        <!-- <td><?= htmlspecialchars($employee['name']) ?></td>
                        <td><?= htmlspecialchars($employee['email']) ?></td> -->
                        <td>Sản phẩm 1</td>
                        <td><i class="fa-regular fa-pen-to-square"></i></td>
                        <td><i class="fa-solid fa-trash"></i></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                        
                        <td>Sản phẩm 1</td>
                        <td>1000 VND</td>
                        <td><i class="fa-regular fa-pen-to-square"></i></td>
                        <td><i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        
                        <td>Sản phẩm 2</td>
                        <td>1000 VND</td>
                        <td><i class="fa-regular fa-pen-to-square"></i></td>
                        <td><i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        
                        <td>Sản phẩm 2</td>
                        <td>1000 VND</td>
                        <td><i class="fa-regular fa-pen-to-square"></i></td>
                        <td><i class="fa-solid fa-trash"></i></td>
                    </tr>
            </tbody>
        </table>

    </div>

    <?php include 'footer.php'; ?>

    <?php require 'modal.php'; ?>

    <script src="./assets/js/bai_5_2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.3/jquery.validate.min.js"></script>
</body>

</html>