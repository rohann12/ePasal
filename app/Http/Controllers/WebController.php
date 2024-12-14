<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    /**
     * Display the homepage with all products.
     */
    public function index()
    {
        // Fetch all products with their categories
        $products = Product::with('category')->get();

        return view('web.home', compact('products'));
    }

    /**
     * Show details of a single product.
     */
    public function showProduct($id)
    {
        // Fetch the product with its category
        $product = Product::with('category')->findOrFail($id);

        return view('web.details', compact('product'));
    }

    /**
     * Add a product to the cart.
     */
    public function addToCart($productId)
    {
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'quantity' => 1,
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    /**
     * Display the cart.
     */
    public function showCart()
    {
        // Fetch the current cart from the session
        $cart = Session::get('cart', []);

        return view('web.cart', compact('cart'));
    }


}
