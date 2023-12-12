<div>
    <div class="w-100" x-data="{ showFilters:false }">
        <div class="row mt-3 mt-md-0">
            <div class="col-12 d-flex justify-content-between blue">
                <div class="h4 blue">@lang('Fair')&nbsp;{{ucfirst(__($status))}} @lang('Universities')</div>
                <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
            </div>
        </div>
        <div class="row mt-3 align-items-center d-md-flex" x-cloak :class="showFilters ? '':'d-none'">
            <div class="col-12 col-md-3">
                <livewire:pages.components.countries-dropdown/>
            </div>
            <div class="col-12 col-md-3 mobile-marg">
                <livewire:fairs.components.invitations-status-filter/>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <x-general.loading message="Loading" />

        @php
            /*** @var \App\Models\Institutes\University | \App\Models\Institutes\Agent  $university
            * @var \Illuminate\Database\Eloquent\Collection | \App\Models\Fairs\Invitation[] $universities*/
        @endphp

        @forelse($universities as $key=>$invitation)
            @php
                $university = $invitation->university ?? $invitation->agent;
            @endphp
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="w-100">
                            <div class="row mx-0 " :wire:key="'row-lg-'.$university->id">
                                <div class="col-1 ps-md-0">
                                    <img src="{{$university->logo_url}}" alt="{{$university->name ?? ""}}" style="max-width: 100px">
                                </div>
                                <div class="col-lg-7 ms-md-4 me-md-5 mt-2 mt-md-0">
                                    <div class="pe-md-3">
                                        <p class="h5 primary-text">{{$university->university_name ?? $university->name }}</p>
                                        <p class="paragraph-style2 primary-text">
                                            @if(!empty($university->description))
                                                {{Str::limit(strip_tags($university->description), 160)}}
                                                @if(Str::length($university->description) > 160)
                                                    <a href="javascript:void(0)" class="secondary-text" onclick="openReadMoreModal(@js($university->description))" >@lang('Read More')</a>
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-md-end pe-1">
                                    <div class="d-flex justify-content-md-end align-items-center mt-1">
                                        <img src="{{AppConst::ICONS.'/ur-icon-stars.png'}}" alt="UR logo"
                                             style="width:30px">
                                        <div class="primary-text">
                                            <p class="small5 mb-0">
                                                @lang('World Rank')
                                                #{{$university->rankingPositions?->world_rank ?? "N/A"}}
                                            </p>
                                            <p class="small5 mb-0">
                                                @lang('Local Rank')
                                                #{{$university->rankingPositions?->country_rank ?? "N/A"}}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="small5 text-light-blue fw-bold"></p>
                                    <div class="btn3">
                                        @if($invitation->fair->is_past)
                                            <div class="red h6 mb-0 mt-2 text-place-end">@lang("Event has been past!")</div>
                                        @elseif($invitation->accepted_by_school == AppConst::REGISTARTION_PENDING)
                                            <button class="button-red button-sm d-inline w-45"
                                                    wire:click="rejected({{$invitation->id}})">@lang('Reject')
                                            </button>
                                            <button class="button-blue button-sm d-inline w-45"
                                                    wire:click="accepted({{$invitation->id}})">@lang('Accept')
                                            </button>
                                        @elseif($invitation->accepted_by_school == AppConst::REGISTARTION_REJECTED)
                                            <div class="red h6 mb-0 mt-2 text-place-end">@lang("You have rejected!")</div>
                                        @elseif($invitation->accepted_by_school == AppConst::REGISTARTION_ACCEPTED)
                                            <div class="blue h6 mb-0 mt-2 text-place-end">@lang("You have Accepeted!")</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--data slot end-->

                    </div>
                </div>
            </div>
        @empty
            <div class="row my-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center mb-0">{{__('No Record Found!')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="mt-4 mobile-pagination">
                {!! $universities->links() !!}
            </div>
        </div>
    </div>
    <x-elements.read-more-modal title="About"/>

</div>
