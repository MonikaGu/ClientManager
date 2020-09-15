@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime informaciją apie klientą</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                        @csrf @method("PUT")

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>

                        @error('surname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Pavardė: </label>
                            <input type="text" name="surname" class="form-control" value="{{ $customer->surname }}"> 
                        </div>

                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Telefono nr.: </label>
                            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}"> 
                        </div>

                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- @if($errors->any())
                            <h4 style="color: red">{{$errors->first()}}</h4>
                        @endif --}}

                        <div class="form-group">
                            <label>El. paštas: </label>
                            <input type="text" name="email" class="form-control" value="{{ $customer->email }}"> 
                        </div>

                        @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Komentaras: </label>
                            <input type="text" id="mce" name="comment" class="form-control" value="{{ $customer->comment }}"> 
                        </div>
                        <div class="form-group">
                            <label>Įmonė: </label>
                            <select name="company_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite įmonę</option>
                                 <option value="{{NULL}}">-</option>
                                 @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if($company->id == $customer->company_id) selected="selected" @endif>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection