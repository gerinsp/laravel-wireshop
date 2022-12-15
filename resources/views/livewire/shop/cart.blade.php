<div class="container col-md-8 justify-content-center">
    <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart['products'] as $product)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $product->title }}</td>
                        <td>Rp{{ number_format($product->price,2,",",".") }}</td>
                        <td>
                            <button wire:click="removeFromCart({{ $product->id }})" class="btn btn-sm btn-danger">Remove</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <a href="{{ route('shop.checkout') }}" class="btn btn-primary float-end">Checkout</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
      </div>
</div>
