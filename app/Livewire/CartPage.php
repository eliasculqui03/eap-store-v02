<?php

namespace App\Livewire;

use App\Helpers\CartMangement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Carrrito - EAP Store')]
class CartPage extends Component
{
    public $carrito_items = [];
    public $total_general;

    // Número de WhatsApp (configurable)
    public $whatsapp_number = '51928072414'; // Cambia por tu número

    public function mount()
    {
        $this->carrito_items = CartMangement::getCartItemsFromCookie();
        $this->total_general = CartMangement::calculateGrandTotal($this->carrito_items);
    }

    public function eliminarItem($itemId)
    {
        $this->carrito_items = CartMangement::removeCartItem($itemId);
        $this->total_general = CartMangement::calculateGrandTotal($this->carrito_items);
        $this->dispatch('actualizar-num-carrito', num_carrito: count($this->carrito_items))->to(Navbar::class);
    }

    public function incrementarItem($itemId)
    {
        $this->carrito_items = CartMangement::incrementQuantityToCartItem($itemId);
        $this->total_general = CartMangement::calculateGrandTotal($this->carrito_items);
    }

    public function decrementarItem($itemId)
    {
        $this->carrito_items = CartMangement::decrementQuantityToCartItem($itemId);
        $this->total_general = CartMangement::calculateGrandTotal($this->carrito_items);
    }

    public function enviarPorWhatsApp()
    {
        if (empty($this->carrito_items)) {
            session()->flash('error', 'El carrito está vacío');
            return;
        }

        $mensaje = $this->generarMensajeWhatsApp();
        $url = "https://api.whatsapp.com/send?phone={$this->whatsapp_number}&text=" . urlencode($mensaje);

        // Redirigir a WhatsApp
        return redirect()->away($url);
    }

    private function generarMensajeWhatsApp()
    {
        $mensaje = "🛒 *PEDIDO - EAP STORE* 🛒\n\n";
        $mensaje .= "📋 *Productos:*\n";
        $mensaje .= "━━━━━━━━━━━━━━━━━━━\n";

        foreach ($this->carrito_items as $item) {
            $mensaje .= "🔹 *{$item['name']}*\n";
            $mensaje .= "   💰 Precio: S/. " . number_format($item['unit_amount'], 2) . "\n";
            $mensaje .= "   📦 Cantidad: {$item['quantity']}\n";
            $mensaje .= "   💵 Subtotal: S/. " . number_format($item['total_amount'], 2) . "\n\n";
        }

        $mensaje .= "━━━━━━━━━━━━━━━━━━━\n";
        $mensaje .= "💳 *RESUMEN DEL PEDIDO:*\n";
        $mensaje .= "• Subtotal: S/. " . number_format($this->total_general, 2) . "\n";
        $mensaje .= "• IGV (18%): S/. 0.00\n";
        $mensaje .= "• Envío: S/. 0.00\n";
        $mensaje .= "━━━━━━━━━━━━━━━━━━━\n";
        $mensaje .= "🎯 *TOTAL: S/. " . number_format($this->total_general, 2) . "*\n\n";

        $mensaje .= "📱 Enviado desde EAP Store\n";
        $mensaje .= "🕒 " . now()->format('d/m/Y H:i') . "\n\n";
        $mensaje .= "¡Gracias por tu compra! 🙏";

        return $mensaje;
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
