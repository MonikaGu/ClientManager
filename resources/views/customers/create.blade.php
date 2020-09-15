@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurkime naują klientą:</div>
               <div class="card-body">
                   <form action="{{ route('customers.store') }}" method="POST">
                        @csrf

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        @error('surname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Pavardė: </label>
                            <input type="text" name="surname" class="form-control"> 
                        </div>

                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Telefono nr.: </label>
                            <input type="text" name="phone" class="form-control"> 
                        </div>

                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- @if($errors->any())
                            <h4 style="color: red">{{$errors->first()}}</h4>
                        @endif --}}

                        <div class="form-group">
                            <label>El. paštas: </label>
                            <input type="text" name="email" class="form-control"> 
                        </div>

                        @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Komentaras: </label>
                            <input type="text" id="mce" name="comment" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Įmonė: </label>
                            <select name="company_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite įmonę</option>
                                 <option value="{{NULL}}">-</option>
                                 @foreach ($companies as $company)
                                 <option value="{{ $company->id }}">{{ $company->name }}</option>
                                 @endforeach
                            </select>
                        </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
