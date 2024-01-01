<div>
    <div class="row">
        <div class="col-12">
            <div x-data="{ showFilters:false }" class="w-100">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between blue">
                        <div class="h5 blue">@lang('Invoices and Transactions')
                            | @lang('Event Credit Transaction')
                        @include('about-icon')</div>
{{--                        <button class="button-sm button-blue ">--}}
{{--                            Available balance $1,500.00 Top up your Account--}}
{{--                        </button>--}}
                    </div>
                </div>
            </div>
            <div class="card my-3 shadow-none">
                @if(!$invoices->isEmpty())

                <livewire:account.invoice-table-nav-tabs
                    export-excel-url="{{route('admin.account.export.excel.eventCredits')}}"
                    export-pdf-url="{{route('admin.account.export.pdf.eventCredits')}}"
                />
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
                            <td>@lang('Credit In')</td>
                            <td>@lang('Credit Out')</td>
                            <td>@lang('Balance')</td>
                        </tr>
                        <!--End Heading row-->
                        </thead>
                        <tbody>
                        @php
                            /**@var \Illuminate\Pagination\LengthAwarePaginator | \App\Models\Transactions\EventCreditTransaction[] $invoices*/
                        @endphp
                        @forelse($invoices as $invoice)
                            <!--Row Start-->
                            <tr>
                                <td>{{$invoice->created_at?->toDayDateTimeString()}}</td>
                                @if($invoice->is_reverse)
                                    <td> @lang('Revers Credit From:') {{$invoice->event?->fair_name}}</td>
                                @else
                                    <td>{{$invoice->event?->fair_name ?? $invoice->event_name}}</td>
                                @endif
                                <td>{{$invoice->credit_in}}</td>
                                <td>{{$invoice->credit_out}}</td>
                                <td>{{$invoice->balance}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"><label class="gray text-center w-100">@lang('No Data!')</label></td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
            {{--            @unless($invoices->hasPages())--}}
            {{--                {!! $invoices->links() !!}--}}
            {{--            @endunless--}}
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
