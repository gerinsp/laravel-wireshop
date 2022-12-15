<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search;
    public $formVisible;
    public $formUpdate = false;
    
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search' => [
        'except' => ''
    ]];

    protected $listeners = [
        'formClose' => 'formCloseHandler',
        'productStored' => 'productStoredHandler',
        'productUpdated' => 'productUpdateHandler'
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => $this->search === null ?
            Product::latest()->paginate($this->paginate) :
            Product::latest()->where('title', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate)
            ])->extends('layouts.main', [
            'title' => 'Product'
        ]);
    }

    public function formCloseHandler()
    {
        $this->formVisible = false;
    }

    public function productStoredHandler()
    {
        $this->formVisible = false;
        session()->flash('message', 'Your product was stored.');
    }

    public function editProduct($productId)
    {
        $this->formUpdate = true;
        $this->formVisible = true;
        $product = Product::find($productId);
        $this->emit('editProduct', $product);
    }
    public function productUpdateHandler()
    {
        $this->formVisible = false;
        session()->flash('message', 'Your product was updated.');
    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        session()->flash('message', 'Product was deleted!');

    }
}
