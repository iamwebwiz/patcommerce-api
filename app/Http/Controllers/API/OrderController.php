<?php

namespace App\Http\Controllers\API;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderResource::collection(Order::whereUserId(Auth::id())->with(['user', 'orderItems'])->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'identifier' => Str::random(10),
            'user_id' => Auth::id(),
        ]);

        $cart = Cart::whereUserId(Auth::id())->get();

        $total_price = collect($cart->pluck('price'))->sum();

        $order->total_price = $total_price;
        $order->save();

        foreach ($cart as $cartItem) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->name = $cartItem->product->name;
            $order_item->price = $cartItem->price;
            $order_item->quantity = $cartItem->quantity;
            $order_item->save();
        }

        return redirect('/api/cart/flush');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {
        $order->delete();

        return response()->json(null, 204);
    }
}
