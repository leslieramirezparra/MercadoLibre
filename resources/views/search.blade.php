<x-app title="Resultados de Búsqueda">
    <div class="container">

        @if (count($products) > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4 justify-content-center">
                        <div class="card h-100">
                            <div class="card-header justify-content-center">
                                <h2 class="card-title justify-content-center">{{ $product->name }}</h2>
                            </div>
                            <div class="card-body justify-content-center">
                                <img src="{{ $product->file->route }}" alt="{{ $product->name }}"
                                    class="card-img-top img-fluid">
								<h2 class="w-100 card-text">
									<strong>$ </strong>{{ $product->price}}
								</h2>
                                <p><strong>Stock:</strong> {{ $product->stock }}</p>
                                <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn d-flex flex-wrap" id="botones">
									Ver Detalles
								</a>
								<a href="/" class="btn my-2" id="botones">
									Ver todos los productos
								</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info" role="alert">
                No se encontraron productos que coincidan con la búsqueda.
            </div>
        @endif
    </div>

    <script>
        document.getElementById('search-form').addEventListener('submit', function(event) {
            var queryInput = document.querySelector('input[name="query"]');
            if (queryInput.value.trim() === '') {
                event.preventDefault();
            }
        });
    </script>
</x-app>
