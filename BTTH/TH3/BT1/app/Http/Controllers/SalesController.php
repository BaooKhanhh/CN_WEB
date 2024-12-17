<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesController extends Controller
{
    // Hiển thị danh sách các sale
    public function index()
    {
        // Paginate results for better performance
        $sales = Sales::paginate(10);  // Sử dụng phân trang
        return view('sales.index', compact('sales'));
    }

public function create()
{
    $medicines = Medicines::all();
    Log::info('Medicines:', $medicines->toArray());  // Ghi log danh sách thuốc
    return view('sales.create' , compact('medicines'));
}



// Lưu sale vào cơ sở dữ liệu
public function store(Request $request)
{
    // Validate dữ liệu
    $request->validate([
        'medicine_id' => 'required|exists:medicines,medicine_id',
        'quantity' => 'required|integer',
        'sale_date' => 'required|date',
        'customer' => 'nullable|string|max:255',
    ]);

    // Lưu thông tin sale mới
    Sales::create($request->all());

    // Quay lại trang danh sách hoặc trang chi tiết sale
    return redirect()->route('sales.index')->with('success', 'Sale created successfully!');
}


    // Hiển thị chi tiết một sale
    public function show(Sales $sale)
    {
        return view('sales.show', compact('sale'));
    }

    // Hiển thị form chỉnh sửa sale
    public function edit(Sales $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    // Cập nhật thông tin sale
    public function update(Request $request, Sales $sale)
    {
        // Validation input
        $request->validate([
            'medicine_id' => 'required|exists:medicines,medicine_id',
            'quantity' => 'required|integer',
            'sale_date' => 'required|date',
            'customer' => 'nullable|string|max:255',
        ]);

        // Cập nhật thông tin sale
        $sale->update($request->all());

        // Redirect về trang chi tiết của sale
        return redirect()->route('sales.show', $sale->sale_id)->with('success', 'Sale updated successfully!');
    }

    // Xóa sale khỏi cơ sở dữ liệu
    public function destroy(Sales $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully!');
    }
}
