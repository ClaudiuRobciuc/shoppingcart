@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4">
            <div class="img-thumbnail">
                <img src="{{ url('storage/fruits/'.$product->image) }}" style="width:27em; height:18em;" class="img-thumbnail" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>{!! $product->name !!}</h3>
                    <div class="clearfix">
                    <div class="pull-left price">{!! $product->price !!} kr.</div>
                        {!! Form::open([
                            'method' => 'POST',
                            'role' => 'form' ,
                            'class' => 'form-horizontal form-validate-jquery',
                            'id' => 'add',
                            'url' => route('frontpage.product.addToCart', ['id' => $product->id])
                        ])
                        !!}
                        {!! Form::number(
                            'amount',
                            '1',
                            ['class' => 'form-control', 'placeholder' => 'Amount']
                            )
                        !!}
                        {!! Form::submit('Add to Cart', ['class' => 'btn btn-primary', 'id' => 'add']) !!}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
        @endforeach
        </div>
    </div>
@endsection