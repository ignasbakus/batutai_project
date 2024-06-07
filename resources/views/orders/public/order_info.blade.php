<div class="px-4 py-5">
    <h5 class="text-uppercase">{{$Order->client->name}} {{$Order->client->surname}}</h5>
    <h4 class="mt-5 theme-color mb-5">Ačiū už jūsų rezervaciją!</h4>
    <span class="theme-color">Mokėjimo suvestinė</span>
    <div class="mb-3">
        <hr class="new1">
    </div>
    @foreach($Order->trampolines as $orderTrampolines)
        <div class="d-flex justify-content-between">
            <span class="font-weight-bold">Batutas {{$orderTrampolines->trampoline->title}}</span>
            <span class="text-muted">{{number_format($orderTrampolines->total_sum, 2)}} €</span>
        </div>
    @endforeach
    <div class="d-flex justify-content-between mt-3">
        <span class="font-weight-bold">Avansas</span>
        <span class="font-weight-bold">30 €</span>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <span class="font-weight-bold">Galutinė mokama suma</span>
        <span class="font-weight-bold theme-color">{{ number_format($Order->total_sum - 30, 2) }} €</span>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-primary btn-thankYou">Apmokėti avansą</button>
    </div>
</div>
