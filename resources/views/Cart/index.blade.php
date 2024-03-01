<x-app title="Carrito de Compras">
    <div class="container">
        <h1>Carrito de Compras</h1>

        @if (count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>
                                @if ($cartItem->product->file->route)
                                    <img src="{{ $cartItem->product->file->route }}" alt="{{ $cartItem->product->name }}"
                                        style="width: 100px; height: auto;">
                                @else
                                    No hay imagen disponible
                                @endif
                            </td>
                            <td>{{ $cartItem->product->name }}</td>
                            <td>
                                <form action="{{ route('cart.update', ['id' => $cartItem->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $cartItem->quantity }}"
                                        min="1">
                                    <button type="submit" class="btn" id="botones">Actualizar</button>
                                </form>
                            </td>
                            <td>${{ $cartItem->price_unit }}</td>
                            <td>${{ $cartItem->price_total }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', ['id' => $cartItem->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--Clear button-->
            @if (count($cartItems) > 0)
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mx-2">Limpiar Carrito</button>
					<a href="/" class="btn" id="botones">Ver todos los productos <i class="fa-solid fa-circle-arrow-left"></i></a>
                </form>
				<div class="d-flex justify-content-end">
					<a href="/" class="btn btn-lg btn-block" id="botones">Pagar</i></a>
				</div>
            @endif
        @else
            <p>No hay productos en el carrito.</p>
            <a href="/" class="btn" id="botones">Ver productos <i class="fa-solid fa-house"></i></a>
        @endif
    </div>

</x-app>
