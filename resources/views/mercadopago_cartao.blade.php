@extends('layouts.app')


@section('content')
    
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

    
    <form method="POST" action="/pagar" id="paymentForm">
        @csrf
        
        <h3>Valor do pagamento:</h3>
        <input type="number" min="1" step="any" name="transactionAmount" id="amount" value="100" class="form-control"/>
        

        <br>
        
        <h3 class="title">Detalhes do comprador</h3>
        <div class="row">
            <div class="form-group col">
            <label for="email">E-Mail</label>
            <input id="email" name="email" type="text" class="form-control"></select>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-sm-5">
              <label for="docType">Tipo de documento</label>
              <select id="docType" name="docType" data-checkout="docType" type="text" class="form-control"></select>
            </div>
            <div class="form-group col-sm-7">
              <label for="docNumber">Número de documento</label>
              <input id="docNumber" name="docNumber" data-checkout="docNumber" type="text" class="form-control"/>
            </div>
          </div>

        <br>
        <h3 class="title">Detalhes do cartão</h3>
        <div class="row">
            <div class="form-group col-sm-8">
            <label for="cardholderName">Proprietário do cartão</label>
            <input id="cardholderName" data-checkout="cardholderName" type="text" class="form-control">
            </div>
            <div class="form-group col-sm-4">
            <label for="">Vencimento do cartão</label>
            <div class="input-group expiration-date">
                <input type="text" class="form-control" placeholder="MM" id="cardExpirationMonth" data-checkout="cardExpirationMonth"
                onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                <span class="date-separator">/</span>
                <input type="text" class="form-control" placeholder="AA" id="cardExpirationYear" data-checkout="cardExpirationYear"
                onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
            </div>
            </div>
            <div class="form-group col-sm-8">
            <label for="cardNumber">Número do cartão</label>
            <input type="text" class="form-control input-background" id="cardNumber" data-checkout="cardNumber" value=""
                onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
            </div>
            <div class="form-group col-sm-4">
            <label for="securityCode">CVV</label>
            <input id="securityCode" data-checkout="securityCode" type="text" class="form-control"
                onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
            </div>
            <div id="issuerInput" class="form-group col-sm-12 hidden">
            <label for="issuer">Issuer</label>
            <select id="issuer" name="issuer" data-checkout="issuer" class="form-control"></select>
            </div>
            <div class="form-group col-sm-12">
            <label for="installments">Parcelas</label>
            <select type="text" id="installments" name="installments" class="form-control"></select>
            </div>
            <div class="form-group col-sm-12">
            
            <input type="hidden" name="paymentMethodId" id="paymentMethodId" />
            <input type="hidden" name="description" id="description" />
            <br>
            <button type="submit" class="btn btn-primary btn-block">Pagar</button>
            
            </div>
        </div>
        
    </form>

    

@endsection