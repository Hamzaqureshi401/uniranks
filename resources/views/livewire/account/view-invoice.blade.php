<div>
    <div class="row">
        <div class="col-12">
            <div x-data="{ showFilters:false }" class="w-100">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between blue">
                        <div class="h5 blue">@lang('System Invoice')
                        @include('about-icon')</div>
                        <div>
                            {{--href="{{route('admin.account.previewDownloadInvoice',$invoice->id)}}"--}}
                            <a href="javascript:void(0)"
                               onclick="printDivContent('{{route('admin.account.downloadInvoice',$invoice->id)}}')"
                               class="a-underline blue">
                                @lang('Print Invoice') <i class="fa-solid fa-print pointer"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @php
                /**
                * @var \App\Models\Transactions\Invoice $invoice
                */
                $bill_to = $invoice->university;
            @endphp
            <div class="card mt-3">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between px-4 pt-3">
                        <div class="w-35">
                            <img src="{{AppConst::SITE_LOGOS}}/Logo-stars-v1.png" style="width: 100%">
                        </div>
                        <div class="w-auto text-end blue">
                            <h1 class="h1"><b>@lang('Invoice')</b></h1>
                            <p class="h4"># INV-{{$invoice->invoice_number}}</p>
                            <p class="h4">@lang('Account ID'): {{$invoice->created_by_id}}</p>
                            <p class="h4 {{$invoice->payment_status_color}}">@lang($invoice->payment_status_name)</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3 px-4">
                        <div class="w-35 blue">
                            <h4 class="h4"><b>@lang('UNIRANKS Inc')</b></h4>
                            <p class="h5">@lang('USA, New York')</p>
                            <p class="h5">@lang('1330 Avenue of the Americas, 23rd Floor New York, NY 10019')</p>
                            <p class="h5">1212 653 0628</p>
                        </div>
                        <div class="w-auto text-end blue">
                            <h4 class="h4"><b>@lang('Bill To')</b></h4>
                            <p class="h5">{{$bill_to?->translated_name ?: $bill_to?->university_name}}</p>
                            <p class="h5">{{$bill_to->country?->translated_name ?: $bill_to->country?->country_name}}</p>
                            <p class="h5">@lang('Invoice Date'): {{$invoice->created_at?->toDateString()}}</p>
                            @if($invoice->payment_status == AppConst::PENDING)
                                <p class="h5">@lang('Due Date'): {{$invoice->due_date->toDateString()}}</p>
                            @else
                                <p class="h5">@lang('Payment Date'): {{$invoice->payment_date->toDateString()}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table bg-light blue invoices-table">
                            <thead class="primary-bg ">
                            <!--Heading Row-->
                            <tr>
                                <td class="w-10 text-light">#</td>
                                <td class="w-40 text-light">@lang('Item')</td>
                                <td class="text-end text-light">@lang('QTY')</td>
                                <td class="text-end text-light">@lang('Rate')</td>
                                <td class="text-end text-light">@lang('Discount')</td>
                                <td class="text-end text-light">@lang('Amount')</td>
                            </tr>
                            <!--End Heading row-->
                            </thead>
                            <tbody>
                            <!--Row Start-->
                            <tr>
                                <td>1</td>
                                <td>{{$invoice->transaction_details}}</td>
                                <td class="text-end">{{$invoice->qty}}</td>
                                <td class="text-end">{{number_format($invoice->full_amount,2)}}</td>
                                <td class="text-end">{{number_format($invoice->discount,2)}}</td>
                                <td class="text-end">{{number_format(($invoice->full_amount-$invoice->discount),2)}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="mt-4 p-4 blue">
                            <div class="row ">
                                @if($invoice->payment_status == AppConst::PENDING)
                                    <div class="col-6 border-right">
                                        <p class="h5"><b>@lang('Bank deposit')</b></p>
                                        <p class="">
                                            <b>@lang('To complete your transfer, go to your online bank and transfer')
                                                {{number_format($invoice->payable_amount,2)}} {{$invoice->currency?->code}} @lang('using the account details below')</b>
                                        </p>
                                        @php
                                            /**
                                            * @var \App\Models\General\BankAccount [] $bank_accounts;
                                            * @var \App\Models\General\BankAccount  $bank_account;
                                            */
                                        @endphp
                                        <p class="mb-0">@lang('Our bank details for payments')
                                            @if($bank_accounts->count() > 1)
                                                <select wire:model="bank_account_id" wire:change="loadBankAccount">
                                                    @foreach($bank_accounts as $account)
                                                        <option
                                                            value="{{$account->id}}">{{$account->description}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </p>
                                        <p class="">@lang('Please transfer the money from a bank account in your name')</p>
                                        @foreach($bank_account->toArray() as $key => $value)
                                            @if(!empty($value) && !in_array($key,['id','created_at','updated_at','country_id','city_id','currency_id']))
                                                @php
                                                    $title = \Illuminate\Support\Str::title(Str::replace('_',' ',$key));
                                                @endphp
                                                <p class="mb-0"><b>@lang($title):</b> {{$value}}</p>

                                            @endif

                                        @endforeach
                                        <p class="mt-3 mb-0"><b>@lang('Reference ID'):</b> {{$invoice->ref_id}}</p>
                                    </div>
                                @elseif($invoice->payment_status == AppConst::UNDER_REVIEW)
                                    <div class="col-6 border-right">
                                        <p class="h5"><b>@lang('Payment Proof')</b></p>
                                        <img src="{{$invoice->payment_proof_document_url}}" class="banner-img" style="border-radius: 0">
                                    </div>
                                @else
                                    <div class="col-6"></div>
                                @endif
                                <div class="col-6 text-end ">
                                    <table class="table primary-text">
                                        <tbody class="border-collapse">
                                        <tr>
                                            <td class="h5 text-end w-70"><b>@lang('Sub Total'):</b></td>
                                            <td class="text-end h5">{{number_format(($invoice->full_amount-$invoice->discount),2)}} {{$invoice->currency?->code}}</td>
                                        </tr>
                                        <tr>
                                            <td class="h5 text-end w-70"><b>@lang('TAX'):</b></td>
                                            <td class="text-end h5">{{number_format($invoice->tax,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="h5 text-end w-70"><b>@lang('Processing Fee'):</b></td>
                                            <td class="text-end h5">{{number_format($invoice->processing_fee,2)}} {{$invoice->currency?->code}}</td>
                                        </tr>
                                        <tr>
                                            <td class="h5 text-end w-70"><b>@lang('Due Amount'):</b></td>
                                            <td class="text-end h5">{{number_format($invoice->payable_amount,2)}} {{$invoice->currency?->code}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    @if($invoice->payment_status == AppConst::PENDING)
                                        <div class="border-top inv-payment-btn-div">
                                            <p class="text-end h4 my-3"><b>@lang('Pay Online')</b></p>
                                            <button wire:click="payNow"
                                                    class="button-sm button-blue w-100"> @lang('Confirm and pay') {{number_format($invoice->payable_amount,2)}} {{$invoice->currency?->code}}</button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if($invoice->payment_status == AppConst::PENDING)
                                <div class="row">
                                    <div class="col-6">
                                        <p>(@lang('Please use this unique ID to transfer your money to UNIRANKS Inc')
                                            )</p>
                                        <p>@lang('This ID is unique and helps us locate and process your transfer faster. Please make sure to use this reference ID when you make your transfer')</p>
                                        <p>@lang("Note: Any transaction fees will be deducted from the total transfer amount. We'll
                                        credit your balance, once we receive the funds, on the next business day. If you
                                        have any questions,")
                                            @lang('please contact') <a href="mailto:billing@uniranks.com"
                                                                       class="blue">@lang('billing@uniranks.com')</a>
                                        </p>

                                    </div>
                                    <div class="col-6 d-flex justify-content-center">
                                        <div class="w-80">

                                            <div class="row align-items-center">
                                                <div class="col-8 ps-0">
                                                    <img src="{{AppConst::ICONS}}/payment/lock.svg"
                                                         style="width: 30px; height: 30px">
                                                    <label>@lang('Guaranteed')
                                                        <b>@lang('Safe & Secure') </b> @lang('Checkout')</label>
                                                </div>
                                                <div class="col-4 px-0">
                                                    <button class="button-sm button-blue w-100 p-0">@lang('Powered By')
                                                        <img src="{{AppConst::ICONS}}/payment/stripe.svg"
                                                             style="width: 45px"></button>
                                                </div>
                                            </div>
                                            <hr class="mb-2">
                                            <div class="row">
                                                <div class="col">
                                                    <img src="{{AppConst::ICONS}}/payment/cc-visa.svg"
                                                         style="width: 50px;">
                                                </div>
                                                <div class="col">
                                                    <img src="{{AppConst::ICONS}}/payment/master-card.svg">
                                                </div>
                                                <div class="col">
                                                    <img src="{{AppConst::ICONS}}/payment/american-express.svg">
                                                </div>
                                                <div class="col">
                                                    <img src="{{AppConst::ICONS}}/payment/discover.svg">
                                                </div>
                                                <div class="col">
                                                    <img src="{{AppConst::ICONS}}/payment/dunes.svg">
                                                </div>
                                                <div class="col">
                                                    <img src="{{AppConst::ICONS}}/payment/jcb.svg">
                                                </div>
                                            </div>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-2">
                                                    <img src="{{AppConst::ICONS}}/payment/mc-afee.svg">
                                                </div>
                                                <div class="col-2">
                                                    <img src="{{AppConst::ICONS}}/payment/norton.svg">
                                                </div>
                                                <div class="col-2">
                                                    <img src="{{AppConst::ICONS}}/payment/pci-dss.svg">
                                                </div>
                                                <div class="col-2">
                                                    <img src="{{AppConst::ICONS}}/payment/ssl.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <x-jet-validation-errors class="alert alert-danger"/>
                                    </div>
                                </div>
                                <div class="row">
                                    @if(!empty($document))
                                    <div class="col-6">
                                        <img src="{{$document->temporaryUrl()}}" class="banner-img" style="border-radius: 0">
                                        <p class="text-center blue">{{$document->getClientOriginalName()}}</p>
                                    </div>
                                    @else
                                        <div class="col-6">
                                            <x-elements.file-uploader wire:model="document" accept="image/*" description="Drop Or Click here to upload payment proof" />
                                        </div>
                                    @endif

                                </div>
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-md-end">
                                        @if(!empty($document))
                                            <button wire:click="initForm" class="button-red button-sm mobile-button me-0 w-35">@lang('Upload New')</button>
                                        @endif
                                        <button wire:click="markAsPaid" class="button-blue button-sm mobile-button me-0 w-35">@lang('Mark as paid!')</button>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="text-center blue px-4 pb-3" style="margin-top: 8rem">
                            {!! $invoice->payment_status_footer_text !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <x-general.loading message="Please Wait..."/>
        <!-- CONTAINER CLOSED -->
    </div>
    @push(AppConst::PUSH_JS)
        <script type="text/javascript">
            function printDivContent(url) {
                let newWin = window.open(url, '', 'height=650, width=650');
            }
        </script>
    @endpush
</div>
