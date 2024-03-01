<x-app title="Inicio">
    <section class="d-flex justify-content-center" id="lmv">
        <h2>Los mas vendidos en Mercado Libre</h2>
    </section>

	<section class="d-flex flex-wrap justify-content-center">

		@foreach($categories as $category)
    		 <h2>{{ $category->name }}</h2>
    			<ul>
					@foreach($category->products as $product)

						<div class="card mx-2 my-3 card_size">
							<img src="{{ $product->file->route }}" class="card-img-top" alt="Foto Producto">
							<div class="producto">
								<img src="{{ asset($product->image) }}" alt="Producto">
							</div>
							<div class="card-body">
								<h5 class="card-title justify-content-center">{{ $product->name }}</h5>
								<h2 class="w-100 card-text">
									<strong>$ </strong>{{ $product->price}}
								</h2>
								<p class="card-text">Stock: {{$product->stock}}</p>
							{{-- <p class="card-text">{{ $product->format_description }}</p>--}}
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
				</ul>
		@endforeach

	</section>
	{{-- <section class="d-flex flex-wrap justify-content-center">
		<table id="products_table" class="table">
			<thead>
				<tr>
					<th>Categoría</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Stock</th>
					<th></th> <!-- Espacio para el botón de añadir al carrito -->
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
					<tr>
						<td>{{ $product->category->name }}</td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->price }}</td>
						<td>{{ $product->stock }}</td>
						<td>
							<button class="btn btn-outline-success" type="button">
								Añadir al carrito
							</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</section> --}}
</x-app>
{{-- {{ $scripts ?? '' }} --}}
{{-- @section('scripts')
    <script>
        $(document).ready(function() {
            $('#search_form').submit(function(e) {
                e.preventDefault();
                var searchTerm = $('#search_input').val();
                $('#products_table').DataTable().search(searchTerm).draw();
            });
        });
    </script>
@endsection --}}
