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
                * @var \App\Models\Transactions\Invoice $invoice
                */
                $bill_to = $invoice->university;
            @endphp
            <table style="width: 100%">
                <tr>
                    <td style="width: 35%; vertical-align: baseline">
                        <img src="{{AppConst::SITE_LOGOS}}/Logo-stars-v1.png" style="width: 100%">
                    </td>
                    <td style="text-align: right">
                        <h3 class="h1"><b>@lang('Invoice')</b></h3>
                        <p class="h4" style="margin-bottom: 0; margin-top: 0;"># INV-{{$invoice->invoice_number}}</p>
                        <p class="h4" style="margin-bottom: 0; margin-top: 0;">@lang('Account ID'): {{$invoice->created_by_id}}</p>
                        <p class="h4" style="color:red;">@lang($invoice->payment_status_name)</p>
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
                        <h4 class="h4"><b>@lang('Bill To')</b></h4>
                        <p class="h5"
                           style="margin-bottom: 0; margin-top: 0;">{{$bill_to?->translated_name ?: $bill_to?->university_name}}</p>
                        <p class="h5"
                           style="margin-bottom: 0; margin-top: 0;">{{$bill_to->country?->translated_name ?: $bill_to->country?->country_name}}</p>
                        <p class="h5" style="margin-bottom: 0; margin-top: 0;">@lang('Invoice Date')
                            : {{$invoice->created_at?->toDateString()}}</p>
                        @if($invoice->payment_status == AppConst::PENDING)
                            <p class="h5">@lang('Due Date'): {{$invoice->due_date->toDateString()}}</p>
                        @else
                            <p class="h5">@lang('Payment Date'): {{$invoice->payment_date->toDateString()}}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%; border: solid 1px #ccced0; border-collapse: collapse">
                            <thead style="background: #1c345a !important; print-color-adjust: exact">
                            <!--Heading Row-->
                            <tr style="background: #1c345a !important; ">
                                <td style="width: 10%; color: white; padding: .5rem .5rem;
                                 border-bottom-width: 1px; background: #1c345a ;print-color-adjust: exact">#
                                </td>
                                <td style="width: 40%; color: white; padding: .5rem .5rem;
                                 border-bottom-width: 1px;">@lang('Item')</td>
                                <td style="text-align: right; color: white;  padding: .5rem .5rem;
                                 border-bottom-width: 1px;">@lang('QTY')</td>
                                <td style="text-align: right; color: white;  padding: .5rem .5rem;
                                 border-bottom-width: 1px;">@lang('Rate')</td>
                                <td style="text-align: right; color: white;  padding: .5rem .5rem;
                                 border-bottom-width: 1px;">@lang('Discount')</td>
                                <td style="text-align: right; color: white;  padding: .5rem .5rem;
                                 border-bottom-width: 1px;">@lang('Amount')</td>
                            </tr>
                            <!--End Heading row-->
                            </thead>
                            <tbody>
                            <!--Row Start-->
                            <tr>
                                <td style="padding: .5rem .5rem;
                                 border-bottom-width: 1px;">1
                                </td>
                                <td>{{$invoice->transaction_details}}</td>
                                <td style="text-align: right;  padding: .5rem .5rem;
                                 border-bottom-width: 1px; ">{{$invoice->qty}}</td>
                                <td style="text-align: right; padding: .5rem .5rem;
                                 border-bottom-width: 1px;">{{number_format($invoice->full_amount,2)}}</td>
                                <td style="text-align: right; padding: .5rem .5rem;
                                 border-bottom-width: 1px;">{{number_format($invoice->discount,2)}}</td>
                                <td style="text-align: right; padding: .5rem .5rem;
                                 border-bottom-width: 1px;">{{number_format(($invoice->full_amount-$invoice->discount),2)}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">
                        <table class="table primary-text w-100" style="width: 100%">
                            <tbody class="border-collapse" style="text-align: right">
                            <tr>
                                <td style="width: 75%; text-align: right;"><b>@lang('Sub Total'):</b></td>
                                <td class="text-end h5"
                                    style="text-align: right;">{{number_format(($invoice->full_amount-$invoice->discount),2)}} {{$invoice->currency?->code}}</td>
                            </tr>
                            <tr>
                                <td class="h5 text-end w-70" style="width: 75%; text-align: right;"><b>@lang('TAX'):</b>
                                </td>
                                <td class="text-end h5"
                                    style="text-align: right;">{{number_format($invoice->tax,2)}}</td>
                            </tr>
                            <tr>
                                <td class="h5 text-end w-70" style="width: 75%; text-align: right;">
                                    <b>@lang('Processing Fee'):</b></td>
                                <td class="text-end h5"
                                    style="text-align: right;">{{number_format($invoice->processing_fee,2)}} {{$invoice->currency?->code}}</td>
                            </tr>
                            <tr>
                                <td class="h5 text-end w-70" style="width: 75%; text-align: right;">
                                    <b>@lang('Due Amount'):</b></td>
                                <td class="text-end h5"
                                    style="text-align: right;">{{number_format($invoice->payable_amount,2)}} {{$invoice->currency?->code}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                @if($invoice->payment_status == AppConst::PENDING)
                    <tr>
                        <td style="vertical-align: baseline; width: 50%">
                            <p class="h5" style="margin-bottom: 0; margin-top: 0;"><b>@lang('Bank deposit')</b></p>
                            <p class="" style="">
                                <b>@lang('To complete your transfer, go to your online bank and transfer')
                                    {{number_format($invoice->payable_amount,2)}} {{$invoice->currency?->code}} @lang('using the account details below')</b>
                            </p>
                            <p class="mb-0" style="margin-bottom: 0;">@lang('Our bank details for payments in USD')</p>
                            <p style="margin-top: 0;">@lang('Please transfer the money from a bank account in your name')</p>
                            <p class="mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('Account Name'):</b> UNIRANKS Inc</p>
                            <p class="mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('Bank Account Number'):</b> 822000685692
                            </p>
                            <p class="mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('SWIFT Code'):</b> CMFGUS33</p>
                            <p class="mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('Account Location'):</b> United States
                            </p>
                            <p class="mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('Account Type'):</b> Checkingc</p>
                            <p class="mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('Bank Name'):</b> Community Federal
                                Savings Bank</p>
                            <p class="mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('Bank Address'):</b> 30 W. 26th Street,
                                Sixth Floor</p>
                            <p class="mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('City'):</b> New York NY 10010</p>
                            <p class="mt-3 mb-0" style="margin-bottom: 0; margin-top: 0;"><b>@lang('Reference ID')
                                    :</b> {{$invoice->ref_id}}</p>
                            <p style="margin-bottom: 0; margin-top: 0;">
                                (@lang('Please use this unique ID to transfer your money to UNIRANKS Inc')
                                )</p>
                            <p>@lang('This ID is unique and helps us locate and process your transfer faster. Please make sure to use this reference ID when you make your transfer')</p>
                            <p style="margin-bottom: 0; margin-top: 0;">@lang("Note: Any transaction fees will be deducted from the total transfer amount. We'll
                                        credit your balance, once we receive the funds, on the next business day. If you
                                        have any questions,")
                                @lang('please contact') <a href="mailto:billing@uniranks.com"
                                                           class="blue">@lang('billing@uniranks.com')</a>
                            </p>
                        </td>
                        <td style="vertical-align: bottom; width: 50%">
                            <table style="width: 100%">
                                <tr>
                                    <td>
                                        <img src="{{AppConst::ICONS}}/payment/lock.svg"
                                             style="width: 30px; height: 30px; background-color: white">
                                        <label>@lang('Guaranteed')<b>@lang('Safe & Secure') </b> @lang('Checkout')
                                        </label>
                                    </td>
                                    <td style="text-align: right">
                                        <label
                                            style="background-color:#1c345a; print-color-adjust: exact;font-weight: 400 !important;padding: 0.4rem;border-radius: 0.313rem; text-align: center !important;color: white !important;">@lang('Powered By')
                                            <b>@lang("stripe")</b></label>
                                    </td>
                                </tr>
                            </table>
                            <table style="width: 100%">
                                <tr>
                                    <td class="col">
                                        <img src="{{AppConst::ICONS}}/payment/cc-visa.svg" style="width: 50px">
                                    </td>
                                    <td class="col">
                                        <img src="{{AppConst::ICONS}}/payment/master-card.svg" style="width: 50px">
                                    </td>
                                    <td class="col">
                                        <img src="{{AppConst::ICONS}}/payment/american-express.svg" style="width: 50px">
                                    </td>
                                    <td class="col">
                                        <img src="{{AppConst::ICONS}}/payment/discover.svg" style="width: 50px">
                                    </td>
                                    <td class="col">
                                        <img src="{{AppConst::ICONS}}/payment/dunes.svg" style="width: 50px">
                                    </td>
                                    <td class="col">
                                        <img src="{{AppConst::ICONS}}/payment/jcb.svg" style="width: 50px">
                                    </td>
                                </tr>

                            </table>
                            <table style="width: 100%">
                                <tr>
                                    <td class="col-2">
                                        <img src="{{AppConst::ICONS}}/payment/mc-afee.svg" style="width: 100px">
                                    </td>
                                    <td class="col-2">
                                        <img src="{{AppConst::ICONS}}/payment/norton.svg" style="width: 100px">
                                    </td>
                                    <td class="col-2">
                                        <img src="{{AppConst::ICONS}}/payment/pci-dss.svg" style="width: 100px">
                                    </td>
                                    <td class="col-2">
                                        <img src="{{AppConst::ICONS}}/payment/ssl.svg" style="width: 100px">
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                @endif
                <tfoot>
                <tr>
                    <td colspan="2">
                        <div class="footer-space">&nbsp;</div>
                    </td>
                </tr>
                </tfoot>
            </table>
            <div class="footer" style="margin-top: 8rem; margin-bottom: 0; margin-top: 0; text-align: center">
                {!! $invoice->payment_status_footer_text !!}
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</x-print-layout>
