<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Stocks;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class PurchasesController extends Controller
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
        return view('purchases.index');
    }

    public function showNew()
    {
        return view('purchases.new');
    }

    public function saveNew(Request $request)
    {
        \Log::info("New purchase to save");

        $input = $request->except('_token');
//        $rulesArray = array(
//            'description'       => 'required|min:7',
//            'code'              => 'required|min:3',
//            'origin'            => 'required|alpha',
//            'unit_measure'      => 'required|alpha|max:5',
//            'price'             => 'required|numeric',
//            'brand'             => 'required|alpha'
//        );
//
//        \Log::info("Validate purchase information");
//        $validator = Validator::make($input, $rulesArray);

//        if ($validator->fails()){
//            \Log::warning('Error to validate purchase data - ' . $validator->errors());
//            return redirect()->back()->withInput();
//        }

        if (!Purchases::create($input)){
            return redirect()->back()->withInput();
        }

        return redirect()->route('purchases.index');

    }

}