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

        <div class="body-content outer-top-xs">
            <div class="container">
                <div class="row">
                    <div class="shopping-cart">
                        <div class="shopping-cart-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">Remove</th>
                                            <th class="cart-description item">Image</th>
                                            <th class="cart-product-name item">Product Name</th>
                                            <th class="cart-edit item">Update</th>
                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Subtotal</th>
                                            <th class="cart-total last-item">Grandtotal</th>
                                        </tr>
                                    </thead>
                                    <!-- /thead -->
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="shopping-cart-btn">
                                                    <span class="">
                                                        <a href="{{ route('allProducts') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                        <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
                                                    </span>
                                                </div>
                                                <!-- /.shopping-cart-btn -->
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>

        

        @if(App\Models\Frontend\Cart::totalItems() > 0)
            
            @foreach($cartItem as $item)
            <tr>
                <td class="romove-item">
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </form>

                </td>
                <td class="cart-image">
                    <a class="entry-thumbnail" href="detail.html">
                        <img src="{{ asset('Backend/img/product/').'/'.$item->product->image }}" alt="" />
                    </a>
                </td>
                <td class="cart-product-name-info">
                    <h4 class="cart-product-description">
                        <a href="">{{ $item->product->title }}</a>
                    </h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="rating rateit-small"></div>
                        </div>
                        <div class="col-sm-8">
                            <div class="reviews">
                                (06 Reviews)
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="cart-product-info">
                        <span class="product-color">COLOR:<span>Blue</span></span>
                    </div>
                </td>
                <td class="cart-product-edit">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            <input type="submit" name="update" value="Update" class="btn btn-sm btn-danger" />
                </td>
                <td class="cart-product-quantity">
                    <div class="quant-input">
                        
                            <input type="number" name="product_quantity" value="{{$item->product_quantity}}" />
                        </form>
                        
                    </div>
                </td>
                <td class="cart-product-sub-total">
                    <span class="cart-sub-total-price">
                        @if(!is_null($item->product->offer_price))

                            {{ $item->product->offer_price }}

                        @else

                            {{ $item->product->regular_price }}

                        @endif
                    </span>
                </td>
                <td class="cart-product-grand-total">
                    <span class="cart-grand-total-price">
                        @if(!is_null($item->product->offer_price))

                            {{ $item->product_quantity * $item->product->offer_price }}

                        @else

                            {{ $item->product_quantity * $item->product->regular_price }}

                        @endif
                    </span>
                </td>
            </tr>
            @endforeach

        @else
            <div class="alert alert-danger">No items found in the cart</div>
        @endif
                                    </tbody>
                                    <!-- /tbody -->
                                </table>
                                <!-- /table -->
                            </div>
                        </div>
                        <!-- /.shopping-cart-table -->
                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            <!-- <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Estimate shipping and tax</span>
                                            <p>Enter your destination to get shipping and tax.</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="info-title control-label">Country <span>*</span></label>
                                                <select class="form-control unicase-form-control selectpicker">
                                                    <option>--Select options--</option>
                                                    <option>India</option>
                                                    <option>SriLanka</option>
                                                    <option>united kingdom</option>
                                                    <option>saudi arabia</option>
                                                    <option>united arab emirates</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title control-label">State/Province <span>*</span></label>
                                                <select class="form-control unicase-form-control selectpicker">
                                                    <option>--Select options--</option>
                                                    <option>TamilNadu</option>
                                                    <option>Kerala</option>
                                                    <option>Andhra Pradesh</option>
                                                    <option>Karnataka</option>
                                                    <option>Madhya Pradesh</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title control-label">Zip/Postal Code</label>
                                                <input type="text" class="form-control unicase-form-control text-input" placeholder="" />
                                            </div>
                                            <div class="pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </div>
                        <!-- /.estimate-ship-tax -->

                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Discount Code</span>
                                            <p>Enter your coupon code if you have one..</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." />
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- /tbody -->
                            </table>
                            <!-- /table -->
                        </div>
                        <!-- /.estimate-ship-tax -->

                        <div class="col-md-4 col-sm-12 cart-shopping-total">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="cart-sub-total">Subtotal<span class="inner-left-md">{{ App\Models\Frontend\Cart::totalPrice() }}</span></div>
                                            <div class="cart-grand-total">Grand Total<span class="inner-left-md">{{ App\Models\Frontend\Cart::totalPrice() }}</span></div>
                                        </th>
                                    </tr>
                                </thead>
                                <!-- /thead -->
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="cart-checkout-btn pull-right">
                                                <a href="{{ route('checkout.page') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- /tbody -->
                            </table>
                            <!-- /table -->
                        </div>
                        <!-- /.cart-shopping-total -->
                    </div>
                    <!-- /.shopping-cart -->
                </div>
                <!-- /.row -->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
                <div id="brands-carousel" class="logo-slider wow fadeInUp">
                    <div class="logo-slider-inner">
                        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                            <div class="item m-t-15">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item m-t-10">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                            <!--/.item-->

                            <div class="item">
                                <a href="#" class="image">
                                    <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.includes.footer') 
        @include('frontend.includes.scripts')
    </body>
</html>
