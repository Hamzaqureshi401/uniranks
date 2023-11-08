<x-main-layout>
    <x-shared.general.main>
        @php
            /**
            * @var \App\Models\Transactions\Invoice $invoice
            * @var \App\Models\Transactions\InvoicePaymentReceipt $receipt
            */
        @endphp
        <div class="centered-content">
            <!-- Main Content -->
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <div class="h2 red text-center">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                        <div class="w-100 text-center red">@lang('Payment for invoice has been canceled.')</div>
                        <div class="w-100 text-center red">@lang('But you can pay any time, your order invoice is already generated.')</div>
                        <p class="w-100 light-blue text-center">
                            <a href="{{route('admin.account.viewInvoice',$invoice->id)}}"
                               class="a-underline blue"
                               target="_blank">
                                <i class="fa-solid fa-file-invoice-dollar"></i> @lang('you can view invoice here.')
                            </a>
                        </p>
                        <p class="text-center mt-2 ">
                            <a href="{{route('admin.account.invoicesList')}}" class="button-sm button-blue blue w-100 text-decoration-none">  @lang('Go Back')</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- end main content -->
        </div>
    </x-shared.general.main>
</x-main-layout>
