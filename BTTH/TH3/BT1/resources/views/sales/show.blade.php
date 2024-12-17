<!-- resources/views/sales/show.blade.php -->
@extends('sales.master')

@section('content')
    <h2 class="mt-4">Sale Details</h2>
    <table class="table table-bordered">
        <tr>
            <th>Sale ID</th>
            <td>{{ $sale->sale_id }}</td>
        </tr>
        <tr>
            <th>Medicine ID</th>
            <td>{{ $sale->medicine_id }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $sale->quantity }}</td>
        </tr>
        <tr>
            <th>Sale Date</th>
            <td>{{ $sale->sale_date }}</td>
        </tr>
        <tr>
            <th>Customer</th>
            <td>{{ $sale->customer }}</td>
        </tr>
    </table>
    <a href="{{ route('sales.edit', $sale->sale_id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('sales.destroy', $sale->sale_id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back to Sales List</a>
@endsection
