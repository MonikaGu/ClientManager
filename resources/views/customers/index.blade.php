@extends('layouts.app')
@section('content')
<div class="card-body">
    
    @if (session('status_success'))
        <h4 style="color: green">{{session('status_success')}}</h4>
    @else 
        <h4 style="color: red">{{session('status_error')}}</h4>
    @endif

    <form action="{{ route('customers.index') }}" method="GET">
        <select name="company_id" id="" class="form-control">
            <option value="" selected>Visi</option>
            @foreach ($companies as $company)
            <option value="{{ $company->id }}" 
                @if($company->id == app('request')->input('company_id')) 
                    selected="selected" 
                @endif>{{ $company->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="card-body">

    @if($errors->any())
    <h4 style="color: green">{{$errors->first()}}</h4>
    @endif
    
    <table class="table">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Telefono nr.</th>
            <th>El. paštas</th>
            <th>Komentaras</th>
            <th>Įmonė</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>{!! $customer->comment !!}</td>
            {{-- <td>{{ $customer->company->name }}</td> --}}
            <td>@if ($customer->company_id !== NULL)
                {{$customer->company->name}}
                @else
                {{"-"}}
            @endif</td>  
            <td>
                <form action={{ route('customers.destroy', $customer->id)  . 
                    ( app('request')->input('company_id') !== '' 
                        ? '?company_id=' . app('request')->input('company_id') 
                        : '' ) 
                    }} method="POST">
                    <a class="btn btn-success" href={{ route('customers.edit', $customer->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('customers.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection