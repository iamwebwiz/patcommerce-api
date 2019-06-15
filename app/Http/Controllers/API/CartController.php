<?php

namespace App\Http\Controllers\API;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return CartResource::collection(Cart::whereUserId(Auth::id())->with(['user', 'product'])->get());
    }

    /**
     * Add item to cart
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ]);
        }

        $cart = Cart::create([
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
        ]);

        return new CartResource($cart);
    }

    public function remove(Cart $cart)
    {
        $cart->delete();

        return response()->json([
            'message' => 'Item removed from cart.',
            'status' => 'success',
        ], 200);
    }

    /**
     * Remove all items in user cart
     */
    public function flush(Request $request)
    {
        $cart = Cart::whereUserId(Auth::id())->get();

        foreach ($cart as $item) {
            $item->delete();
        }

        return response()->json([
            'status' => 'success',
        ], 200);
    }
}
