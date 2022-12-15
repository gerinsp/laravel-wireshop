<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(45 62 80)">
    <div class="container">
        <a class="navbar-brand text-bold" href="/">WireShop.id</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('shop.index') }}">Shop</a>
                </li>
                <li class="nav-item" style="margin-left: 8px">
                    @livewire('shop.cartnav')
                </li>
                
            </ul>
        <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{  auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a href="{{ route('admin.product') }}" class="dropdown-item"><i class="bi bi-bag"></i> Product</a>
                        <li><hr class="dropdown-divider"></li>
                      <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                      </form>
                    </li>
                  </ul>
            </li>
            @else
            <li class="nav-item">
                <a href="/login" class="nav-link active"><i class="bi bi-box-arrow-right"></i> Login</a>
            </li>
            @endauth
        </ul>
        </div>
    </div>
</nav>

