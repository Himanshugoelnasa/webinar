@php ($summery = App\Helpers\FrontHelper::cartSummery()) @endphp
<h3>Summary</h3>
<table class="table table-totals">
    <tbody>
        <tr>
            <td>Total MRP</td>
            <td>Rs. {{ $summery['sub_total'] }}</td>
        </tr>
        @if($summery['discount_on_mrp'])
        <tr>
            <td>Discount On MRP</td>
            <td class="text-success">Rs. {{ '-'.$summery['discount_on_mrp'] }}</td>
        </tr>
        @endif
        <tr>
            <td>Coupon Code 
                @if(Session::has('coupon'))
                    <span class="coupon-badge">{{ Session::get('coupon.code') }}</span>
                    <form action="{{ route('cart.coupon.remove') }}" class="mb-0" style="display: inline;" method="post" name="remove-coupon">
                        @csrf
                        <button type="submit" class="btn btn-link btn-text">Remove</button>
                    </form>
                @endif
            </td>
            <td>
                @if(Session::has('coupon'))
                <span class="text-success">Rs. {{ '-'.Session::get('coupon.discount') }}</span>
                @else
                <form name="apply-coupon" class="mb-0" method="post" action="{{ route('cart.coupon.apply') }}">
                @csrf
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" name="coupon_code" class="form-control" id="coupon_code">
                        <div class="input-group-prepend">
                          <div class="input-group-text p-0">
                            <button class="btn btn-link btn-text pad-8" type="submit">Apply</button>
                          </div>
                        </div>
                    </div>
                </form>
                @endif
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td>Order Total</td>
            <td>Rs. {{ $summery['total'] }}</td>
        </tr>
    </tfoot>
</table>
