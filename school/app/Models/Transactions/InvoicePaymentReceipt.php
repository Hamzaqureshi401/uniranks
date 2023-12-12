<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transactions\InvoicePaymentReceipt
 *
 * @property int $id
 * @property int|null $invoice_id
 * @property string $receipt_number
 * @property string|null $description
 * @property string|null $amount
 * @property int|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Transactions\Invoice|null $invoice
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt whereReceiptNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoicePaymentReceipt whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoicePaymentReceipt extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_id','receipt_number','description','amount','created_by_id'];

    public function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id');
    }
}
