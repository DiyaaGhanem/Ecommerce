<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{

    public $search;
    public $product_cat;
    public $product_cat_id;

    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount(){

        $this->sorting = 'default';
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 1000;
        
        $this->fill(request()->only('search' , 'product_cat' , 'product_cat_id'));

    }

    public function store($product_id , $product_name , $product_price){

        Cart::instance('cart')->add($product_id , $product_name , 1 , $product_price)->associate('App\Models\Product');
        session()->flash('message' ,'Item added to Cart successfully!');
        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id , $product_name , $product_price){

        Cart::instance('wishlist')->add($product_id , $product_name , 1 , $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component' , 'refreshComponent');
    }

    public function removeFromWishlist($product_id){

        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component' , 'refreshComponent');
                return ;
            }
        }
    }


    use WithPagination;

    public function render()
    {
        if($this->sorting == 'date'){

            $products = Product::whereBetween('regular_price' , [$this->min_price , $this->max_price])->where('name', 'like' , '%'. $this->search .'%' )->where('category_id' ,'like' , '%' . $this->product_cat_id. '%')->orderBy('created_at' , 'DESC')->paginate($this->pagesize);

        }else if($this->sorting == 'price'){

            $products = Product::whereBetween('regular_price' , [$this->min_price , $this->max_price])->where('name', 'like' , '%'. $this->search .'%' )->where('category_id', 'like' , '%' .  $this->product_cat_id. '%')->orderBy('regular_price' , 'ASC')->paginate($this->pagesize);

        }else if($this->sorting == 'price-desc'){

            $products = Product::whereBetween('regular_price' , [$this->min_price , $this->max_price])->where('name', 'like' , '%'. $this->search .'%' )->where('category_id' ,'like' , '%' . $this->product_cat_id. '%')->orderBy('regular_price' , 'DESC')->paginate($this->pagesize);  

        }else{

            $products = Product::whereBetween('regular_price' , [$this->min_price , $this->max_price])->where('name', 'like' , '%'. $this->search .'%' )->where('category_id' ,'like' , '%' . $this->product_cat_id. '%')->paginate($this->pagesize);

        }

        $categories = Category::all();

        $sale = Sale::find(1)->first();

        return view('livewire.search-component', ['products' => $products , 'categories' => $categories , 'sale' =>$sale])->layout('layouts.base');
    }
}
