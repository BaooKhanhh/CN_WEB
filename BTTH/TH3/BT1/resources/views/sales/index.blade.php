<!-- resources/views/sales/index.blade.php -->
@extends('sales.master')

@section('content')
    <h2 class="mt-4">Sales List</h2>
    <a href="{{ route('sales.create') }}"><button>add</button></a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sale ID</th>
                <th>Medicine ID</th>
                <th>Quantity</th>
                <th>Sale Date</th>
                <th>Customer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->sale_id }}</td>
                    <td>{{ $sale->medicine_id }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->sale_date }}</td>
                    <td>{{ $sale->customer }}</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->sale_id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('sales.edit', $sale->sale_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sales.destroy', $sale->sale_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination links -->
    {{ $sales->links('pagination::bootstrap-4') }}
@endsection
