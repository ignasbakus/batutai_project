$(document).ready(function () {
    console.log("public/js/layouts/public.layout.js -> ready!");
    let yearNumber = new Date().getFullYear();
    $('#year').text(yearNumber.toString());
});
