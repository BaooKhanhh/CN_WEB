<?php
// Đọc dữ liệu từ file CSV
$filename = "students.csv";
$sinhvien = [];

// Kiểm tra file có tồn tại không
if (file_exists($filename)) {
    // Mở file CSV
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc dòng đầu tiên (tiêu đề)
        $headers = fgetcsv($handle, 1000, ",");
        
        // Đọc từng dòng dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $sinhvien[] = array_combine($headers, $data);
        }
        fclose($handle);
    }
} else {
    die("Không tìm thấy file CSV!");
}
?>

<!DOCTYPE html>
<html lang="vi">
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        h1 {
            color: #5a5a5a;
            margin-bottom: 30px;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #343a40;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .text-center {
            text-align: center;
        }

        .no-data {
            color: #888;
            font-style: italic;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>Điểm trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sinhvien)): ?>
                    <?php foreach ($sinhvien as $sv): ?>
                        <tr>
                            <td><?= htmlspecialchars($sv['ID']) ?></td>
                            <td><?= htmlspecialchars($sv['Họ tên']) ?></td>
                            <td><?= htmlspecialchars($sv['Ngày sinh']) ?></td>
                            <td><?= htmlspecialchars($sv['Lớp']) ?></td>
                            <td><?= htmlspecialchars($sv['Điểm trung bình']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Không có dữ liệu</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>