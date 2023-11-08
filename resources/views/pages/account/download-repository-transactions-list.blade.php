@php
    if(empty($title)){
        $title  = null;
    }
@endphp
<x-print-layout :title="$title">
    <div class="row">
        <div class="col-12">
            @php
                /**
                * @var  \App\Models\Transactions\RepositoryTransaction[] $invoices
                * @var \App\Models\Institutes\University $bill_to
                *
               */
            @endphp
            <table style="width: 100%">
                <tbody>
                <tr>
                    <td style="width: 35%; vertical-align: baseline">
                        <img src="{{AppConst::SITE_LOGOS}}/Logo-stars-v1.png" style="width: 100%">
                    </td>
                    <td style="text-align: right">
                        <h1 class="h1"><b>@lang('Repository Transactions')</b></h1>
                        <p class="h4">@lang('Date:'){{now()->toDateString()}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 35%">
                        <h4 class="h4"><b>@lang('UNIRANKS Inc')</b></h4>
                        <p class="h5" style="margin-bottom: 0; margin-top: 0;">@lang('USA, New York')</p>
                        <p class="h5"
                           style="margin-bottom: 0; margin-top: 0;">@lang('1330 Avenue of the Americas, 23rd Floor New York, NY 10019')</p>
                        <p class="h5" style="margin-bottom: 0; margin-top: 0;">1212 653 0628</p>
                    </td>
                    <td style="text-align: right">
                        <h4 class="h4"><b>@lang('For')</b></h4>
                        <p class="h5">{{$bill_to?->translated_name ?: $bill_to?->university_name}}</p>
                        <p class="h5">{{$bill_to->country?->translated_name ?: $bill_to->country?->country_name}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%; border: solid 1px #ccced0; border-collapse: collapse">
                            <thead style="background: #1c345a !important; print-color-adjust: exact">
                            <!--Heading Row-->
                            <tr style="background: #1c345a !important; ">
                                <td style="color: white; padding: .5rem .5rem;">@lang('Date')</td>
                                <td style="color: white; padding: .5rem .5rem;">@lang('Transaction')</td>
                                <td style="color: white; padding: .5rem .5rem;">@lang('Avg UR Cost')</td>
                                <td style="color: white; padding: .5rem .5rem;">@lang('QTY')</td>
                                <td style="color: white; padding: .5rem .5rem;">@lang('UR Credit In')</td>
                                <td style="color: white; padding: .5rem .5rem;">@lang('UR Credit Out')</td>
                                <td style="color: white; padding: .5rem .5rem;">@lang('Balance')</td>
                            </tr>
                            <!--End Heading row-->
                            </thead>
                            <tbody>
                            @forelse($invoices as $invoice)
                                <!--Row Start-->
                                <tr>
                                    <td style="padding: .5rem .5rem;
                                 border-bottom: 1px solid #ccced0;">{{$invoice->created_at?->toDayDateTimeString()}}</td>
                                    <td style="padding: .5rem .5rem;
                                 border-bottom: 1px solid #ccced0;">{{$invoice->description}}</td>
                                    <td style="padding: .5rem .5rem;
                                 border-bottom: 1px solid #ccced0;">{{$invoice->avg_ur_cost}}</td>
                                    <td style="padding: .5rem .5rem;
                                 border-bottom: 1px solid #ccced0;">{{$invoice->quantity_purchased}}</td>
                                    <td style="padding: .5rem .5rem;
                                 border-bottom: 1px solid #ccced0;">{{$invoice->ur_credit_in}}</td>
                                    <td style="padding: .5rem .5rem;
                                 border-bottom: 1px solid #ccced0;">{{$invoice->ur_credit_out}}</td>
                                    <td style="padding: .5rem .5rem;
                                 border-bottom: 1px solid #ccced0;">{{$invoice->ur_balance}}</td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">
                        <div class="footer-space">&nbsp;</div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</x-print-layout>
