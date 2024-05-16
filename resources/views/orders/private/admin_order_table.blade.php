@extends('layouts.admin_panel_layout')
@section('content')

    <div class="row mb-5">
        <div class="col-4">
{{--            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createTrampolineModal">Pridėti--}}
{{--                naują batutą--}}
{{--            </button>--}}
            <button id="refreshTable" class="btn btn-secondary">
                Atnaujinti lentelė
            </button>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <table id="orderTable" class="display" style="width:100%">
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/js/orders/private/order_table_admin.js"></script>
@endsection
