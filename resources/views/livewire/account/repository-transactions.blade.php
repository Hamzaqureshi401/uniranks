<div>
    <div class="row">
        <div class="col-12">
            <div x-data="{ showFilters:false }" class="w-100">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between blue">
                        <div class="h5 blue">@lang('Invoices and Transactions') | @lang('Repository Transaction')</div>
{{--                        <button class="button-sm button-blue ">--}}
{{--                            Available balance $1,500.00 Top up your Account--}}
{{--                        </button>--}}
                    </div>
                </div>
            </div>
            <div class="card my-3 shadow-none">
                @if(!$invoices->isEmpty())
                    <livewire:account.invoice-table-nav-tabs export-excel-url="{{route('admin.account.export.excel.repositoryTransactions')}}"
                                                             export-pdf-url="{{route('admin.account.export.pdf.repositoryTransactions')}}"/>
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
                            <td>@lang('Avg UR Cost')</td>
                            <td>@lang('QTY')</td>
                            <td>@lang('UR Credit In')</td>
                            <td>@lang('UR Credit Out')</td>
                            <td>@lang('Balance')</td>
                        </tr>
                        <!--End Heading row-->
                        </thead>
                        <tbody>
                        @php
                            /**@var \Illuminate\Pagination\LengthAwarePaginator | \App\Models\Transactions\RepositoryTransaction[] $invoices*/
                        @endphp
                        @forelse($invoices as $invoice)
                            <!--Row Start-->
                            <tr>
                                <td>{{$invoice->created_at?->toDayDateTimeString()}}</td>
                                <td>{{$invoice->description}}</td>
                                <td>{{$invoice->avg_ur_cost}}</td>
                                <td>{{$invoice->quantity_purchased}}</td>
                                <td>{{$invoice->ur_credit_in}}</td>
                                <td>{{$invoice->ur_credit_out}}</td>
                                <td>{{$invoice->ur_balance}}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7"><label class="gray text-center w-100">@lang('No Data!')</label></td></tr>
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
