<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Supplier;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $from = date('d.m.Y',strtotime('first day of this month'));
        $to = date('d.m.Y',strtotime('last day of this month'));
        $orders = Order::whereBetween('created_at', [$from, $to])->get();
        $user = User::all();
        $supplier = Supplier::all();
        $orders_pending = Order::where('estado', '<', '5')->get();

        $no = count($orders);
        $nu = count($user);
        $ns = count($supplier);
        $nop = count($orders_pending);

        return view('myHome',['pedidos'=>$no,'clientes'=>$nu,'negocios'=>$ns,'pendientes'=>$nop]);
    }
}
