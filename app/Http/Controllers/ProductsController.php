<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class ProductsController extends Controller
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
        $products = Products::all();
        return view('products.index')->with('products', $products);
    }

    public function showNew()
    {
        return view('products.new');
    }

    public function saveNew(Request $request)
    {
        \Log::info("New product to save");

        $input = $request->except('_token');
        $rulesArray = array(
            'description'       => 'required|min:7',
            'code'              => 'required|min:3',
            'origin'            => 'required|alpha',
            'unit_measure'      => 'required|alpha|max:5',
            'price'             => 'required|numeric',
            'brand'             => 'required|alpha'
        );

        \Log::info("Validate product information");
        $validator = Validator::make($input, $rulesArray);

        if ($validator->fails()){
            \Log::warning('Error to validate product data - ' . $validator->errors());
            return redirect()->back()->withInput();
        }

        if (!Products::create($input)){
            return redirect()->back()->withInput();
        }

        return redirect()->route('products.index');

    }
}
