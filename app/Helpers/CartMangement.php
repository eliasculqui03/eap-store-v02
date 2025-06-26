<?php

namespace App\Helpers;

use App\Models\Producto;
use Illuminate\Support\Facades\Cookie;

class CartMangement
{

    //agregar item al carrito
    static public function addItemToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        $existing_item = null;

        foreach ($cart_items as $key => $item) {


            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {

            $product = Producto::where('id', $product_id)->first(['id', 'nombre', 'precio', 'images']);

            if ($product) {
                $cart_items[] = [
                    'product_id' => $product_id,
                    'name' => $product->nombre,
                    'unit_amount' => $product->precio,
                    'quantity' => 1,
                    'image' => $product->images[0],
                    'total_amount' => $product->precio,
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);


        return count($cart_items);
    }



    //agregar item al carrito
    static public function addItemToCartWithQuantity($product_id, $quantity = 1)
    {
        $cart_items = self::getCartItemsFromCookie();

        $existing_item = null;

        foreach ($cart_items as $key => $item) {


            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity'] = $quantity;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        } else {

            $product = Producto::where('id', $product_id)->first(['id', 'nombre', 'precio', 'images']);

            if ($product) {
                $cart_items[] = [
                    'product_id' => $product_id,
                    'name' => $product->nombre,
                    'unit_amount' => $product->precio,
                    'quantity' => $quantity,
                    'image' => $product->images[0],
                    'total_amount' => $product->precio,
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);


        return count($cart_items);
    }




    // remove item del carrito

    static public function removeCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {

            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]);
                break;
            }
        }

        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }

    //agregar los items del carrito a las cookies

    static public function addCartItemsToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }


    // limpiar los imtems del carrito de las cookies
    static public function clearCartItems()
    {
        Cookie::queue(Cookie::forget('cart_items'));
    }

    // obtener todos los items del carrito de las cookies

    static public function getCartItemsFromCookie()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);

        if (!$cart_items) {
            $cart_items = [];
        }
        return $cart_items;
    }

    // incrementar la cantidad de un item

    static public function incrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {

            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }

        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }

    // decrementar la cantidad de un item

    static public function decrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {

            if ($item['product_id'] == $product_id) {
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
                }
            }
        }

        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }



    //calulcar el total general

    static public function calculateGrandTotal($items)
    {

        return array_sum(array_column($items, 'total_amount'));
    }
}
