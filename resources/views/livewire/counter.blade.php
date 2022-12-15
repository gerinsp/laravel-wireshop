
<div class="card mb-4 rounded-3 shadow-sm">
    <div class="card-header py-3">
      <h4 class="my-0 fw-normal">Dashboard</h4>
    </div>
    <div class="card-body">
        <div style="text-align: center">
            <button wire:click="increment">+</button>
            <h1>{{ $count }}</h1>
            <button wire:click="decrement">+</button>
        </div>
    </div>
  </div>