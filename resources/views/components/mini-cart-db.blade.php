@php
$cart = \App\Helpers\FrontHelper::getCart();
$cart_product_count = $cart ? ($cart->cart_products ? $cart->cart_products->count() : 0) : 0;
@endphp
<a href="#" class="dropdown-toggle dropdown-arrow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
    <i class="icon-shopping-cart"></i>
    <span class="cart-count badge-circle">{{ $cart_product_count }}</span>
</a>

<div class="dropdown-menu">
    <div class="dropdownmenu-wrapper">
        @php $total_amount = 0 @endphp
            @if($cart_product_count)
        <div class="dropdown-cart-header">
            <span>{{ $cart_product_count>1 ? $cart_product_count . ' Gifts' : $cart_product_count. ' Gift' }}</span>

            <a href="{{ route('cart') }}" class="float-right">View Cart</a>
        </div><!-- End .dropdown-cart-header -->

        <div class="dropdown-cart-products">
            
            @foreach($cart->cart_products as $key=>$item)
            @php $total_amount += ($item->discounted_price*$item->quantity)  @endphp
            <div class="product">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="{{ route('product_description',$item->product->slug) }}">{{ $item->product_title }}</a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">{{ $item->quantity }}</span>
                        x {{ $item->discounted_price }}
                    </span>
                </div><!-- End .product-details -->

                <figure class="product-image-container">
                    <a href="{{ route('product_description',$item->product->slug) }}" class="product-image">
                        <img src="{{ $item->image }}" alt="product" width="50" height="50">
                    </a>
                    <a href="{{ route('cart.delete',$item->id) }}" class="btn-remove icon-cancel" title="Remove Product"></a>
                </figure>
            </div><!-- End .product -->
            @endforeach
        </div><!-- End .cart-product -->

        <div class="dropdown-cart-total">
            <span>Total</span>

            <span class="cart-total-price float-right">Rs. {{ $total_amount }}</span>
        </div><!-- End .dropdown-cart-total -->

        <div class="dropdown-cart-action">
            <a href="{{ route('checkout') }}" class="btn btn-dark btn-block">Place Order</a>
        </div><!-- End .dropdown-cart-total -->
        @else
            <h1 class="empty-cart">Cart Empty</h1>
        @endif
    </div><!-- End .dropdownmenu-wrapper -->
</div><!-- End .dropdown-menu -->