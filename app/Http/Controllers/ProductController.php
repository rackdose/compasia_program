<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductMasterList;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;

class ProductController extends Controller
{
    public function products () {
        $product = ProductMasterList::get();

        return response()->json($product);
    }

    public function saveExcelProduct(Request $request) {
        $path = $request->file('product_file')->getRealPath();
        Excel::import(new ProductImport, $path);
    }
}
