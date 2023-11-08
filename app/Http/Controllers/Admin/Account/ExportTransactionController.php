<?php

namespace App\Http\Controllers\Admin\Account;

use App\Exports\ExportEventCredits;
use App\Exports\ExportInvoices;
use App\Exports\ExportRepositoryTransactions;
use App\Http\Controllers\Controller;
use App\Models\Transactions\EventCreditTransaction;
use App\Models\Transactions\Invoice;
use App\Models\Transactions\RepositoryTransaction;
use Carbon\Carbon;

class ExportTransactionController extends Controller
{

    public function exportInvoices()
    {
        $export_file_name = "ur_invoices_list_" . Carbon::now()->timestamp . ".xlsx";
        return \Excel::download(new ExportInvoices(), $export_file_name);
    }

    public function exportEventCredits()
    {
        $export_file_name = "ur_event_credits_list_" . Carbon::now()->timestamp . ".xlsx";
        return \Excel::download(new ExportEventCredits(), $export_file_name);
    }

    public function exportRepositoryTransactions()
    {
        $export_file_name = "ur_repository_transaction_list_" . Carbon::now()->timestamp . ".xlsx";
        return \Excel::download(new ExportRepositoryTransactions(), $export_file_name);
    }

    public function exportInvoicesPdf()
    {
        $invoices = Invoice::whereUniversityId(\Auth::user()->selected_university->id)
            ->with(['paymentMethod', 'currency'])->get();
        $bill_to = \Auth::user()->selected_university;
        $title = \Str::snake($bill_to->university_name) . "_Invoices_List";
        return view('pages.account.download-invoices-list', compact('invoices','title','bill_to'));
    }

    public function exportEventCreditsPdf()
    {
        $invoices = EventCreditTransaction::selectUniversityBalance()->whereUniversityId(\Auth::user()->selected_university->id)->with('event')->get();
        $bill_to = \Auth::user()->selected_university;
        $title = \Str::snake($bill_to->university_name) . "_Event_Credits_List";
        return view('pages.account.download-event-credits-list', compact('invoices','title','bill_to'));
    }

    public function exportRepositoryTransactionsPdf()
    {
        $invoices = RepositoryTransaction::selectUniversityBalance()->whereUniversityId(\Auth::user()->selected_university->id)->get();
        $bill_to = \Auth::user()->selected_university;
        $title = \Str::snake($bill_to->university_name) . "_Repository_Transactions_List";
        return view('pages.account.download-repository-transactions-list', compact('invoices','title','bill_to'));

    }
}
