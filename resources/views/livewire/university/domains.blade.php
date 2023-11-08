<div>

    @php
        /**
        * @var \App\Models\General\DomainType[] $domainTypes;
        **/
    @endphp
    <x-general.university-media-page-title sub-title="University Domains"/>
    <div class="card mt-1">
        <div class="card-body">
            <div class="blue paragraph-style2">
                @lang('List all university domain names, Main university Domain, Subdomains, Portal, LMS...etc')
            </div>
            <div>
                <x-general.status-alert/>
                <div class="row mt-3 d-md-flex">
                    <div class="col-md-3">
                        <div class="form-floating w-100">
                            <select wire:model.defer="domain_type_id" class="form-select input-field">
                                <option value="">@lang('Domain Type')</option>
                                @foreach($domainTypes ?? [] as $domainType)
                                    <option value="{{$domainType->id}}">{{$domainType->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">@lang('Domain Type')</label>
                        </div>
                        <x-jet-input-error for="domain_type_id" class="mt-2"/>
                    </div>
                    <div class="col-md-9 mobile-marg-2">
                        <div class="form-floating w-100">
                            <input wire:model.defer="url" class="form-control input-field"
                                   placeholder="@lang('Domain URL')">
                            <label for="floatingInput">@lang('Domain URL')</label>
                        </div>
                        <x-jet-input-error for="url" class="mt-2"/>
                    </div>
                </div>
                <div class="d-md-flex justify-content-end align-items-center">
                    <div class="col-md-6 mt-3 mb-3 text-place-end">
                        <button class="m-0 button-no-bg" type="button"
                                wire:click.prevent="save">@lang('+ Add domain')</button>
                    </div>
                </div>
            </div>
            <x-general.loading message="Processing.."/>
            <div class="w-100 mt-3 px-4">
                <hr>
            </div>
            @php
                /**
                * @var \App\Models\University\Information\UniversityDomains[] $domains;
                **/
            @endphp
            @foreach($domains ?? [] as $domain)
                <div class="d-md-flex h6 blue justify-content-between">
                    <div class="fw-bold col-md-3"><a href="{{$domain->url}}" class="blue" target="_blank">{{$domain->url}}</a></div>
                    <div class="col-md-3">{{$domain->type?->title ?? "N/A"}}</div>
                    <div class="col-md-3">@lang('Created on') {{$domain->created_at?->toDayDateTimeString() ?? '---'}}</div>
                    <div class="col-md-2">@lang('By') {{$domain->createdByUser?->name}}</div>
                    <div class="col-md-1  text-place-end"><a href="" wire:click.prevent="deleteDomain({{$domain->id}})"
                                                             class="red ">Delete</a></div>
                </div>
            @endforeach
        </div>
    </div>

</div>
