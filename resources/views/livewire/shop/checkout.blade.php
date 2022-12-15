<div class="container col-md-8 justify-content-center">
    <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
            <h5 class="my-0 fw-normal">Checkout</h5>
          </div>
        <div class="card-body">
            @if ($formCheckout)
                        <form wire:submit.prevent="checkout">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col">
                                        <input wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                                        @error('first_name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <input wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                                        @error('last_name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <input wire:model="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                                            @error('phone')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mb-3">
                                    <div class="col">
                                        <label for="">Address</label>
                                        <textarea wire:model="address" id="" cols="30" rows="5" class="form-control @error('address') is-invalid @enderror"></textarea>
                                        @error('address')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <input wire:model="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City">
                                            @error('city')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <input wire:model="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Postal Code">
                                            @error('postal_code')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                        @else
                        <button wire:click="$emit('payment', '{{ $snapToken }}')" class="btn btn-primary">Payment</button>
                        <script>
                            window.livewire.on('payment', function (snapToken) {
                                snap.pay(snapToken, {
                                    // Optional
                                    onSuccess: function (result) {
                                        // emit error
                                        window.livewire.emit('emptyCart');
                                        window.location.href = "/shop";
                                    },
                                    // Optional
                                    onPending: function (result) {
                                        location.reload();
                                    },
                                    // Optional
                                    onError: function (result) {
                                        location.reload();
                                    }
                                });
                            });
                        </script>
                    @endif
            </div>
      </div>
</div>
