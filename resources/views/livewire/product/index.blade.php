<div>
    @if ($formVisible)
        @if (! $formUpdate)
            @livewire('product.create')
        @else
            @livewire('product.update')
        @endif 
    @endif

    <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
        <div class="col float-end">
            <button wire:click="$toggle('formVisible')" class="btn btn-sm btn-primary">Create</button>
        </div>
        <h4 class="my-0 fw-normal">Product</h4>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-md-3 float-end">
                <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
            </div>
            <div class="col-md-1">
                <select class="form-select" wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                        <td>{{ $product->title }}</td>
                        <td>Rp{{ number_format($product->price,2,",",".") }}</td>
                        <td>
                            <button wire:click="editProduct({{ $product->id }})" class="btn btn-sm btn-info text-white">Edit</button>
                            <button wire:click="deleteProduct({{ $product->id }})" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>