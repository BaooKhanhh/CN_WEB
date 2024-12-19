<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Table with Add and Delete Row Feature</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
    
        .table-wrapper {
            width: 90%; /* Tăng chiều rộng của bảng */
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            border-radius: 10px; /* Thêm bo tròn góc cho bảng */
        }
    
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
    
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
    
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
    
        .table-title .add-new i {
            margin-right: 4px;
        }
    
        table.table {
            width: 100%; /* Đảm bảo bảng chiếm 100% chiều rộng */
            table-layout: auto; /* Cho phép tự động điều chỉnh kích thước cột */
            border-collapse: collapse; /* Đảm bảo các đường viền cột không bị chồng lên nhau */
        }
    
        table.table tr th,
        table.table tr td {
            padding: 20px 15px; /* Cách đều các ô trong bảng */
            border-color: #e9e9e9;
            text-align: center; /* Căn giữa nội dung của các ô */
        }
    
        table.table th {
            background-color: #f2f2f2; /* Màu nền cho các ô tiêu đề */
            font-weight: bold;
        }
    
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
    
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }
    
        table.table td a.add {
            color: #27C46B;
        }
    
        table.table td a.edit {
            color: #FFC107;
        }
    
        table.table td a.delete {
            color: #E34724;
        }
    
        table.table td i {
            font-size: 19px;
        }
    
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }
    
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
    
        table.table .form-control.error {
            border-color: #f50000;
        }
    
        .table td a.edit,
        .table td form {
            display: inline-block;
            margin-right: 5px;
        }
    
        .table td form button.delete {
            background-color: #E34724;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    
        .table td form button.delete:hover {
            background-color: #c63c20;
        }
    
        .table td a.edit button {
            background-color: #FFC107;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    
        .table td a.edit button:hover {
            background-color: #e0a800;
        }
        .table-wrapper {
            width: 100%; /* Chiều rộng của bảng sẽ chiếm toàn bộ không gian có sẵn */
            overflow-x: auto; /* Cho phép cuộn ngang khi bảng quá rộng */
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            border-radius: 10px;
        }
        @media (max-width: 768px) {
            .table-wrapper {
                padding: 10px; /* Điều chỉnh padding khi thu nhỏ */
            }
        
            table.table {
                font-size: 12px; /* Giảm kích thước chữ khi màn hình nhỏ */
            }
        
            table.table tr th, 
            table.table tr td {
                padding: 10px 15px; /* Giảm padding khi màn hình nhỏ */
            }
        }
    </style>
    
</head>

<body>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Quản lý Đồ án sinh viên</h2>
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route('Issues.create') }}"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                        </div>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif


                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Reporter_by</th>
                            <th>Reporter_date</th>
                            <th>Description</th>
                            <th>Urgency</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($issues as $item)
                        <tr>
                            <td>{{ $item->computer->computer_name }}</td> 
                            <td>{{ $item->reporter_by }} VND</td> 
                            <td>{{ date('d/m/Y H:i', strtotime($item->reporter_date)) }}</td> <!-- Ngày bán (định dạng ngày) -->
                            <td>{{ $item->description }}</td> 
                            <td>{{ $item->urgency }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('Issues.edit', $item->id) }}" class="edit" title="Edit">
                                    <button type="button">Edit</button>
                                </a>
                                <button style="background:red" class="delete" type="button" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $item->id }}">Delete</button>
                            </td>

                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-center">
                    {{ $issues->links('pagination::bootstrap-4') }}
                </div>
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc chắn muốn xoá dữ liệu?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                <form id="deleteForm" method="POST" action="" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    <script>
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var deleteId = button.data('id'); // Extract info from data-* attributes
            var action = '/issues/' + deleteId; // URL to delete the issue

            // Set the action for the form in the modal
            $('#deleteForm').attr('action', action);
        });
        
        
    </script>
</body>

</html>