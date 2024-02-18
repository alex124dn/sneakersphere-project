@extends('shop')
   
@section('content')
<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th class="text-center">Price</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $shoes)
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('images')}}/{{ $shoes['image']  }}" class="card-img-top" style="width: 50px;"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $shoes['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price" class="text-center">${{ $shoes['price'] }}</td>
                    <td class="actions text-center">
                        <a class="btn btn-danger delete-product"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-danger">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
   
@section('scripts')
<script type="text/javascript">
   
    $(".delete-product").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{route('deleteProduct')}}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection