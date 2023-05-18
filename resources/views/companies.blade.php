@extends('layouts.navbar')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de empresas</div>
                <div class="card-body">
                    <ul>
                        @foreach ($companies as $company)
                            <p>{{ $company->nick }}</p>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection