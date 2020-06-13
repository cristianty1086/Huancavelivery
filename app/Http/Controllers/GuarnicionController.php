<?php

namespace App\Http\Controllers;

use App\Guarnicion;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use AppHttpResources\Guarnicion as GuarnicionResource;


class GuarnicionController extends BaseController
{
    //

    /**
     * Display a listing of the resource para un supplier
     *
     * @return \Illuminate\Http\Response
     */
    public function lista($supplier_id)
    {
        //
        $rows = Guarnicion::where('supplier_id',$supplier_id)->get();
        return view('guarniciones.index',['data' => $rows]);
    }
}
