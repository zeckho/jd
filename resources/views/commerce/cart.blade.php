@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class="row">
        <div class="col-lg-12 text-center">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th class="text-center">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            
                    <?php $total = 0 ?>
            
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
            
                    <?php $total += $details['price'] * $details['quantity'] ?>
            
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
            
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total {{ $total }}</strong></td>
                    </tr>
                    <tr>
                        <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection