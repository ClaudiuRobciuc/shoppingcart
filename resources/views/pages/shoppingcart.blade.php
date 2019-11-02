@extends('layout.app')

@section('content')
<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
 
        <tbody>
            @foreach($cartProducts as $row) 
                <tr>
                    <td>
                        <p><strong>{{ $row->fruit->name }}</strong> <a data-id="{{ $row->id }}" href="javascript:;" class=" btn delete-btn btn-danger">X</a></p>
                    </td>
                    <td>{{ $row->amount }}</td>
                    <td>{{ $row->price }}</td>
                </tr>
            @endforeach
        </tbody>
        
        <tfoot>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td></td>
                <td>Total: {{$total}} kr</td>
            </tr>
        </tfoot>
 </table>

 {!! Form::open([
    'method' => 'POST',
    'role' => 'form' ,
    'class' => 'form-horizontal form-validate-jquery',
    'id' => 'pay',
    'url' => route('frontpage.shop.buyCart')
])
!!}
{!! Form::hidden('total', $total, ['id' => 'total']) !!}
{!! Form::submit('Pay', ['class' => 'btn btn-primary', 'id' => 'add']) !!}
{!! Form::close() !!}

{!! Form::open([
    'method' => 'POST',
    'role' => 'form' ,
    'class' => 'form-horizontal form-validate-jquery',
    'id' => 'removeItemForm',
    'url' => route('frontpage.shop.removeItem')
])
!!}

{!! Form::hidden('row_id', '', ['id' => 'rowId']) !!}
{!! Form::close() !!}

@endsection

@section('scripts')
<script>
    $('body').on('click', '.delete-btn', function() {
        id = $(this).attr('data-id');
        $('#rowId').val(id);
        $('#removeItemForm').submit();
    });
</script>
@endsection