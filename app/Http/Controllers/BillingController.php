<?php

namespace App\Http\Controllers;

use App\Billing;
use Illuminate\Http\Request;
use AppHttpControllersBaseController as BaseController;
use Validator;
use AppHttpResources\Billing as BillingResource;

class BillingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Billing::all();
        return view('billings.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('billings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $items = Billing::create($input);
        return redirect()->route('billings.index')
                ->with('¡Exito!','Billing creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billings  $billings
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
        $item = Billing::find($id);
        if (is_null($item)) {
            return $this->sendError('Billing not found.');
        }
        return $this->sendResponse(new BillingResource($item), 'Billing retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billings  $billings
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billings)
    {
        //
        return view('billings.edit',compact('billing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billings  $billings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billing $billing)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $billing->update($request->all());
        return redirect()->route('billings.index')
                ->with('¡Exito!','Billing actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billings  $billings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
        $billing->delete();
        return redirect()->route('billings.index')
                ->with('¡Exito!','El Billing se quito con éxito.');
    }
}
