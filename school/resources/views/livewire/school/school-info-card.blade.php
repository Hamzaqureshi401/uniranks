@php
 /**
 * @var \App\Models\Institutes\School $school
 */
@endphp
<div class="primary-bg d-none d-lg-block" style="margin-top: 3.5rem">
    <div class="py-3">
        <div class="d-flex container px-md-0 align-items-center">
            <div class="w-auto ps-0"> <img src="{{$school->logo_url}}" style="width: 150px" class="float-end" alt="{{$school->school_name}} Logo"> </div>
            <div class="ps-4" style="width: 70%">
                <p class="h3 text-light mb-4">{{$school->translated_name ?: $school->school_name}} </p>
                <p class="h5 text-light mb-3">{{$school->address1 ?? "Add School Address"}}</p>
                <p class="h5 text-light">@lang('School Counselor Account')</p>
                @if(Auth::user()->schools()->count() > 1)
                <p class="h6"><a href="{{route('admin.selectSchool')}}" class="secondary-text">@lang('Change School')</a></p>
                @endif
                <x-general.breadcrumb/>

            </div>
            <div class="w-auto">
                <p class="h3 text-light mb-4">@lang('Account Info')</p>
                <p class="h5 text-light mb-3">@lang('Type') {{$school->pointLevel?->translated_name ?: ($school->pointLevel?->title ?? 'C')}}</p>
                <p class="h5 text-light">@lang('Balance') <livewire:pages.components.total-sm-credit/> </p>
            </div>
        </div>
    </div>
</div>
