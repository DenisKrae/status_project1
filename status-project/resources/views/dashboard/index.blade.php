@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="card">
                @include('partial.dashboard', ['allesSeitenURL' => $allesSeitenURL])
            </div>
        </div>
    </div>
</div>
@endpush
@endsection

