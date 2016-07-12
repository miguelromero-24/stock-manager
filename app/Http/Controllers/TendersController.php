<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\Tenders;
use DB;
use Illuminate\Http\Request;
use Validator;

class TendersController extends Controller
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
        $allTenders = DB::table('tenders')
                    ->join('clients', 'clients.id', '=', 'tenders.client_id')
                    ->selectRaw('tenders.id, tenders.description, clients.description as clientes,
                    tenders.contract_number, tenders.tender_type, tenders.date_start, tenders.date_end')
                    ->get();
        return view('tenders.index')->with('tenders', $allTenders);
    }

    public function showNew()
    {
        $clients = Clients::all(['description', 'id']);
        $clientsJson = json_encode($clients);
        $clients = 0;
        return view('tenders.new', compact('clientsJson', 'clients'));
    }

    public function saveNew(Request $request)
    {
        \Log::info("New tender to save");

        $input = $request->except('_token');
        $rulesArray = array(
            'description'       => 'required|min:7',
            'contract_number'   => 'required|min:3',
            'date_start'        => 'required|date',
            'date_end'          => 'required|date',
            'awarded_amount'    => 'required|numeric'
        );

        \Log::info("Validate tender information");
        $validator = Validator::make($input, $rulesArray);

        if ($validator->fails()){
            \Log::warning('Error to validate login data - ' . $validator->errors());
            return redirect()->back()->withInput();
        }

        if (!Tenders::create($input)){
            return redirect()->back()->withInput();
        }

        return route('tender.index');

    }
}
