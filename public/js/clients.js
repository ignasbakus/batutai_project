let Actions = {
    initActions: function () {
        $("#sampleAction").on("click", function () {
            Actions.callBacks.onSampleAction();
        });

        $("#accordion").accordion();
        $("document").tooltip();
        $("#datepicker").datepicker();
        $("#slider").slider();

        const myModal = new bootstrap.Modal('#exampleModal', {
            keyboard: false
        })
        document.getElementById('exampleModal').addEventListener('hidden.bs.modal', event => {
            console.log('Our model is not visible !');
        })
        $("#fireModal").on("click", function () {
            myModal.show();
        });


    },
    callBacks: {
        onSampleAction: function () {
            alert('Kazka padaryti !');
        }
    }
}
$(document).ready(function () {
    console.log("src/public/clients/clients.js -> ready!");
    Actions.initActions();
});
