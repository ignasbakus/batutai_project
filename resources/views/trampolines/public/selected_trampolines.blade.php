@foreach($Trampolines as $Trampoline)
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="me-auto">
            <div class="fw-bold">{{$Trampoline->title}}</div>
            {{$Trampoline->description}}
        </div>
        <span class="badge text-bg-primary rounded-pill">
            0.00 EUR
        </span>
        <button type="button" class="btn btn-danger btn-sm removeSelectedTrampoline" data-trampolineid="{{$Trampoline->id}}">
            Isimti batuta
        </button>
    </li>
@endforeach
