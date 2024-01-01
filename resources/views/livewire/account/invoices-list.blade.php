<div>
    <div class="row">
        <div class="col-12">
            <div x-data="{ showFilters:false }" class="w-100">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between blue">
                        <div class="h5 blue">@lang('Invoices and Transactions') | @lang('Invoices')
                        @include('about-icon')</div>
{{--                        <button class="button-sm button-blue ">--}}
{{--                            Available balance $1,500.00 Top up your Account--}}
{{--                        </button>--}}
                    </div>
                </div>
            </div>
            <div class="card my-3 shadow-none">
                @if(!$invoices->isEmpty())
                    <livewire:account.invoice-table-nav-tabs export-excel-url="{{route('admin.account.export.excel.invoices')}}"
                                                             export-pdf-url="{{route('admin.account.export.pdf.invoices')}}" />
                @else
                    <livewire:account.invoice-table-nav-tabs />
                @endif
                <div class="table-responsive">
                    <table class="table bg-light blue invoices-table">
                        <thead style="background: #f2f2f2">
                        <!--Heading Row-->
                        <tr>
                            <td>@lang('Date')</td>
                            <td>@lang('Transaction')</td>
                            <td>@lang('Invoice#')</td>
                            <td>@lang('Status')</td>
                            <td>@lang('Currency')</td>
                            <td>@lang('Amount')</td>
                            <td>@lang('Payment Method')</td>
                            <td>@lang('View')</td>
                            <td>@lang('Receipt')</td>
                        </tr>
                        <!--End Heading row-->
                        </thead>
                        <tbody>
                        @php
                            /**@var \Illuminate\Pagination\LengthAwarePaginator | \App\Models\Transactions\Invoice[] $invoices*/
                        @endphp
                        @forelse($invoices as $invoice)
                            <!--Row Start-->
                            <tr>
                                <td>{{$invoice->created_at?->toDayDateTimeString()}}</td>
                                <td>{{$invoice->transaction_details}}</td>
                                <td>{{$invoice->invoice_number}}</td>
                                <td>
                                    <a href="javascript:void(0)" class="{{$invoice->payment_status_color}}">{{$invoice->payment_status_name}}</a>
                                </td>
                                <td>{{$invoice->currency?->code}}</td>
                                <td>{{number_format($invoice->payable_amount,2)}}</td>
                                <td>{{$invoice->paymentMethod?->title}}</td>
                                <td><a href="{{route('admin.account.viewInvoice',$invoice->id)}}"
                                       class="text-decoration-none primary-text" target="_blank">
                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                    </a></td>
                                <td>
                                    @if($invoice->payment_status == AppConst::APPROVED && !empty($invoice->paymentReceipt))
                                        <a href="{{route('admin.account.viewReceipt',$invoice->paymentReceipt?->id)}}" class="text-decoration-none primary-text"
                                           target="_blank">
                                            <i class="fa-solid fa-receipt"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr><td colspan="9" ><label class="gray text-center w-100">@lang('No Data!')</label></td></tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
            @unless($invoices->hasPages())
                {!! $invoices->links() !!}
            @endunless
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
