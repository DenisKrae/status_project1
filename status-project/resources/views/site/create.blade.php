@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Neue Seite hinzufügen</div>
                    <div class="card-body">
                        <form action="{{route('form.submit')}}" method="POST">
                            @csrf {{--  Prevent CSRF (Cross-Site Request Forgery) attacks  --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="site" class="form-label">Seite</label>
                                        <input type="text" class="form-control @error('site') is-invalid @enderror"
                                            id="site" name="site" placeholder="Seite Name">
                                        @error('site')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="url" class="form-label">URL</label>
                                        <input type="text" class="form-control @error('url') is-invalid @enderror"
                                            id="url" name="url" placeholder="Seite URL">
                                        @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="url_zu_git" class="form-label">URL Zu Git</label>
                                        <input type="text"
                                            class="form-control @error('url_zu_git') is-invalid @enderror"
                                            id="url-zu-git" name="url_zu_git" placeholder="URL Zu Git">
                                        @error('url_zu_git')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="auftrag" class="form-label">Auftrag</label>
                                        <select class="form-select @error('auftrag') is-invalid @enderror"
                                            aria-label="Default select example" id="auftrag" name="auftrag">
                                            <option selected>Wählen Sie die Auftrag</option>
                                            <option value="Stundenbasiert (monatliche Abrechnung)">Stundenbasiert
                                                (monatliche Abrechnung)</option>
                                            <option value="Stundenbasiert (quartalweise Abrechnung)">Stundenbasiert
                                                (quartalweise Abrechnung)</option>
                                            <option value="Pauschal mit Hosting(jährlich Abrechnung)">Pauschal mit
                                                Hosting(jährlich Abrechnung)</option>
                                            <option value="Pauschal (jährliche Abrechnung)">Pauschal (jährliche
                                                Abrechnung)</option>
                                        </select>
                                        @error('auftrag')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kommentare">Kommentare</label>
                                        <textarea type="text"
                                            class="form-control @error('kommentare') is-invalid @enderror"
                                            id="kommentare" name="kommentare" placeholder="Kommentare" rows="11"
                                            cols="12"></textarea>
                                    </div>
                                    @error('kommentare')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary"
                                            style="width: 15%;">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container">
                        <div class="row mt-3 justify-content-center">
                            <div class="col-md-12 justify-content-center">
                                @if(session('error'))
                                <div class="alert alert-danger" style="width: 50%">
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
