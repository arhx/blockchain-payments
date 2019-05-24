@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="alert alert-info">
            <p>Для пополнения вашего счета на <b>{{ $amount_usd }}</b> USD {{--с учетом комиссии {{ $commission }}%--}} вам необходимо отправить <b>{{ $amount_btc }}</b> BTC на ваш персональный платежный адрес <b>{{ $address }}</b></p>
            <p>Курс обмена на USD будет получен с blockchain.info в момент совершения платежа, текущий курс <b>{{ $btc_price }}</b></p>
        </div>
    </section>
@endsection