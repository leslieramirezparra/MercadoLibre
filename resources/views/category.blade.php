<x-app title="Productos de {{ $category->name }}">
    <div class="container">
        <section class="my-3">
            <h1 class="text-center">Productos de {{ $category->name }}</h1>
        </section>

        <section class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->file->route }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-header">
                            <h2 class="h5 text-center">{{ $product->name }}</h2>
                        </div>
                        <div class="card-body">
							<h2 class="w-100 card-text">
								<strong>$ </strong>{{ $product->price}}
							</h2>
                            <p class="mb-1">Descripción: {{ $product->description }}</p>
                            <p class="mb-1">Stock: {{ $product->stock }}</p>
                        </div>
                        <div class="card-footer d-grid gap-2">
                            <a href="{{ route('product.show', $product->id) }}" class="btn" id="botones">Ver Detalles del
                                Producto</a>
                            <a href="{{ route('product.add-to-cart', ['product' => $product->id]) }}" class="btn" id="botones">
								Agregar al Carrito <i class="fa-solid fa-cart-shopping"></i>
							</a>
							<a href="/" class="btn" id="botones">
								Volver
							</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
</x-app>
