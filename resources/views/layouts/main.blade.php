<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }} > {{--dir="{{getPageDirection()}}"--}}
<head>@include('layouts.includes.head')</head>
<body>
<div id="loader-wrapper" style="">
    <img id="loader" src="{{ AppConst::SITE_LOGOS . '/logo-vertical.png' }}" alt="Loading"/>
</div>
<div id="mainBody" class="d-none">
  {{$slot}}
</div>
@include('layouts.includes.scripts')
</body>
</html>
