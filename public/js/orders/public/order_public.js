/* Global variables */
let firstVisibleDayOnCalendar;
let lastVisibleDayOnCalendar;
let Calendar = null;
let today = new Date();
let isEventDrop = false;
let reservationSent = false;
today.setHours(0, 0, 0, 0);
today = today.toISOString().split('T')[0];

/* JS classes */
let Variables = {
    orderFormInput: [
        'customerName', 'customerSurname', 'customerPhoneNumber', 'customerEmail', 'customerDeliveryCity', 'customerDeliveryPostCode', 'customerDeliveryAddress'
    ],
    getOrderFormInputs: function () {
        let values = {}
        this.orderFormInput.forEach(function (inputName) {
            values[inputName] = $('#orderForm input[name="' + inputName + '"]').val();
        });
        values.trampolines = Trampolines
        values.firstVisibleDay = firstVisibleDayOnCalendar
        values.lastVisibleDay = lastVisibleDayOnCalendar

        // values.targetDateEnd = TargetDate.getTargetDate(globalDropInfo)
        console.log('Trampolines orderPublic=>', Trampolines)
        console.log(values)
        return values;
    },
    getTrampolines: function () {
        return Trampolines
    },
}
document.addEventListener('DOMContentLoaded', function () {
    Calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialDate: Dates.CalendarInitial,
        // themeSystem: 'bootstrap5',
        locale: 'lt',
        editable: true,
        selectable: true,
        eventDrop: function (dropInfo) {
            isEventDrop = true
            let droppedDate = dropInfo.event.start;
            let currentMonth = Calendar.getDate().getMonth();
            let droppedMonth = droppedDate.getMonth();

            console.log('Dropped date =>', droppedDate)
            console.log('Dropped month =>', droppedMonth)
            console.log('current month =>', currentMonth)

            if (droppedMonth < currentMonth) {
                Calendar.prev();
                updateEvents(firstVisibleDayOnCalendar, lastVisibleDayOnCalendar)
            } else if (droppedMonth > currentMonth) {
                Calendar.next();
                updateEvents(firstVisibleDayOnCalendar, lastVisibleDayOnCalendar);
            }
        },
        eventChange: function (changeInfo) {
            let newStartDate = new Date(changeInfo.event.start);
            if (newStartDate < new Date(today)) {
                changeInfo.revert();
            }
        },
        dayMaxEvents: true,
        events: [],
        datesSet: function (info) {
            let firstCalendarVisibleDate = info.start;
            let lastCalendarVisibleDate = info.end;
            firstCalendarVisibleDate.setUTCHours(firstCalendarVisibleDate.getUTCHours() + 3);
            lastCalendarVisibleDate.setUTCHours(lastCalendarVisibleDate.getUTCHours() + 3);
            firstVisibleDayOnCalendar = firstCalendarVisibleDate.toISOString().split('T')[0];
            lastVisibleDayOnCalendar = lastCalendarVisibleDate.toISOString().split('T')[0];
            console.log('First calendar day => ', firstVisibleDayOnCalendar);
            console.log('Last calendar day => ', lastVisibleDayOnCalendar);
            if (!isEventDrop) {
                updateEvents(firstVisibleDayOnCalendar, lastVisibleDayOnCalendar);
            }
            isEventDrop = false;
        },
        eventAllow: function (dropInfo, draggedEvent) {
            let CouldBeDropped = true;
            let dropStart = new Date(dropInfo.startStr);
            let dropEnd = new Date(dropInfo.endStr);

            Occupied.forEach(function (Occupation) {
                let OccupationStart = new Date(Occupation.start);
                let OccupationEnd = new Date(Occupation.end);
                if ((dropStart >= OccupationStart && dropStart < OccupationEnd) || (dropEnd > OccupationStart && dropEnd <= OccupationEnd) || (dropStart <= OccupationStart && dropEnd >= OccupationEnd)) {
                    CouldBeDropped = false;
                    return false;
                }
            });
            if (CouldBeDropped) {
                Trampolines.forEach(function (Trampoline) {
                    console.log('Public trampolines => ', Trampolines)
                    draggedEvent.extendedProps.trampolines.forEach(function (AffectedTrampoline) {
                        if (Trampoline.id === AffectedTrampoline.id) {
                            Trampoline.rental_start = dropInfo.startStr
                            Trampoline.rental_end = dropInfo.endStr
                            console.log('public startStr => ', dropInfo.startStr)
                            console.log('public endStr => ', dropInfo.endStr)
                            if (reservationSent) {
                                TrampolineOrder.FormSendOrder.Event.DisplayConfirmationElement(dropInfo.startStr, dropInfo.endStr)
                            }
                        }
                    })
                })
            } else {
                Trampolines.forEach(function (Trampoline) {
                    Trampoline.rental_start = draggedEvent.startStr
                    Trampoline.rental_end = draggedEvent.endStr
                    console.log('draggedevent endstr = ', draggedEvent.endStr)
                    if (reservationSent){
                        TrampolineOrder.FormSendOrder.Event.DisplayConfirmationElement(draggedEvent.startStr, draggedEvent.endStr)
                    }
                })
            }
            return CouldBeDropped;
        },
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        }
    });
    Calendar.render();
})

