<?php

namespace App\Exports;

use App\Models\Transactions\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportInvoices implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Invoice::whereUniversityId(\Auth::user()->selected_university->id)
            ->with(['paymentMethod','currency'])->get()->transform(function (Invoice $invoice){
                $status = $invoice->payment_status_name;
                $paymentMethod = $invoice->paymentMethod?->title ?? "N/A";
                return [
                    $invoice->created_at->toDayDateTimeString(),
                    'INV-'.$invoice->invoice_number,
                    $invoice->transaction_details,
                    $status,
                    $invoice->currency?->code ?? "",
                    $invoice->payable_amount,
                    $paymentMethod,
                    $invoice->payment_date?->toDateString() ?? ""
                ];
            });
    }

    public function headings(): array
    {
        return  ['Date','Invoice #','Transaction','Status','Currency','Amount','Payment Method','Payment Date'];
    }
}
