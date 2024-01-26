<div>
    <div class="row">
        <div class="col-12">
            <h3 class="h4 text-blue">{{ __('Update Phone Number') }}</h3>
            <p class="paragraph-style2 gray font-normal mt-2">
                {{ __('Phone number you provide will not show on your profile') }}
            </p>
        </div>
    </div>
    @php
        /**
        * @var \App\Models\General\Countries $country
        */
    @endphp
    <div class="row mt-3">
        <div class="col-12">
            <form wire:submit.prevent="save" >
                <div class="card">
                    <div class="card-body" x-data="{mobile:@entangle('mobile').defer,code:@entangle('mobile_country_id').defer}">
                        <div class="row">
                            <div class="col-2 pe-0">
                                <select x-model="code"
                                        class="text-start form-control input-field">
                                    <option disabled>@lang('Code')</option> 
                                    @foreach($countries as $country)
                                        <option value="{{$country->country_code}}"><img src="{{$country->flag_url}}">
                                            +{{$country->country_code}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="mobile_country_id" class="mt-2"/>
                            </div>
                            <div class="col-10">
                                <x-jet-input id="phone_number" type="text" placeholder="{{ __('Enter Phone Number') }}"
                                             x-model="mobile" autocomplete="phone_number"/>
                                <x-jet-input-error for="mobile" class="mt-2"/>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <button type="submit" class="button-dark-blue width-25 button-sm mobile-btn"
                                            wire:loading.attr="disabled" :disabled="mobile == '{{$mobile}}' && code == '{{$mobile_country_id}}'" >@lang('Save')
                                    </button>
                                    <button type="reset" class="button-red width-25 button-sm mobile-btn"
                                            wire:loading.attr="disabled" :disabled="mobile == '{{$mobile}}' && code == '{{$mobile_country_id}}'">@lang('Cancel')</button>
                                </div>
                                <x-general.loading wire:target="save" message="Saving Data"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


     <div class="card bg-transparent mt-4">
        <div class="card-body">
            <div class="h4 blue" id="upload-images">@lang('Phone')   
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
            @lang('Updated on') {{ \Carbon\Carbon::parse(\Auth::user()['updated_at'])->format('D, M j, Y g:i A') }}
        
    </div>
    <div class="mobile-marg-2">@lang('By') {{ \Auth::user()['updated_by'] ?? 'By Dev Team Rep' }}</div>
</div>

    </div>
    </div>
</div>
