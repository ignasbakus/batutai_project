@extends('layouts.admin_panel_layout')
@section('content')
    <div class="row mb-5">
        <div class="col-12">
            <div id='calendar'></div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src='/frameworks/fullcalendarscheduler6111/dist/index.global.js'></script>
    <script src="/js/trampolines/private/calendar_admin.js"></script>
@endsection
