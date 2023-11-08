<x-shared.general.main>
    <x-shared.general.content>
        <div class="col-12">
            <div class="my-5 p-0 m-auto modal-dialog modal-lg">
                <div class="modal-content border-0 shadow">
                    <div class="d-flex">
                        <div class="auth-card-sidebar d-none d-lg-block">
                            <div class="auth-card-overlay p-4">
                                <div class="d-flex">
                                    <x-jet-authentication-card-logo/>
                                </div>
                                <div class="mt-5">
                                    <div>
                                        <h6 class="ms-3">{{__('Create')}}</h6>
                                        <ul>
                                            <li>{{ __('Open Day') }}</li>
                                            <li>{{ __('Workshop') }}</li>
                                            <li>{{ __('Event') }}</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h6 class="ms-3">{{__('Join')}}</h6>
                                        <ul>
                                            <li>{{ __('Fair') }}</li>
                                            <li>{{ __('Career Talks') }}</li>
                                            <li>{{ __('Events') }}</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h6 class="ms-3">{{__('Manage')}}</h6>
                                        <ul>
                                            <li>{{ __('Leads') }}</li>
                                            <li>{{ __('Invitations') }}</li>
                                            <li>{{ __('Notifications') }}</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="auth-card-main flex-fill p-5">
                            {{$slot}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-shared.general.content>
</x-shared.general.main>
