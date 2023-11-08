@extends('errors::minimal',['show_logout'=>true,'show_refresh'=>true])
@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __($exception->getMessage() ?: __('Unauthorized')))
