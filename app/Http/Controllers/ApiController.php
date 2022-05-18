<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceHeaderResource;
use App\Models\InvoiceHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //

    public function task2($date,$status,$location){

        $invoiceHeaders = InvoiceHeader::where([
            ['date','=',$date],
            ['status','=',$status],
            ['location_id','=',$location],
        ])->with('invoiceLines')->get();


        return InvoiceHeaderResource::collection($invoiceHeaders);

    }


}
