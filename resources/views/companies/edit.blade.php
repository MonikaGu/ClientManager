@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime informaciją apie įmonę</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('company.update', $company->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">

                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                            <label for="">Pavadinimas</label>
                            <input type="text" name="name" class="form-control" value="{{ $company->name }}">
                        </div>

                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="">Adresas</label>
                            <input type="text" name="address" class="form-control" value="{{ $company->adsress }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection