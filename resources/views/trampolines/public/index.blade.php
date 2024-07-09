@extends('layouts.layout')

@section('custom_css')
    <link href="/css/trampolines/public/public_index.css" rel="stylesheet" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center mb-3">
                <h1>Musu batutai</h1>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div id="trampolinesCarousel" class="carousel slide" data-bs-theme="dark">
                    <div class="carousel-inner">
                        @foreach($Trampolines as $Trampoline)
                            @if ($Trampoline->active)
                                <div class="carousel-item active" data-trampolineid='{{$Trampoline->id}}'>
                                    <a data-bs-target="#showTrampolineModal" data-bs-toggle="modal" href="#">
                                        <img src="{{$Trampoline->image_url}}" class="d-block w-100" alt="...">
                                    </a>
                                </div>
                            @else
                                <div class="carousel-item" data-trampolineid='{{$Trampoline->id}}'>
                                    <a data-bs-target="#showTrampolineModal" data-bs-toggle="modal" href="#">
                                        <img src="{{$Trampoline->image_url}}" class="d-block w-100" alt="...">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#trampolinesCarousel"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#trampolinesCarousel"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <button id="selectTrampoline" type="button" class="col btn opacity-60 btn-primary chooseButton"
                        style="width: 100%">
                    Pasirinkti batuta
                </button>
            </div>
            <div class="col-1"></div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7">
                <div class="text-center mt-3">
                    <h3>Jusu pasirinkti batutai</h3>
                </div>
                <ul id="SelectedTrampolines" class="list-group"></ul>
                <div class="row mt-3 ">
                    <div class="col-8"></div>
                    <div class="col-4 text-end">
                        <button class="btn btn-primary mt-3 d-flex align-items-center justify-content-center
                            sendToOrderButton w-75" id="sendToOrderButton" disabled>
                            <span id="buttonText">Užsakyti</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showTrampolineModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    {{--                    <div class="modal-header">--}}
                    {{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    {{--                    </div>--}}
                    <div class="modal-body">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img
                                        src="https://bouncycastlenetwork-res.cloudinary.com/image/upload/f_auto,q_auto,c_limit,w_1100/12e885a2ce90725ddac404eff42cef7e"
                                        class="d-block w-100 modal-image" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://m.media-amazon.com/images/I/71voD+9xCRL._AC_UF894,1000_QL80_.jpg"
                                         class="d-block w-100 modal-image" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img
                                        src="https://bouncycastlenetwork-res.cloudinary.com/316d6265d4ec22b8f761b96d7b521d22.jpg"
                                        class="d-block w-100 modal-image" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
                        <button type="button" class="btn btn-primary chooseTrampoline">Pasirinkti batutą</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_js')
    <script src="/js/trampolines/public/trampolines_public.js"></script>
@endsection

