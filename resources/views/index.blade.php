<x-app title="Inicio">
    <section class="d-flex justify-content-center" id="lmv">
        <h2>Los mas vendidos en Mercado Libre</h2>
    </section>

	<section class="d-flex flex-wrap justify-content-center">
        @foreach ( $products as $product )



        <div class="card mx-2 my-3 card_size">
			<div class="d-flex flex-wrap">
				<a class="mt-2">
					<strong>Categoria: </strong>{{ $product->category->name }}
				</a>
			</div>
            <img src="{{ $product->file->route }}" class="card-img-top" alt="Foto Producto">
            <div class="card-body">
              	<h5 class="card-title justify-content-center">{{ $product->name }}</h5>
				<h2 class="w-100 card-text">
					<strong>$ </strong>{{ $product->price}}
				</h2>
				<p class="card-text">Stock: {{$product->stock}}</p>
              {{-- <p class="card-text">{{ $product->format_description }}</p> --}}

            </div>

            <div class="card-footer">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-success" type="button">
                        Añadir al carrito
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </section>

</x-app>
