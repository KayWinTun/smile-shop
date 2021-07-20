@extends('layouts.template')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
      <div class="container">
          <div class="row">
              <div class="col-lg-3">
                  <div class="hero__categories">
                      <div class="hero__categories__all">
                          <i class="fa fa-bars"></i>
                          <span>All Subcategories</span>
                      </div>
                      <ul>
                            @foreach ($subcategories as $subcategory)
                                
                            <li><a href="#">{{$subcategory->name}}</a></li>
                                
                            @endforeach                          
                      </ul>
                  </div>
              </div>
              <div class="col-lg-9">
                  <div class="hero__search">
                      <div class="hero__search__form">
                          <form action="#">
                              <div class="hero__search__categories">
                                  All Products
                                  <span class="arrow_carrot-down"></span>
                              </div>
                              <input type="text" placeholder="What do yo u need?">
                              <button type="submit" class="site-btn">SEARCH</button>
                          </form>
                      </div>
                      <div class="hero__search__phone">
                          <div class="hero__search__phone__icon">
                              <i class="fa fa-phone"></i>
                          </div>
                          <div class="hero__search__phone__text">
                              <h5>+95 9770012081</h5>
                              <span>support 24/7 time</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="{{asset('template/img/breadcrumb.jpg')}}">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="breadcrumb__text">
                      <h2>Shopping Cart</h2>
                      <div class="breadcrumb__option">
                          <a href="./index.html">Home</a>
                          <span>Shopping Cart</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Shoping Cart Section Begin -->
  <!-- Content -->
	<div class="container mt-5">

		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="index.php" class="btn mainfullbtncolor btn-success float-right px-3">
					<i class="icofont-shopping-cart"></i>
					Continue Shopping
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="3">Products</th>
                                <th colspan="3">Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                                <td>
                                    <button class="btn btn-success checkout-btn">Checkout</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

			</div>
		</div>

		<!-- No Shopping Cart Div -->
		{{-- <div class="row mt-5 noneshoppingcart_div text-center">

			<div class="col-12">
				<h5 class="text-center"> There are no items in this cart </h5>
			</div>

			<div class="col-12 mt-5 ">
				<a href="index.php" class="btn btn-secondary mainfullbtncolor px-3">
					<i class="icofont-shopping-cart"></i>
					Continue Shopping
				</a>
			</div>

		</div> --}}


	</div>
  <!-- Shoping Cart Section End -->

@endsection
@section('script')
  <script type="text/javascript" src="{{asset('template/js/custom.js')}}"></script>
@endsection