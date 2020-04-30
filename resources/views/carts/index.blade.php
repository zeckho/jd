@extends('layouts.app')

@section('title', 'Carts')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-deck">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                        <tr>
                            <th scope="row">
                                <div class="row">
                                    <div class="col-sm-4 hidden-xs">
                                        @if ($cart->products->image)
                                        <img class="card-img-top" src="{{ url('storage/images/'.$cart->products->image) }}" alt="{{ $cart->products->name }}" data-holder-rendered="true" style="height: 95px; width: 130px; display: block;">
                                        @else
                                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x50]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_171c6305de1%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_171c6305de1%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 95px; width: 130px; display: block;">
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 class="nomargin">{{ $cart->products->name }}</h4>
                                    </div>
                                </div>
                            </th>
                            <td>${{ $cart->products->price }}</td>
                            <td>
                                <input type="number" value="{{ $cart->qty }}" class="form-control quantity w-25" />
                            </td>
                            <td class="text-center">
                                {{ $cart->discount ?? "-" }}
                            </td>
                            <td>${{ $cart->sub_price }}</td>
                            <td>
                                <button class="btn btn-info update-cart" data-id="{{ $cart->id }}"><i class="fa fa-refresh"></i></button>
                                <button class="btn btn-danger remove-from-cart" data-id="{{ $cart->id }}"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="font-weight-bold">Total:</td>
                            <td class="font-weight-bold">
                                @php
                                $totals = 0;
                                @endphp
                                @foreach($carts as $total)
                                @php
                                $totals += $total->sub_price;
                                @endphp
                                @endforeach
                                ${{ $totals }}
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                Add code voucher
                            </td>
                            <td colspan="4">
                                <input type="text" class="form-control voucher" />
                            </td>
                            <td>
                                <button class="btn btn-success discount">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: "{{ url('update-cart') }}",
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.attr("data-id"), 
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

        $(".discount").click(function (e) {
            e.preventDefault();
            
            var ele = $(this);
            
            $.ajax({
                url: "{{ url('submit-discount') }}",
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    voucher: ele.parents("tr").find(".voucher").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    
    </script>
@endsection