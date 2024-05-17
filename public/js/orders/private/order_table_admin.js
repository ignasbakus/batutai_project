    let Orders = {
        init: function () {
            this.Modals.deleteOrder.init()
            this.Table.init()
        },
        Table: {
            DrawCount: 0,
            OrderList: [],
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
                        url: '/orders/admin/order/datatable/get',
                        type: 'POST',
                        dataType: 'json',
                        data: function (d) {
                            d = Orders.Table.AXAJData(d);
                        },
                        dataFilter: function (response) {
                            return JSON.stringify(jQuery.parseJSON(response));
                        },
                        dataSrc: function (json) {
                            Orders.Table.OrderList = json.list;
                            return json.DATA;
                        }
                    },
                    columnDefs: [],
                    drawCallback: function (settings) {
                        Orders.Table.DrawCount = settings.iDraw
                        Orders.Table.initEventsAfterReload()
                    },
                    rowCallback: function (row, data, index) {
                    },
                    createdRow: function (row, data, index) {
                    },
                    columns: [
                        {title: "Užsakymo numeris", orderable: false},
                        {title: "Užsakymo data"},
                        {title: "Užsakytas batutas"},
                        {title: "Klientas", orderable: false},
                        // {title: "Kliento pavardė", orderable: false},
                        {title: "Elektroninis paštas",  orderable: false},
                        {title: "Telefonas", orderable: false},
                        {title: "Adresas", orderable: false},
                        // {title: "Pašto kodas", orderable: false},
                        // {title: "Adresas", orderable: false},
                        {title: "Nuomos trukmė"},
                        {title: "Bendra suma"},
                        {title: "Sumokėtas avansas"},
                        {title: "Valdymas", orderable: false}
                    ],
                    bAutoWidth: false,
                    fixedColumns: true,
                    info: false,
                    initComplete: function () {}
                })
                this.Events.init()
            },
            initEventsAfterReload: function () {
                $('#orderTable .orderDelete').on('click', (event) => {
                    console.log("clickas")
                    event.stopPropagation()
                    this.Events.removeOrder($(event.currentTarget).data('orderid'))
                })
            },
            Events: {
                init: function () {
                    $('#refreshTable').on('click', function () {
                        Orders.Table.Table.draw()
                    })
                },
                removeOrder: function (OrderID) {
                    Orders.Modals.deleteOrder.prepareModal(OrderID)
                }
            }
        },
        Modals: {
            deleteOrder: {
                orderIdToDelete: 0,
                element: new bootstrap.Modal('#removeOrderModal'),
                prepareModal: function (OrderID) {
                    this.orderIdToDelete = OrderID
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        dataType: 'json',
                        method: "GET",
                        url: "/orders/admin/order",
                        data: {
                            order_id: OrderID
                        }
                    }).done((response) => {
                        if (response.status) {
                            console.log('AJAX success:', response);
                            $('#removeOrderModal .modal-body p').
                            html('Ar tikrai norite ištrinti užsakymą Nr: "' + response.order.id + '"?');
                            this.element.show()
                        }
                    })
                },
                init: function () {
                    this.Events.init();
                },
                Events: {
                    init: function () {
                        $('#removeOrderModal .removeOrder').on('click', (event) => {
                            event.stopPropagation()
                            this.removeOrder(Orders.Modals.deleteOrder.orderIdToDelete)
                        })
                    },
                    removeOrder: function (OrderID) {
                        console.log('removeOrder OrderID => ', OrderID);
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            method: "DELETE",
                            url: "/orders/admin/order",
                            data: {
                                orderID: OrderID
                            }
                        }).done((response) => {
                            if (response.status) {
                                Orders.Modals.deleteOrder.element.hide()
                            }
                            Orders.Table.Table.draw()
                        })
                    }
                }
            },
        }
    }

    $(document).ready(function () {
        Orders.init();
        console.log("/js/orders/private/order_table_admin.js -> ready!");
    });
