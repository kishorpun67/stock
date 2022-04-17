
      <div class="modal-body">
        <form role="form">
          <div class="cart-wrapper checkout_wrapper">
            <div class="cart-top">
              <table>
                <thead>
              <tr>
                <th>ID</th>
                <th>Item</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Total</th>
                    <th>delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $total_amount = 0;
                    $total_item = 0;
                    ?>
              @if (!empty($orderDetails->ordrDetails))
              @forelse ($orderDetails->ordrDetails as $item)
                        <tr>
                            <td class="serial">{{$item->id}}</td>
                            <td class="product_title">{{$item->item}}</td>
                            <td class="product_price">Rs.{{$item->price}}</td>
                            <td class="quantity">
                  
                              <div class="quantity-bar"> <span class="input-group-btn">
                                <button type="button" class="btn-number btn-minus " onclick="quantityMinus(this.getAttribute('attr'))"  data-type="minus"  cart_id="{{$item->id}}"  cart-value="{{$item->quantity}}"> <i class="fas fa-minus"></i> </button>
                                </span>
                                <input type="text" name="quantity"id="quant-{{$item->id}}" class="form-control input-number" value="{{$item->quantity}}" min="1" max="100" placeholder="1">
                                <span class="input-group-btn">
                                <button type="button" class="btn-number btn-plus qtyPlus" data-type="plus" attr="{{$item->id}}"  cart-value="{{$item->quantity}}" data-field="quant-{{$item->id}}"> <i class="fas fa-plus"></i> </button>
                                </span> </div></td>
                            <td class="total-price">Rs.{{$item->price * $item->quantity}}</td>
                            <td class="discount"><a href="javascript:" onclick="quantityPlus(this.getAttribute('attr'))" cart_id="{{$item->id}}" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  
                          </tr>
                          <?php $total_amount= $total_amount + ($item->price* $item->quantity);
                          $total_item = $total_item + $item->quantity;
                          ?>
                        @empty
                        @endforelse
                    @endif
                </tbody>
              </table>
            </div>
            <div class="cart-bottom d-flex">
              <div class="cart-overview flex-1">
                <h3>Cart Total</h3>
                <ul class="cart_listing">
                  <li><span>Total item:</span> <strong> {{$total_item}} </strong></li>
                  <li><span>Discount:</span> <strong>0 </strong></li>
                  <li><span>Tax:</span> <strong>0 </strong></li>
                  <li> <span>Subtotal</span> <strong>{{$total_amount}}</strong> </li>
                  <li> <span>Total Payable</span> <strong>{{$total_amount}}</strong> </li>
                </ul>
              </div>
              
                 <div class="cart-overview flex-1">
              
              <label>
              <h3 class="topborder"><span>Payment Method</span></h3>
              <input type="radio" value="Bank transfer" name="payment" checked>
              <p>Direct Bank Transfer</p>
              </label>
              <label>
              <input type="radio" value="Cash Payment" name="payment">
              <p>Cash Payment</p>
              </label>
              <label>
              <input type="radio" value="paypal" name="payment">
              <p>Paypal</p>
              <fieldset class="paymenttypes">
                <a href="#"><img src="images/esewa.jpg" alt="" class=""></a>
              </fieldset>
              </label>
              <button type="button"  class="btn btn-checkout">Place Order</button>
              <button type="button"  class="btn btn-print">Print</button>
            </div>
            </div>
          </div>
        </form>
        </div>
    