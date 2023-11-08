@extends('errors::minimal',['show_logout'=>true,'show_refresh'=>true])

@section('title', __('Forbidden'))
@section('code', '403')
@if(!is_array(json_decode($exception->getMessage(),true))))
    @section('message', __($exception->getMessage() ?: 'Forbidden'))
@else
    @section('message')
        {!! json_decode($exception->getMessage(),true)['message'] !!}
    @endsection
    @section('details')
        {!! json_decode($exception->getMessage(),true)['details'] !!}
    @endsection
@endif
