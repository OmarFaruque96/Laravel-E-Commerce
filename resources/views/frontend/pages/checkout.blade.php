<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.includes.header') 
        @include('frontend.includes.css')
    </head>
    <body class="cnt-home">
        <header class="header-style-1">
            @include('frontend.includes.topbar') 
            @include('frontend.includes.menu')
        </header>

        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.breadcrumb -->

        <div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                

                <div class="col-md-8 order-md-1">
                  <h4 class="mb-3">Billing address</h4>
                  <form class="needs-validation" novalidate="">
                    
                    <div class="row" style="margin-bottom: 20px;">
                      <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                          Valid first name is required.
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                          Valid last name is required.
                        </div>
                      </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                      <div class="col-md-12">
                          <label for="email">Email <span class="text-muted">(Optional)</span></label>
                          <input type="email" class="form-control" id="email" placeholder="you@example.com">
                          <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                          </div>
                      </div>
                    </div>

                    <div class="mb-3" style="margin-bottom: 20px;">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>

                    <div class="mb-3" style="margin-bottom: 20px;">
                      <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                      <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="country">Division</label>
                        <select class="custom-select d-block w-100 form-control" id="country" required="">
                          <option value="">Choose...</option>
                          <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a valid country.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="state">District</label>
                        <select class="custom-select d-block w-100 form-control" id="state" required="">
                          <option value="">Choose...</option>
                          <option>California</option>
                        </select>
                        <div class="invalid-feedback">
                          Please provide a valid state.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                        <div class="invalid-feedback">
                          Zip code required.
                        </div>
                      </div>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">

                      @foreach(App\Models\Backend\Payment::orderBy('priority', 'asc')->get() as $payment_opt)
                      <div class="custom-control custom-radio">
                        <input id="{{$payment_opt->slug}}" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" value="option{{$payment_opt->id}}">
                        <label class="custom-control-label" for="{{$payment_opt->slug}}">{{$payment_opt->name}}</label>
                      </div>

                      @if($payment_opt->slug == 'bkash')
                        <div class="gateway-option {{$payment_opt->slug}} hidden">
                          <h5>Please Send Money To This <strong>{{$payment_opt->number}}</strong> and insert the Transaction Number Below</h5>
                          <div class="form-group">
                            <input type="text" name="transaction_id" class="form-control" placeholder="Transaction ID">
                          </div>
                        </div>
                      @elseif($payment_opt->slug == 'rocket')
                        <div class="gateway-option {{$payment_opt->slug}} hidden">
                          <h5>Please Send Money To This <strong>{{$payment_opt->number}}</strong> and insert the Transaction Number Below</h5>
                          <div class="form-group">
                            <input type="text" name="transaction_id" class="form-control" placeholder="Transaction ID">
                          </div>
                        </div>
                      @else
                        <div class="gateway-option {{$payment_opt->slug}} hidden">
                          <h5>Please procceed the checkout now. You will get the product soon.</h5>
                        </div>

                      @endif

                      @endforeach
                    </div>

                    <!-- <div class="row" style="margin-top: 20px;">
                      <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                          Name on card is required
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                        <div class="invalid-feedback">
                          Credit card number is required
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                        <div class="invalid-feedback">
                          Expiration date required
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <div class="invalid-feedback">
                          Security code required
                        </div>
                      </div>
                    </div> -->
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                  
                </div>

                <div class="col-md-4 order-md-2 mb-4">
                  <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                  </h4>
                  <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">

                    @foreach(App\Models\Frontend\Cart::totalCarts() as $item)
                      <div class="row">
                          <div class="col-md-8">
                              <div>
                                <h6 class="my-0">{{ $item->product->title }}</h6>
                                <small class="text-muted">{{ $item->product->desc }}</small>
                              </div>
                              <span class="text-muted">
                                @if(!is_null($item->product->offer_price))

                                    {{ $item->product->offer_price }}

                                @else

                                    {{ $item->product->regular_price }}

                                @endif
                              </span>
                          </div>
                          <div class="col-md-4">
                              <img src="{{ asset('Backend/img/product/').'/'.$item->product->image }}" width="90" style="margin-top: 8px;">
                          </div>
                      </div>
                    @endforeach

                      <hr>
                      <div class="row">
                          <div class="col-md-8">
                              <div>
                                <h6 class="my-0">Total</h6>
                              </div>
                          </div>
                          <div class="col-md-4 text-right">
                              <span>
                                  {{ App\Models\Frontend\Cart::totalPrice() }}
                              </span>
                          </div>
                          
                      </div>
                    </li>
                    
                  </ul>


                  </form>
                  
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

        <div class="logo-slider-inner"> 
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3800px; left: 0px; display: block;"><div class="owl-item" style="width: 190px;"><div class="item m-t-15">
                    <a href="#" class="image">
                        <img src="assets/images/brands/brand1.png" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item m-t-10">
                    <a href="#" class="image">
                        <img src="assets/images/brands/brand2.png" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                    <a href="#" class="image">
                        <img src="assets/images/brands/brand3.png" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                    <a href="#" class="image">
                        <img src="assets/images/brands/brand4.png" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                    <a href="#" class="image">
                        <img src="assets/images/brands/brand5.png" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                    <a href="#" class="image">
                        <img src="assets/images/brands/brand6.png" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                    <a href="#" class="image">
                        <img src="assets/images/brands/brand2.png" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                    <a href="#" class="image">
                        <img src="assets/images/brands/brand4.png" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div></div><div class="owl-item" style="width: 190px;"><div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div></div></div></div><!--/.item-->

            <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div>
        </div>
    
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div>

        @include('frontend.includes.footer') 
        @include('frontend.includes.scripts')
    </body>
</html>
