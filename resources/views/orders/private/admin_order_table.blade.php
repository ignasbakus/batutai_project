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

    <div class="modal fade" id="removeOrderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ištrinimas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ar tikrai norite ištrinti užsakymą?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Išeiti</button>
                    <button type="submit" class="btn btn-danger removeOrder">Ištrinti</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/js/orders/private/order_table_admin.js"></script>
@endsection
