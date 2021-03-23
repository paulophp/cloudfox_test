@extends('layouts.app')


@section('content')
    
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

    
    <form method="POST" action="/boleto" id="paymentForm">
        @csrf

        <h3>Valor do pagamento:</h3>
        
        <div class="form-group">
            <input type="number" min="1" step="any" name="transactionAmount" id="amount" value="100" class="form-control"/>
        

        </div>


        
        <h3>Detalhe do comprador</h3>
        
        <div class="form-group">
            <label for="payerFirstName">Nome</label>
            <input required class="form-control" id="payerFirstName" name="payerFirstName" type="text" placeholder="Nome"></select>
        </div>
        <div class="form-group">
            <label for="payerLastName">Sobrenome</label>
            <input required class="form-control" id="payerLastName" name="payerLastName" type="text" placeholder="Sobrenome"></select>
        </div>
        <div class="form-group">
            <label for="payerEmail">E-mail</label>
            <input class="form-control" id="payerEmail" name="payerEmail" required type="text" placeholder="test@test.com"></select>
        </div>
        <div class="form-group">
            <label for="docType">Tipo de documento</label>
            <select class="form-control" id="docType" name="docType" data-checkout="docType" type="text"></select>
        </div>
        <div class="form-group">
            <label for="docNumber">Número do documento</label>
            <input class="form-control" required id="docNumber" name="docNumber" data-checkout="docNumber" type="text"/>
        
        </div>

        
        <div class="form-group">
            
            <input type="hidden" name="productDescription" id="productDescription" value="Produto de teste" />
            <br>
            <button class="btn btn-primary" type="submit">Pagar</button>
            <br>
        </div>
    
        
    </form>

    

@endsection