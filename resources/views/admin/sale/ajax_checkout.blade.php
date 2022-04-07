
<?php $total_amount = 0;
?>

@if (!empty($orderDetails->ordrDetails))
@forelse ($orderDetails->ordrDetails as $item)
<?php $total_amount= $total_amount + ($item->price* $item->quantity);
                            
?>
@empty
@endforelse
@endif


<form role="form">
    <div class="form-group"><label for="">Total Payable: {{$total_amount}}</label></div>
    <div class="form-group">
      <label for="name">Paid Amount</label>
      <input id="name" class="form-control" type="text" placeholder="" value="{{$total_amount}}" >
    </div>
    <div class="form-group">
      <label for="phone">Given Amount</label>
      <input id="phone" class="form-control" type="text"placeholder="" >
    </div>
    <div class="form-group">
      <label for="email">Due</label>
      <input id="email" class="form-control" type="text" placeholder="">
    </div>
   
    <div class="form-group">
      <input class="btn btn_submit " type="submit" value="Submit">
    </div>
  </form>