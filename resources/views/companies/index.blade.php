@extends('layouts.app')
@section('content')
<div class="card-body">

    @if (session('status_success'))
        <h4 style="color: green">{{session('status_success')}}</h4>
    @else 
        <h4 style="color: red">{{session('status_error')}}</h4>
    @endif


    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Adresas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->address }}</td>
            <td>
                <form action={{ route('company.destroy', $company->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('company.edit', $company->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('company.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection