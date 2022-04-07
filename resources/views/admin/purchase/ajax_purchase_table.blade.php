<div class="col-md-12">
  <table class="table table-bordered table-striped  text-center">
    <thead>
    <tr>
      <th>SN</th>
      <th>Ingredient(code)</th>
      <th>Unit Price</th>
      <th>Quantity/Amount</th>
      <th>Total</th>
    </tr>
    </thead>
    <tbody>
      <?php 
      $total = 0
        ?>
      
        @forelse($ingredientcart  as $data)
        <td>{{ $data->ingredient_id }}</td>
        <td>{{ $data->name}}</td>
        <td>{{ $data->price}}</td>
        <td><input class="ingredientCart_id" type="number" value="{{ $data->quantity}}" ingredientCart_id="{{ $data->id }}">
        </td>
        <td>{{ $data->quantity * $data->price}}</td>
       
        <td>
          {{-- <a href="{{route('admin.add.edit', $data->id)}}"><i class="fa fa-edit">Edit</i></a>&nbsp;&nbsp; --}}
          <a href="javascript:" class="delete_cart_table" ingredient_id="{{$data->id}}" style="display:inline;">
            <i class="fa fa-trash fa-" aria-hidden="true" ></i>
          </a></td>
        </tr>
        <?php $total = $total +($data->quantity*$data->price)?>
       
        @empty
        <p>No Data</p>
        @endforelse
    </tbody>
  </table>
</div>
<div class="col-6">
                  
</div>
<!-- /.col -->
<div class="col-6">
  <p class="lead"></p>

  <div class="table-responsive">
    <table class="table">
      <tr>
        <th style="width:50%">G.Total</th>
        <td> <input type="text" class="total" value="{{ $total }}" readonly></td>
      </tr>
      <tr>
        <th>Paid</th>
        <td><input class="paid" type="number" value="" ingredientCart_id="" ></td>
      </tr>
      <tr>
        <th>Due:</th>
        <td><input id="deu_amount" type="number" value="" readonly></td>
      </tr>

    </table>
  </div>
</div>
</div>
