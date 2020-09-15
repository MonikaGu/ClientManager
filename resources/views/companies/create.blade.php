@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurkime naują įmonę:</div>
               <div class="card-body">
                   <form action="{{ route('company.store') }}" method="POST">
                       @csrf

                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                       <div class="form-group">
                           <label>Pavadinimas: </label>
                           <input type="text" name="name" class="form-control">
                       </div>

                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                       <div class="form-group">
                           <label>Adresas: </label>
                           <input type="text" name="address" class="form-control"> 
                       </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection