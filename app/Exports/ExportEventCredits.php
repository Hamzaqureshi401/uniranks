<?php

namespace App\Exports;

use App\Models\Transactions\EventCreditTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportEventCredits implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return EventCreditTransaction::selectUniversityBalance()->whereUniversityId(\Auth::user()->selected_university->id)->with('event')
            ->get()->transform(function (EventCreditTransaction $creditTransaction){
                $details = $creditTransaction->event?->fair_name ?? $creditTransaction->event_name;
                if ($creditTransaction->is_reverse){
                    $details = 'Revers Credit From:'.$creditTransaction->event?->fair_name;
                }
                return [
                    $creditTransaction->created_at?->toDayDateTimeString(),
                    $details,
                    $creditTransaction->credit_in ?: '0',
                    $creditTransaction->credit_out ?: '0',
                    $creditTransaction->balance ?: '0',
                ];
            });
    }

    public function headings(): array
    {
        return  ['Date','Transaction','Credit In','Credit Out','Balance'];
    }
}
