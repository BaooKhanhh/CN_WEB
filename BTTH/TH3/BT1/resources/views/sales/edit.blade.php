<!-- resources/views/sales/edit.blade.php -->
@extends('sales.master')

@section('content')
    <h2 class="mt-4">Edit Sale</h2>
    <form action="{{ route('sales.update', $sale->sale_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="medicine_id" class="form-label">Medicine ID</label>
            <input type="number" class="form-control" id="medicine_id" name="medicine_id" value="{{ $sale->medicine_id }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $sale->quantity }}" required>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date</label>
            <input type="datetime-local" class="form-control" id="sale_date" name="sale_date" value="{{ $sale->sale_date }}" required>
        </div>
        <div class="mb-3">
            <label for="customer" class="form-label">Customer</label>
            <input type="text" class="form-control" id="customer" name="customer" value="{{ $sale->customer }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Sale</button>
    </form>
@endsection
