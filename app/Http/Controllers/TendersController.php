<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\Tenders;
use DB;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
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

    public function edit($id)
    {
        \Log::info("Show specific tender - Id: {$id}");
        
        if ($tender = Tenders::find($id)){
            \Log::info("Tender {$id} found it!");
            return view('tender.new', compact('tender'));
        }else{
            \Log::warning("Tender {$id} not found");
            return redirect()->back()->with('error', 'Licitacion no encontrada');
        }
    }
    
    public function update($id, Request $request)
    {
        \Log::info("Update specific tender - Id: {$id}");
        $tender = Tenders::find($id);
        if ($tender->update($request)){
            \Log::info("Tender Updated: " . $tender->toArray());
            return redirect()->route('/')->with('success', 'Licitacion actualizada con exito');
        }else{
            \Log::warning("Error while updating tender - Id: {$id}");
            return redirect()->back()->with('error', 'Error al actualizar la Licitacion');
        }

    }

    public function destroy($id)
    {
        \Log::info("Deleting a given tender Id: {$id}");
        if ($tender = Tenders::find($id)){
            try {
                Tenders::destroy($id);
                \Log::info("Tender {$id} destroy");
                return redirect('tender')->with('success', 'Licitacion eliminada');
            }catch (Exception $e){
                \Log::warning("Erro trying to destroy given tender Id: {$id} " . $e->getMessage());
                return redirect()->back()->with('error', 'No se pudo eliminar el registro');
            }
        }else{
            \Log::warning("Tender Id: {$id} not found");
            return redirect()->back()->with('error', 'Licitacion no encontrada');
        }
    }
}
