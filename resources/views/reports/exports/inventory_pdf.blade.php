@extends('layouts.app')

@section('content')
<h2>Inventory Report</h2>
		<hr>
		<table>
			<thead>
				<tr>
				<th>Name</th>
				<th>SKU</th>
				<th>Stock</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
					<tr>    
						<td>{{ $product->name }}</td>
						<td>{{ $product->sku }}</td>
						<td>{{ $product->stock }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
@endsection