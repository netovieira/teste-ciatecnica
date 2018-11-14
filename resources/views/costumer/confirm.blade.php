@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cadastro de clientes</h5>
            <div class="row">
                <div class="col-12">
                    @if(isset($error) && $error)
                        <div class="alert alert-danger" role="alert">
                            Ops! ocorreu um erro ao tentar efetuar o cadastro
                        </div>
                    @else
                        <div class="alert alert-success" role="alert">
                            Cadastro realizado com sucesso!
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{url('/cliente')}}" class="btn btn-primary">Realizar um novo cadastro</a>
                </div>
            </div>
        </div>
    </div>
@endsection