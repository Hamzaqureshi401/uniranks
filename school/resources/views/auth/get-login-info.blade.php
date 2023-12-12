<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('How to join fair')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        <div class="d-flex flex-column justify-content-end mt-3 h-100">
            <x-general.status-alert/>
            <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
            <div id="auth_form_login_tab">
                @php
                /**
                * @var \App\Models\Institutes\University $university
                * @var  \App\Models\User $admin
                */
                @endphp
                <h4 class="primary-text">@lang('How to join fair')</h4>
                <p class="mb-4 primary-text">@lang('To join fair please contact your university admin, to create a representative account for your email from university super admin portal. The university admin information are give below:')
                </p>
                <p class="primary-text">
                    <strong>@lang('University'):</strong> <span>{{$university->university_name}}</span>
                </p>
                <p class="primary-text">
                    <strong>@lang('University Admin Name'):</strong> <span>{{$admin?->name ?: ($admin?->userBio?->first_name ." ".$admin?->userBio?->last_name)}}</span>
                </p>
                <p class="primary-text">
                    <strong>@lang('University Admin Email'):</strong> <span>{{$admin?->email}}</span>
                </p>
                <p class="primary-text">
                    <strong>@lang('University Super Admin Portal'):</strong> <span><a href="https://uniadmin.uniranks.com" target="_blank">https://uniadmin.uniranks.com</a></span>
                </p>
                <p class="primary-text">
                    <strong>@lang('University Representative Portal'):</strong> <span><a href="https://unirep.uniranks.com" target="_blank">https://unirep.uniranks.com</a></span>
                </p>
                <p class="mb-4 primary-text">@lang('After creating representative account you can login into') <a href="https://unirep.uniranks.com" target="_blank">@lang('university representative')</a>
                    @lang('and join fair.')
                </p>
            </div>
        </div>
    </x-general.authentication-card>
</x-base-layout>
