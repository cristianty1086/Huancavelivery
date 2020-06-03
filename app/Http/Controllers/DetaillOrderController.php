<?php

namespace App\Http\Controllers;

use App\DetaillOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use AppHttpResources\DetaillOrder as DetaillOrderResource;

class DetaillOrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = DetaillOrder::all();
        return view('detaill_orders.index',['data' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('detaill_orders.create');
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
        $items = DetaillOrder::create($input);
        return redirect()->route('detaill_orders.index')
                ->with('�Exito!','DetaillOrder creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetaillOrder  $detaillOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DetaillOrder $detaillOrder)
    {
        //
        $item = DetaillOrder::find($id);
        if (is_null($item)) {
            return $this->sendError('DetaillOrder not found.');
        }
        return $this->sendResponse(new DetaillOrderResource($item), 'DetaillOrder retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetaillOrder  $detaillOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DetaillOrder $detaillOrder)
    {
        //
        return view('detaill_orders.edit',compact('detaillOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetaillOrder  $detaillOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetaillOrder $detaillOrder)
    {
        //
        $input = $request->all();
        $request->validate([
        ]);
        $detaillOrder->update($request->all());
        return redirect()->route('detaill_orders.index')
                ->with('�Exito!','DetaillOrder actualizado con �xito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetaillOrder  $detaillOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetaillOrder $detaillOrder)
    {
        //
        $detaillOrder->delete();
        return redirect()->route('detaill_orders.index')
                ->with('�Exito!','El DetaillOrder se quito con �xito.');
    }
}
