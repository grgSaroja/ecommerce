@extends('frontend.layout.product.product-master')

	@section('content')

	<form class="bg0 p-t-75 p-b-85" method="POST">
		<div class="container">

			@include('frontend.layout.flash')
			@if ( $cartItems)

			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									{{-- <th class="column-5">Total</th> --}}
									<th class="column-5">Action</th>
								</tr>
								@php
									$total =0;
									$sub_total=0;
								@endphp
								
									

									@foreach ($cartItems as $Items)
									@foreach ($Items['product'] as $prod)
								{{-- @foreach ($Items['cart'] as $cart) --}}


								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{ URL::asset('images/product/'. $prod['image'] ) }}" alt="IMG">
										</div>
									</td>


									<td class="column-3"> Rs.{{ $prod['price']  }}</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0 height">
											<input class="mtext-104 cl3 txt-center productId" type="hidden" value= "{{ $prod['product_id']}}" >
											{{-- data-cartid= "{{ $prod['product_id']}}" --}}
											<button class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m quantity_increment"   >
												-
											</button>
											

											<input class="mtext-104 cl3 txt-center num-product" type="number" value= "{{ $prod['quantity']}}" name="num-product1" value="1">

											<button class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m  quantity_increment "  >
												+
											</button>
										</div>
									</td>
									{{-- <td class="column-5">Rs.{{ $prod['price']  }}</td> --}}
									<td class="column-5">
										<div class=" col-md-2 deldata">
											
											<input class="mtext-104 cl3 txt-center productId" type="hidden" value= "{{ $prod['product_id']}}" >
											<input class="mtext-104 cl3 txt-center cartId" type="hidden" value= "{{ $prod['cart_id']}}" >
											<input class="cal"  name="total" type="hidden" value= "{{  $total }}" >

											{{-- <button class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m  quantity_increment "  >
												Remove
											</button> --}}
											<button class=" btn btn-danger delete-cart">
												Remove
											</button>
										</div>
									</td>
								</tr>

								


								@php
								$sub_total +=$prod['price'] * $prod['quantity'];
                                $total = $sub_total+100;								
								@endphp
								{{-- @endforeach --}}
								@endforeach
								@endforeach
								
							
							</table>
						
						</div>

						
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									Rs.{{ $sub_total }}
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								
									<div class=" bg0 m-b-12">
										<p>Rs. 100</p>
									</div>
									
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2 total">

									Rs.{{ $total }}
								</span>
							</div>
						</div>

					
						<a href="{{ route('orders.index') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
                        </a>
						
					{{-- {{ $_SESSION['message']; }}  --}}

					</div>
				</div>
			</div>

			
			@else

			<div class="row">
				
					<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
						<div class="m-l-25 m-r--38 m-lr-0-xl">
							<div class="wrap-table-shopping-cart">			
								<a href="{{ route('home') }}"  class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer ">
									cart empty continue shopping
								</a>
							</div>
						</div>
					</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									{{-- Rs.{{ $sub_total }} --}}
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								
									<div class=" bg0 m-b-12">
										<p>Rs. 100</p>
									</div>
									
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2 total">

									{{-- Rs.{{ $total }} --}}
								</span>
							</div>
						</div>

					
						{{-- <a href="{{ route('orders.index') }}"  class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
                        </a> --}}
						
					{{-- {{ $_SESSION['message']; }}  --}}

					</div>
				</div>
			</div>
		@endif
		</div>
		
	</form>
		
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	{{-- @include('frontend.layout.register')
	@include('frontend.layout.login') --}}


@endsection

@section('scripts')

<script type="text/javascript">

$('.quantity_increment').click(function (e) {
	e.preventDefault();
	//alert("hi");
	 // va=$(this).data('cartid');
	var product_id=$(this).closest('.height').find('.productId').val();
	var quantity = $(this).closest('.table_row').find('.num-product').val();
	//var total = $(this).closest('.deldata').find('.cal').val();

	//alert(total);
	

	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	})
	$.ajax({
		// headers:{
		// 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// }
	url: 'update-cart',
	type: "post",
	data: {
		//_token: $('meta[name="csrf-token"]').attr('content'),
		id: product_id, 
		quantity: quantity,
	},
	success: function (response) {
		window.location.reload();
		//alert(response);
	}
});
});


// $.ajaxSetup({
// 		headers:{
// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 		}
// 	})

$('.delete-cart').click(function (e) {
	e.preventDefault();
	//alert('he');
	
	var product_id=$(this).closest('.deldata').find('.productId').val();
	var cart_id=$(this).closest('.deldata').find('.cartId').val();

	//alert(product_id);

	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	})
	$.ajax({
		// headers:{
		// 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// }
	url: 'delete-cart',
	type: "post",
	data: {
		// _method: delete,
		productId: product_id,
		cartId: cart_id,
	},
	success: function (response) {
		window.location.reload();
		//alert(response);
	},
	error: function(xhr){
		console.log(xhr.responseText);
	}
});
});
</script>


@endsection