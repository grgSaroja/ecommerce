@extends('frontend.layout.product.product-master')

	@section('content')

	<!-- Shoping Cart -->
		{{-- {{ csrf_field() }} --}}
        <form class="bg0 p-t-75 p-b-85" method="POST">

		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>

								</tr>
                                @php
									$total =0;
                                    $sub_total=0;

								@endphp
								
                                @foreach ($cartProduct as $Items)
                                @foreach ($Items['product'] as $prod)

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{ URL::asset('images/product/'. $prod['image'] ) }}" alt="IMG">
										</div>
									</td>


									<td class="column-4">{{ $prod['price'] }}</td>
									<td class="column-5"> {{ $prod['quantity'] }}</td>
									
								</tr>

								@endforeach
                                @endforeach

                                @php
								$sub_total +=$prod['price'] * $prod['quantity'];
                                $total = $sub_total+100;

								@endphp
							
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
                                    {{ $sub_total }}

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
								<span class="mtext-110 cl2">
                                    {{ $total }}
								</span>
							</div>
						</div>

					
                        <a href="{{ route('order.checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Place Order
                        </a>
					</div>
				</div>
			</div>
		</div>
		
        </form>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	


@endsection

