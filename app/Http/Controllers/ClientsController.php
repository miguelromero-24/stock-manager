<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\Tenders;
use Illuminate\Http\Request;
use Validator;

class ClientsController extends Controller
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
        $clients = Clients::all(['id', 'description', 'contact', 'telephone', 'email', 'status']);
        return view('clients.index')->with('clients', $clients);
    }

    public function showNew()
    {
        return view('clients.new');
    }

    public function saveNew(Request $request)
    {
        $input = $request->except('_token');
        $rulesArray = array(
            'description'       => 'required|min:5',
            'address'           => 'min:5',
            'contact'           => 'required|min:5',
            'email'             => 'required|email',
            'telephone'         => 'numeric',
        );

        \Log::info("Validate tender information");
        $validator = Validator::make($input, $rulesArray);

        if ($validator->fails()){
            \Log::warning('Error to validate login data - ' . $validator->errors());
            return redirect()->back()->withInput();
        }

        $input['status'] == 0 ? $input['status'] = true : $input['status'] = false;

        if (!Clients::create($input)){
            return redirect()->back()->withInput();
        }

        return route('clients.index');
    }
}