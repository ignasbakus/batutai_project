@extends('layouts.layout')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                <button type="button" id="fireModal" class="btn btn-primary">
                    Launch demo modal
                </button>
                <button id="sampleAction" type="button" class="btn btn-primary">sampleAction</button>
                <button type="button" class="btn btn-secondary">Secondary</button>
                <button type="button" class="btn btn-success">Success</button>
                <button type="button" class="btn btn-danger">Danger</button>
                <button type="button" class="btn btn-warning">Warning</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Date: <input type="text" id="datepicker"></p>
            </div>
            <div class="col">
                <p id="tooltip" title="Testinis tooltipas">Testinis tooltipas</p>
            </div>
            <div class="col">
                <div id="accordion">
                    <h3>First</h3>
                    <div>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
                    <h3>Second</h3>
                    <div>Phasellus mattis tincidunt nibh.</div>
                    <h3>Third</h3>
                    <div>Nam dui erat, auctor a, dignissim quis.</div>
                </div>
            </div>
        </div>
        <div id="slider"></div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <th scope="row">{{$client->id}}</th>
                                <td>{{$client->name}}</td>
                                <td></td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script src="/js/clients.js"></script>
@endsection
