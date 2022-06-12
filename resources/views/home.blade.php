@extends('layout.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1>Riwayat transaksi</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:10%">Kode</th>
                                <th style="width:50%">Waktu Transaksi</th>
                                <th style="width:30%">Total</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trans as $t)
                            <tr>
                                <td data-th="kode">{{$t->id}}</td>
                                <td data-th="waktu">{{$t->transaction_date}}</td>
                                <td data-th="total"> Rp. {{$t->total}}</td>

                                <td class="actions" data-th=""><a class="btn btn-info btn-sm update-cart" data-id="{{$t->id}}" href="{{route('transactions.show',$t->id)}}">view</a></td>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection