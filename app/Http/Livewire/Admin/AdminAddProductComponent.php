<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $sale_price;
    public $regular_price;
    public $SKU;
    public $quantity;
    public $stock_status;
    public $featured;
    public $image;
    public $category_id;

    public function mount(){

        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug(){

        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields){ 

        $this->validateOnly($fields,[

            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required'
        ]);
        
    }

    public function addProduct(){

        $this->validate([

            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required'

        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->sale_price = $this->sale_price;
        $product->regular_price = $this->regular_price;
        $product->SKU = $this->SKU;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products' , $imageName);
        $product->image = $imageName; 
        $product->save();

        session()->flash('message' , 'Product added successfully!');
    }

    public function render()
    {

        $categories = Category::all();

        return view('livewire.admin.admin-add-product-component',  ['categories' => $categories])->layout('layouts.admin');
    }
}
