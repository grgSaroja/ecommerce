
@extends('frontend.layout.product.product-master')


      @section('content')
  
      <!-- Shoping Cart -->
      <form class="bg0 p-t-75 p-b-85" action="{{ route('cart.store', $product_detail) }}" method="POST">
          <div class="container">
        
              <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="{{ asset('/images/product/'.                 $product_detail->image) }}">

                                    <div class="wrap-pic-w pos-relative">
                                        <img src=" {{ asset('/images/product/'.$product_detail->image) }}" height="700px">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              
                
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product_detail->product }}
                        </h4>

                        <span class="mtext-106 cl2">
                            {{ $product_detail->price }}
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $product_detail->description }}
                        </p>
                        
                        <!--  -->
                        <div class="p-t-33">
                            

                        
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                   
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        {{-- <form  action="{{ route('cart.store', $product_detail) }}" method="post" > --}}
                                            @csrf
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input name="product_id" type="hidden" value="{{ $product_detail->id }}">

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">
                                   
                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    @if($product_detail->stock>0)
                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" >Add to cart</button>
                                    @else
                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" disabled>Add to cart</button>
                                    <p>out of stock</p>
                                    @endif
                                    

                                    {{-- @if($product_detail->stock>0)
                                    <p >in stock</p>
                                    @else
                                    <p>out of stock</p>
                                    @endif --}}
                                


                                    {{-- <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button> --}}
                                </div>
                            </div>	
                        </div>

                      
                    </div>
                </div>
            </div>
          </div>
      </form>
  
  
  @endsection

  {{-- @section('scripts')
  <script src="vendor/sweetalert/sweetalert.min.js"></script>
  <script>
      $('.js-addwish-b2').on('click', function(e){
          e.preventDefault();
      });

      $('.js-addwish-b2').each(function(){
          var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
          $(this).on('click', function(){
              swal(nameProduct, "is added to wishlist !", "success");

              $(this).addClass('js-addedwish-b2');
              $(this).off('click');
          });
      });

      $('.js-addwish-detail').each(function(){
          var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

          $(this).on('click', function(){
              swal(nameProduct, "is added to wishlist !", "success");

              $(this).addClass('js-addedwish-detail');
              $(this).off('click');
          });
      });

      /*---------------------------------------------*/

      $('.js-addcart-detail').each(function(){
          var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
          $(this).on('click', function(){
              swal(nameProduct, "is added to cart !", "success");
          });
      });
  
  </script>
  @endsection --}}