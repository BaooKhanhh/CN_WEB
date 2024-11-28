<?php include 'flowers.php' ?>
<!DOCTYPE html>
<html lang="vi">
    <style>
        /* Thêm vào file CSS riêng hoặc trong <style> */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
}

.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    color: #343a40;
    margin-bottom: 20px;
}

.navbar {
    background-color: #343a40;
}



.navbar-nav .nav-link:hover {
    color: #ffc107 !important;
}

.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.card-body {
    padding: 15px;
    text-align: center;
}

.card-title {
    font-size: 18px;
    font-weight: bold;
}

.card-text {
    color: #6c757d;
}

.table {
    margin-top: 30px;
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 15px;
    text-align: center;
    border: 1px solid #ddd;
}

.table th {
    background-color: #343a40;
    color: #ffffff;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

.table td img {
    max-width: 100px;
    height: auto;
}

.table .btn {
    margin: 2px;
}

.table .btn-sm {
    padding: 5px 10px;
}

.table .btn-warning {
    background-color: #ffc107;
    color: white;
}

.table .btn-warning:hover {
    background-color: #e0a800;
}

.table .btn-danger {
    background-color: #dc3545;
    color: white;
}

.table .btn-danger:hover {
    background-color: #c82333;
}

.text-end {
    text-align: right;
}

.text-end .btn-success {
    background-color: #28a745;
    color: white;
    padding: 8px 20px;
    font-size: 16px;
}

.text-end .btn-success:hover {
    background-color: #218838;
}
.customer-table {
    margin-top: 30px;
    width: 100%;
    border-collapse: collapse;
}

.customer-table th, .customer-table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}

.customer-table th {
    background-color: #007bff;
    color: white;
    font-size: 16px;
}

.customer-table td {
    color: #495057;
}

.customer-table .btn {
    margin: 2px;
}

.customer-table .btn-sm {
    padding: 5px 10px;
}

.customer-table .btn-info {
    background-color: #17a2b8;
    color: white;
}

.customer-table .btn-info:hover {
    background-color: #138496;
}

.customer-table .btn-danger {
    background-color: #dc3545;
    color: white;
}

.customer-table .btn-danger:hover {
    background-color: #c82333;
}

.customer-table tbody tr:hover {
    background-color: #f1f1f1;
}

    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Thanh điều hướng -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- Menu Khách -->
                        <li class="nav-item">
                            <a class="nav-link active" href="?mode=guest">Người dùng khách</a>
                        </li>
                        <!-- Menu Quản lý -->
                        <li class="nav-item">
                            <a class="nav-link" href="?mode=admin">Quản lý</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        // Kiểm tra chế độ (Khách hoặc Quản lý)
        $mode = isset($_GET['mode']) ? $_GET['mode'] : 'guest';

        if ($mode == 'guest') {
            // Chế độ khách: Hiển thị danh sách hoa
            echo '<h1 class="text-center">Danh sách các loài hoa</h1>';
            echo '<div class="row">';
            foreach ($flowers as $flower) {
                echo '<div class="col-md-4">';
                echo '<div class="card mb-4">';
                echo '<img src="' . $flower['image'] . '" class="card-img-top" alt="' . $flower['name'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $flower['name'] . '</h5>';
                echo '<p class="card-text">' . $flower['description'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } elseif ($mode == 'admin') {
            // Chế độ quản lý: Hiển thị bảng quản lý hoa
            echo '<h2 class="text-center">Quản lý danh sách hoa</h2>';
            echo '<div class="text-end mb-3">';
            echo '<a href="add.php" class="btn btn-success">Thêm mới</a>';
            echo '</div>';
            echo '<table class="table table-bordered">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>Tên hoa</th>';
            echo '<th>Mô tả</th>';
            echo '<th>Ảnh</th>';
            echo '<th>Hành động</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($flowers as $index => $flower) {
                echo '<tr>';
                echo '<td>' . ($index + 1) . '</td>';
                echo '<td>' . $flower['name'] . '</td>';
                echo '<td>' . $flower['description'] . '</td>';
                echo '<td><img src="' . $flower['image'] . '" alt="' . $flower['name'] . '" style="width: 100px;"></td>';
                echo '<td>';
                echo '<a href="edit.php?id=' . $index . '" class="btn btn-primary btn-sm">Sửa</a>';
                echo '<a href="delete.php?id=' . $index . '" class="btn btn-danger btn-sm">Xóa</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>