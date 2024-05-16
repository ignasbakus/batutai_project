let Orders = {
    init: function () {
        this.Table.init()
    },
    Table: {
        DrawCount: 0,
        TrampolinesList: [],
        TableElement: 'orderTable',
        Table: false,
        AXAJData: function (d) {
            d._token = $('meta[name="csrf-token"]').attr('content');
            d.sample_data = 1;
            return d;
        },
        init: function () {
            this.Table = new DataTable('#orderTable', {
                pagingType: "full_numbers",
                pageLength: 5,
                lengthMenu: [[5, 10, 15, 20, 30], [5, 10, 15, 20, 30]],
                processing: true,
                filter: true,
                responsive: true,
                language: {search: "_INPUT_", searchPlaceholder: "Ieškoti"},
                //searchDelay     : 5000,
                order: [],
                serverSide: true,
                ajax: {
                    url: '/trampolines/admin/trampoline/datatable/get',
                    type: 'POST',
                    dataType: 'json',
                    data: function (d) {
                        d = Trampolines.Table.AXAJData(d);
                    },
                    dataFilter: function (response) {
                        return JSON.stringify(jQuery.parseJSON(response));
                    },
                    dataSrc: function (json) {
                        Trampolines.Table.TrampolinesList = json.list;
                        return json.DATA;
                    }
                },
                columnDefs: [],
                drawCallback: function (settings) {
                    Trampolines.Table.DrawCount = settings.iDraw
                    Trampolines.Table.initEventsAfterReload()
                },
                rowCallback: function (row, data, index) {
                },
                createdRow: function (row, data, index) {
                },
                columns: [
                    {title: "Užsakymo numeris", orderable: false, width: "10%"},
                    {title: "Užsakymo data", width: "10%"},
                    {title: "Klientas", orderable: false, width: "5%"},
                    {title: "Elektroninis paštas",  orderable: false, width: "7%"},
                    {title: "Telefonas", orderable: false, width: "7%"},
                    {title: "Miestas", orderable: false, width: "7%"},
                    {title: "Pašto kodas", orderable: false, width: "7%"},
                    {title: "Adresas", orderable: false,  width: "7%"},
                    {title: "Nuomos trukmė", width: "7%"},
                    {title: "Bendra suma", width: "7%"},
                    {title: "Sumokėtas avansas", width: "7%"},
                    {title: "Valdymas", orderable: false, width: "10%"}
                ],
                bAutoWidth: false,
                fixedColumns: true,
                info: false,
                initComplete: function () {
                }
            })
            this.Events.init()
        }
    },
    Events: {
        init: function () {
            $('#refreshTable').on('click', function () {
                Trampolines.Table.Table.draw()
            })
        }
    }
}


$(document).ready(function () {
    console.log("/js/orders/private/order_table_admin.js -> ready!");
});