function addEvent(EventsToAdd) {
    EventsToAdd.forEach(function (Event) {
        Calendar.addEvent(Event)
    });
}

function updateEvents(targetStartDate, targetEndDate) {
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/orders/public/order/public_calendar/get',
        method: 'POST',
        data: {
            trampoline_id: Variables.getTrampolines().map(t => t.id),
            target_start_date: targetStartDate,
            target_end_date: targetEndDate
        },
    }).done((response) => {
        Occupied = response.Occupied
        if (response.status) {
            Calendar.removeAllEvents()
            addEvent(Occupied)
            Availability = response.Availability
            addEvent(Availability)
        }
    }).always((instance) => {
        // console.log("always => response : ", instance);
    });
}

let TrampolineOrder = {
    init: function () {
        this.FormSendOrder.init()
        this.UpdateOrder.init()
    },
    FormSendOrder: {
        init: function () {
          this.Event.init()
        },
        dataForm: {
            element: $('#sendOrderColumn form')
        },
        Event: {
            init: function () {
                $('#orderForm .orderSameDay').on('change', function () {
                    if (!$(this).is(':checked')) {
                        $('.showTrampolineSelect').show().click()
                    } else {
                        $('.showTrampolineSelect').hide();
                    }
                })
                $('.createOrder').on('click', (event) => {
                    event.preventDefault();
                    this.addOrder()
                })
            },
            addOrder: function () {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "POST",
                    url: "/orders/public/order",
                    data: Variables.getOrderFormInputs(),
                    // targetDate: targetDate
                }).done((response) => {
                    if (response.status === false) {
                        $('form input').removeClass('is-invalid');
                        Object.keys(response.failed_input).forEach(function (FailedInput) {
                            $('form .' + FailedInput + 'InValidFeedback').text(response.failed_input[FailedInput][0]);
                            $('form input[name=' + FailedInput + ']').addClass('is-invalid');
                        })
                    }

                    if (response.status) {
                        $('form input[type=text], form input[type=number], #createTrampolineModal form textarea').val('');
                        $('form input').removeClass('is-invalid');
                        $('.infoBeforeSuccessfulOrder').css('display', 'none');
                        $('#columnAfterSentOrder').css('display', 'block')
                        $('#thankYouDiv').css('display', 'block').addClass(' d-flex flex-column justify-content-between')
                    }
                    /*Renew fullcalendar occupation*/
                    Occupied = response.Occupied
                    console.log('Occupied create =>', Occupied)
                    if (response.status) {
                        reservationSent = true
                        TrampolineOrder.UpdateOrder.OrderIdToUpdate = response.OrderId
                        Calendar.removeAllEvents()
                        addEvent(Occupied)
                        Availability = response.Events
                        addEvent(Availability)
                    } else {
                        Calendar.getEvents().forEach(function (event) {
                            if (event.extendedProps.type_custom === 'occ') {
                                event.remove();
                            } else {
                                event.setProp('backgroundColor', '#808000')
                                event.setProp('title', 'Neužsakyta')
                            }
                        });
                        addEvent(Occupied)
                    }
                });
            },
            DisplayConfirmationElement: function (startDate, endDate) {
                $('#confirmationContainer').css('display', 'block');
                $('.dates').html('<p><strong>Pradžia:</strong> ' + startDate + '</p><p><strong>Pabaiga:</strong> ' + endDate + '</p>');
            }
        }
    },
    UpdateOrder: {
        init: function (){
          this.Event.init()
        },
        OrderIdToUpdate: 0,
        Event: {
            init: function () {
                $('#confirmationContainer .confirmDatesChange').on('click', (event) => {
                    event.preventDefault()
                    this.updateOrder()
                })
            },
            updateOrder: function () {
                // let form_data = Variables.getOrderFormInputs()
                // form_data.orderID = TrampolineOrder.UpdateOrder.OrderIdToUpdate
                // form_data.firstVisibleDay = firstVisibleDayOnCalendar
                // form_data.lastVisibleDay = lastVisibleDayOnCalendar
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: "PUT",
                    url: "/orders/public/order",
                    data: form_data
                }).done((response) => {
                    if (response.status) {
                        $('#confirmation-container').css('display', 'none');
                        Calendar.removeAllEvents()
                        addEvent(response.Occupied)
                        addEvent(response.Event)
                    }
                })
            }

        }
    }
}

/* Document ready function */
$(document).ready(function () {
    console.log("/js/trampolines/public/order_public.js -> ready!");
    TrampolineOrder.init()
});
