@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <a href="{{route('show.neue.seite.form')}}" class="btn btn-secondary mt-3">Neue Seite hinzufügen</a>
                        </div>
                        <div class="col-md-6">
                            @if(session('success'))
                                <div class="alert alert-success" id="success-message">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    @include('partial.dashboard', ['allesSeitenURL' => $allesSeitenURL]);
                </div>
            </div>            
        </div>
    </div>
@endsection
