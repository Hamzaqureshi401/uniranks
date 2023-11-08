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
                        <div class="h2 green text-center">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="w-100 text-center green h2">@lang('Thank you for your payment!')</div>
                        <p class="w-100 gray text-center ">@lang('Receipt for this transaction has been generated.')</p>
                        <p class="w-100 light-blue text-center">
                            <a href="{{route('admin.account.viewReceipt',$receipt?->id)}}"
                               class="a-underline blue"
                               target="_blank">
                                <i class="fa-solid fa-receipt"></i> @lang('you can view receipt here.')
                            </a>
                        </p>
                        <p class="text-center"> <b>@lang('Total amount')</b></p>
                        <p class="text-center h2 light-blue">
                            {{$invoice->currency?->code}} {{ number_format($invoice->payable_amount,2) }}
                        </p>
                        <p class="text-center"> <b>@lang('For Invoice#')</b></p>
                        <p class="text-center blue">
                            Inv-{{ $invoice->invoice_number }}
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
