@extends('layouts.app')
@section('title','Álbum')
@section('style')
    <style>
        body {
            padding: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        :root {
            --jumbotron-padding-y: 10px;
        }

        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #ff0909;
        }

        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron-heading {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        .btn-card {
            margin: 4px;
        }

        .btn {
            margin-right: 5px;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }
    </style>
@endsection
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group text-left">
                            <label for="email" class="col-form-label">E-mail:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group text-left">
                            <label for="message" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="messaget" name="message"></textarea>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file">
                            <label for="file" class="custom-file-label">Choose a file:</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-dark">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 ">
                        <div class="card mb-4 shadow-lg bg-dark">
                            <img class="card-img-top figure-img img-fluid rounded" src="storage/{{$post->path_file}}">
                            <div class="card-body">
                                <p class="card-text text-light">{{$post->email}}</p>
                                <p class="card-text text-light">{{$post->message}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!--button type="button" class="btn btn-sm btn-outline-secondary">Download</button-->
                                        <a type="button" class="btn btn-sm btn-outline-light" href="{{route('download',$post->id)}}">Download</a>
                                        <form method="POST" action="{{route('delete',$post->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-4 ">
                    <div class="btn-dark card mb-lg-5 shadow-lg bg-dark" data-toggle="modal"
                         data-target="#exampleModal"
                         data-whatever="@getbootstrap">
                        <img type="button" class="card-img-top figure-img img-fluid rounded" src="storage/imgs/new-img.svg">
                        <div class="card-body">
                            <p class="text-light text-lg-center">Click for a new image</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Voltar para cima</a>
            </p>
            <p>©2018 Sua empresa.com</p>
        </div>
    </footer>
@endsection
