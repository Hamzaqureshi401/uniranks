<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('Verify Your Email')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        <form method="POST" action="{{ route('verification.send') }}" class="d-flex flex-column justify-content-end h-100">
            @csrf

            <div class="mt-5">
                <h2 class="font-300 primary-text text-center mb-0">@lang('Verify Email')</h2>
                <p class="paragraph primary-text mt-4">
                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>
            </div>
            <x-jet-validation-errors class="mb-4 alert alert-danger" />
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 alert alert-success">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="mt-4 text-center">

                <button type="submit" class="btn btn-block btn-secondary">
                    {{ __('Resend Verification') }}</button>
            </div>

        </form>

        <div class="d-flex justify-content-between mt-4">
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit"
                        class="primary-text border-none text-decoration-underline auth_helper" style="background: none">
                    {{ __('Log Out') }}
                </button>
            </form>
            <a class="auth_helper" href="{{ route('email.add') }}">{{ __('Update Your Email Address') }}</a>
        </div>
    </x-general.authentication-card>
</x-base-layout>
