<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'invoice_lines';

    public function invoiceHeader(){
        return $this->belongsTo(InvoiceHeader::class);
    }
}
