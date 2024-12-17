@extends('sales.master')

@section('content')
    <div class="container">
        <h2>Create Sale</h2>
        
        <!-- Hiển thị thông báo lỗi nếu có -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="medicine_id">Medicine</label>
                <select name="medicine_id" class="form-control" required>
                    <option value="">Select Medicine</option>
                    @foreach($medicines as $medicine)
                        <option value="{{ $medicine->medicine_id }}">{{ $medicine->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sale_date">Sale Date</label>
                <input type="date" name="sale_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="customer">Customer</label>
                <input type="text" name="customer" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save Sale</button>
        </form>
    </div>
@endsection
