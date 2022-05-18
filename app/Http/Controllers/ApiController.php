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

    public function task3($location){

        return DB::table('invoice_headers')
            ->leftJoin('invoice_lines', 'invoice_headers.id', '=', 'invoice_lines.invoice_header_id')
            ->where('location_id','=',$location)
            ->selectRaw('SUM(value) as value_sum, status')
            ->groupBy('status')
            ->get();
    }
}
