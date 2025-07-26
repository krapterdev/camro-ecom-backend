<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();
        return response()->json($cartItems);
    }

    public function store(Request $request)
    {

        foreach ($request->items as $item) {
            Cart::updateOrCreate(
                [
                    'user_id' => $item['product_id'],
                    'product_id' => $item['product_id']
                ],
                [
                    'quantity' => $item['quantity']
                ]
            );
        }

        return response()->json(['message' => 'Cart saved successfully']);
    }


    public function destroy($id)
    {
        $userId = Auth::id();
        $cartItem = Cart::where('user_id', $userId)->where('id', $id)->first();

        if (!$cartItem) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        $cartItem->delete();
        return response()->json(['message' => 'Item removed from cart']);
    }
}
