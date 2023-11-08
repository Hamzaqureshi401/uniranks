@extends('errors::minimal',['show_logout'=>true,'show_refresh'=>true])

@section('title', __('Account Rejected'))
@section('code', '403')
@if(!is_array(json_decode($exception->getMessage(),true))))
    @section('message', __($exception->getMessage() ?: 'Forbidden'))
@else
    @section('message')
        {!! json_decode($exception->getMessage(),true)['message'] !!}
    @endsection
    @section('details')
        <p class="text-bold">Details:</p>
        {!! json_decode($exception->getMessage(),true)['details'] !!}
    @endsection
@endif
