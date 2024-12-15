<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
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
     * show products of a category
     */
    public function categoryProducts($categoryId)
    {
        // Fetch the category and its related products
        $category = Category::findOrFail($categoryId);
        $products = $category->products; // Assuming Category has a relationship with Product

        return view('web.categoryProducts', compact('category', 'products'));
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
        $userId = auth()->id();
        
        // Fetch all products in the user's cart
        $cartItems = Cart::where('user_id', $userId)
                         ->with('product') // Assuming a relationship between Cart and Product models
                         ->get();

        // Calculate the total price
        $totalPrice = $cartItems->sum(function($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });

        return view('web.cart', compact('cartItems', 'totalPrice'));
    }

    public function removeFromCart($cartItemId)
{
    $cartItem = Cart::findOrFail($cartItemId);

    if ($cartItem->user_id === auth()->id()) {
        $cartItem->delete();
    }

    return redirect()->route('web.cart')->with('success', 'Product removed from cart!');
}

    /**
     * Display all categories.
     */
    public function categories()
    {
        // Fetch all categories
        $categories = Category::all();

        return view('web.categories', compact('categories'));
    }
}
