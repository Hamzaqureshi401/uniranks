<?php

namespace App\Exports;

use App\Models\Transactions\RepositoryTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportRepositoryTransactions implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RepositoryTransaction::selectUniversityBalance()->whereUniversityId(\Auth::user()->selected_university->id)->get()->transform(function (RepositoryTransaction $transaction){
                return [
                    $transaction->created_at?->toDayDateTimeString(),
                    $transaction->description,
                    $transaction->avg_ur_cost ?: '0',
                    $transaction->quantity_purchased ?: '0',
                    $transaction->ur_credit_in ?: '0',
                    $transaction->ur_credit_out ?: '0',
                    $transaction->ur_balance ?: '0',
                ];
            });
    }

    public function headings(): array
    {
        return  ['Date','Transaction','Avg UR Cost','QTY','UR Credit In','UR Credit Out','Balance'];

    }
}
