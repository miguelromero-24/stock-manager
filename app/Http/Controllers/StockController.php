<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Stocks;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class StockController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stocks = \DB::table('stocks')->join('products', 'products.id', '=', 'stocks.product_id')
                ->selectRaw('stocks.*, products.description as description, products.brand')->get();
        return view('stock.index')->with('stocks', $stocks);
    }

}