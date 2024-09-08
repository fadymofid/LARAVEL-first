<?php

namespace App\Http\Controllers;

use App\Models\Order;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Display cart items
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalPrice = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['quantity'] * $item['price']);
        }, 0);

        return view('cart.index', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Add item to cart
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = products::find($productId);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name ?? 'Unnamed Product',
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image ?? 'default.jpg',
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('products.index')->with('success', 'Product added to cart');
    }

    // Update cart item quantity
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Remove item from cart
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Checkout and place order
    public function addToCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        // Add product to the cart session
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = products::findOrFail($productId);

        // Add or update product in the cart session
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image, // Assuming you have an image field
            ];
        }
        $request->session()->put('cart', $cart);


       return redirect()->back()->with('success', 'Product added to cart!');   }

    public function checkout(Request $request): \Illuminate\Http\RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        try {
            $order = Order::create(['user_id' => auth()->id()]);

            foreach ($cart as $productId => $item) {
                $order->products()->attach($productId, [
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Clear the cart
            $request->session()->forget('cart');

            return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'An error occurred while placing the order.');
        }
    }


// CartController.php

    public function removeFromCart(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $request->session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Product removed from cart');
        }

        return redirect()->route('cart.index')->with('error', 'Product not found in cart');
    }


}
