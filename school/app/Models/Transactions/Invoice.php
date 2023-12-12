<?php

namespace App\Models\Transactions;

use App\Models\General\BankAccount;
use App\Models\General\Currency;
use App\Models\General\PaymentMethod;
use App\Models\Institutes\Agent;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transactions\Invoice
 *
 * @property int $id
 * @property int|null $agent_id
 * @property int|null $university_id
 * @property string|null $transaction_details
 * @property string|null $qty
 * @property string|null $invoice_number
 * @property string|null $ref_id
 * @property string $full_amount
 * @property string $discount
 * @property string $payable_amount
 * @property int|null $currency_id
 * @property int|null $payment_method_id
 * @property int $payment_status 0->unpaid
 * @property \Illuminate\Support\Carbon|null $due_date
 * @property \Illuminate\Support\Carbon|null $payment_date
 * @property string|null $payment_proof_document_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by_id
 * @property int|null $processed_by_id
 * @property string|null $remarks
 * @property string|null $discount_percentage
 * @property string|null $tax
 * @property string|null $tax_percentage
 * @property string|null $processing_fee
 * @property string|null $processing_fee_percentage
 * @property string|null $ur_credit
 * @property string|null $events_credit
 * @property string|null $admissions_credit
 * @property int|null $bank_account_id
 * @property-read BankAccount|null $bankAccount
 * @property-read User|null $createdBy
 * @property-read Currency|null $currency
 * @property-read mixed $payment_proof_document_url
 * @property-read mixed $payment_status_color
 * @property-read mixed $payment_status_footer_text
 * @property-read mixed $payment_status_name
 * @property-read PaymentMethod|null $paymentMethod
 * @property-read \App\Models\Transactions\InvoicePaymentReceipt|null $paymentReceipt
 * @property-read User|null $processedBy
 * @property-read University|null $university
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereAdmissionsCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereBankAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereEventsCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereFullAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePayableAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaymentProofDocumentPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereProcessedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereProcessingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereProcessingFeePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTaxPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTransactionDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUniversityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUrCredit($value)
 * @property int|null $package_id
 * @property-read Agent|null $agent
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePackageId($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['university_id','agent_id','transaction_details','invoice_number','ref_id',
        'full_amount','discount','payable_amount','created_by_id','processed_by_id','remarks','qty',
        'discount_percentage','tax','tax_percentage','processing_fee','processing_fee_percentage',
        'ur_credit','events_credit','admissions_credit','currency_id','payment_method_id','payment_status',
        'due_date','payment_date','payment_proof_document_path','due_date','bank_account_id','package_id'];

    protected $casts = ['due_date'=>'datetime','payment_date'=>'datetime'];
    protected $appends = ['payment_proof_document_url','payment_status_color','payment_status_name','payment_status_footer_text'];

    public function getPaymentProofDocumentUrlAttribute(){
        return \AppConst::CDN_PATH.'/'.$this->payment_proof_document_path;
    }
    public function getPaymentStatusColorAttribute(){
        return match ($this->payment_status){
            \AppConst::PENDING, \AppConst::REJECTED =>'red',
            \AppConst::APPROVED=>'green',
            \AppConst::UNDER_REVIEW=>'light-blue',
            default => 'blue',
        };
    }
    public function getPaymentStatusNameAttribute(){
        return match ($this->payment_status){
            \AppConst::APPROVED=>'Paid',
            \AppConst::UNDER_REVIEW=>'Under Review',
            \AppConst::REJECTED=>'Rejected',
            default => 'Unpaid',
        };
    }
    public function getPaymentStatusFooterTextAttribute(){
        return match ($this->payment_status){
            \AppConst::APPROVED=>__('The system has generated this invoice, and it has already been marked as paid.'),
            \AppConst::UNDER_REVIEW=>__('The system has generated this invoice is under review for payment.'),
            \AppConst::REJECTED=>__('The system has generated this invoice payment is rejected.'),
            default => __("This invoice has been generated by the system and currently has an unpaid status. The
                                payment is due.")."<br>".__('The validity of this invoice extends for a period of 30 days starting from').$this->due_date?->toDateString(),
        };
    }
    public function agent(){
        return $this->belongsTo(Agent::class,'agent_id');
    }

    public function bankAccount(){
        return $this->belongsTo(BankAccount::class,'bank_account_id');
    }
    public function currency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }
    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }

    public function university(){
        return $this->belongsTo(University::class,'university_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by_id');
    }
    public function processedBy(){
        return $this->belongsTo(User::class,'processed_by_id');
    }

    public function paymentReceipt(){
        return $this->hasOne(InvoicePaymentReceipt::class,'invoice_id');
    }
}
