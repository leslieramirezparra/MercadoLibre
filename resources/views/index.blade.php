<x-app title="Inicio">
    <section class="d-flex justify-content-center" id="lmv">
		<h2 class="my-3 text-center">Los mas vendidos en Mercado Libre</h2>
    </section>

	<section class="d-flex flex-wrap justify-content-center">

		@foreach ($categories as $category)
			@if($category->products->count()>0)
            <div class="card my-5">
                <div class="card-header text-white text-center" id="areaCategoria">

						<a href="{{ route('category.show', ['category' => $category->id]) }}" class="btn btn-lg btn-block" id="botones">
							{{ $category->name }}
						</a>

                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                        @php
                            $products = $category->products->where('stock', '>', 0)->take(5);
                        @endphp

                        @foreach ($products as $product)
                            <div class="col">
                                <div class="card h-100 text-center">
                                    <img src="{{ $product->file->route }}" class="card-img-top img-fluid"
                                        alt="{{ $product->name }}" style="max-height: 200px; object-fit: contain;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <h2 class="w-100 card-text">
											<strong>$ </strong>{{ $product->price}}
										</h2>
                                        <p class="card-text">Stock: {{ $product->stock }}</p>
                                    </div>
									<div class="card-footer">
										<div class="d-grid gap-2">
											<a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn" id="botones">
												Ver Detalles del Producto
											</a>
											{{-- <button class="btn btn-outline-success" type="button">
												Añadir al carrito
											</button> --}}
											<a href="{{ route('product.add-to-cart', ['product' => $product->id]) }}"
												class="btn" id="botones">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
										</div>
									</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
			@endif
        @endforeach
	</section>
</x-app>
