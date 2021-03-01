<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderDetail;
use App\Models\Product;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            // Se crea el usuario o actualiza el usuario
            // utilizando el numero de CI y email para comparar
            $user = User::updateOrCreate(
                [
                    'email' => $request->email,
                    'document_number' => $data['customer']['document_number']
                ],
                [
                    'name' => $data['customer']['name'],
                    'last_name' => $data['customer']['last_name'],
                    'business_name' => $data['customer']['business_name'],
                    'ruc' => $data['customer']['ruc'],
                    'phone_number' => $data['customer']['phone_number'],
                ]
            );

            $address = Address::updateOrCreate(
                [
                    'main_street' => $data['customer']['address']['main_street'],
                    'main_number' => $data['customer']['address']['main_number']
                ],
                [
                    'intersection_street_first' => $data['customer']['address']['intersection_street_first'],
                    'intersection_street_second' => $data['customer']['address']['intersection_street_second'],
                    'reference' => $data['customer']['address']['reference'],
                    'contact' => $data['customer']['address']['contact'],
                    'user_id' => $user->id,
                    'city_id' => $data['customer']['address']['city_id'],
                ]
            );

            $order = Order::create([
                'user_id' => $user->id,
                'payment_method_id' => $data['payment_method'],
                'shipping_address_id' => $address->id,
                'user_raw_data' => $user,
                'address_raw_data' => $address,
                'amount' => 0,
                'comments' => $data['comments'] ?? null,
                'shipping_type' => $data['shipping_type'] ?? 1,
                'schedule' => $data['schedule'] ?? null
            ]);

            foreach ($data['products'] as $item) {
                $product = Product::find($item['product_id']);

                $order_detail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'total_amount' => $product->price * $item['quantity']
                ]);
            }

            return response($order);

            // Se crea el pedido
            $order = Order::create();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}