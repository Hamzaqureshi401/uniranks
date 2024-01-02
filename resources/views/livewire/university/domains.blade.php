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
            
        </div>
    </div>

    <div class="card bg-transparent mt-4">
        <div class="card-body">
            <div class="h4 blue" id="upload-images">@lang('Domains')   
             <div class="w-100 px-4 mt-3">
        <hr>
    </div> 
    <!-- @include('about-icon') -->

 </div>
       <table class="table">
   <!--  <thead>
        <tr>
            <th scope="col">URL</th>
            <th scope="col">Type</th>
            <th scope="col">Created On</th>
            <th scope="col">By</th>
            <th scope="col" class="text-place-end">Actions</th>
        </tr>
    </thead> -->
    <tbody>
        @foreach($domains ?? [] as $domain)
        <tr>
            <td><a href="{{$domain->url}}" class="blue" target="_blank">{{$domain->url}}</a></td>
            <td class="blue">{{$domain->type?->title ?? "N/A"}}</td>
            <td class="blue">@lang('Created on') {{$domain->created_at?->toDayDateTimeString() ?? '---'}}</td>
            <td class="blue">{{$domain->createdByUser?->name}}</td>
            <td class="text-place-end"><a href="" wire:click.prevent="deleteDomain({{$domain->id}})" class="red">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

    </div>
    </div>
    

</div>
