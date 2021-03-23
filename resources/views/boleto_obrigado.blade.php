@extends('layouts.app')


@section('content')
    <div class="row">
        <h2>Obrigado!</h2>
        
        <h3>O Pagamento por boleto está pendente, clique no botão abaixo para imprimir o boleto!</h3>
        
        <div class="form-group">
            <a href="{{ $link }}" target="_blank" class="btn btn-primary">Imprimir boleto</a>
    
        </div>
    </div>

@endsection