<div>
    <x-general.university-media-page-title sub-title="Social Media Information"/>
    <div class="card mt-1">
        <div class="card-body">
            <x-general.status-alert/>
            @php
                $chunks= collect(array_keys($sm_columns))->chunk(2);
            @endphp
            <div>
                <div class="blue paragraph-style2">@lang('Only the Social Media URL is accepted')</div>
                @foreach($chunks as  $columns)
                    <div class="row mt-3">
                        @foreach($columns as  $column)
                            <div class="col-md-6 d-flex align-items-center"><span>
                                <img src="{{AppConst::ICONS}}/sm-icons/{{$column}}.svg" width="35px"></span>
                                <div class="form-floating w-100 ms-2">
                                    <input wire:model.defer="sm_columns.{{$column}}" class="form-control input-field"" placeholder="{{ucfirst($column)}} @lang('Link')">
                                    <label for="floatingInput">{{ucfirst($column)}} @lang('Link')</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
{{--                <div class="d-md-flex h6 blue justify-content-start mt-3">--}}
{{--                    <div class="col-md-3">Updated on 15 Jan 2022</div>--}}
{{--                    <div class="col-md-2 mobile-marg-2">By David Scott</div>--}}
{{--                </div>--}}

            </div>

        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
        </div>
    </div>

        <div class="card bg-transparent mt-4">
        <div class="card-body">
            <div class="h4 blue" id="upload-images">@lang('Social Media')   
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
       
        </tbody>
</table>
 <div class="d-md-flex col-md-6 h6 blue justify-content-between">
    <div class="box-bottom-note">
            @lang('Updated on') {{ \Carbon\Carbon::parse($sm_columns['updated_at'])->format('D, M j, Y g:i A') }}
        
    </div>
    <div class="mobile-marg-2">@lang('By') {{ $sm_columns['updated_by'] ?? 'By Dev Team Rep' }}</div>
</div>

    </div>
    </div>
    <x-general.loading message="Processing..." />
</div>
