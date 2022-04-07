<div class="col-md-12">
  <table class="table table-bordered table-striped  text-center">
    <thead>
    <tr>
      <th>SN</th>
      <th>Ingredient</th>
      <th>Consumption</th>
    </tr>
    </thead>
    <tbody>
      <tr>
        @forelse($foodTable as $data)
        <input type="hidden" name="id[]" value="{{ $data->id }}">
        <input type="hidden" name="ingredient_id[]" value="{{ $data->ingredient_id }}">
        <input type="hidden" name="ingredient_name[]" value="{{ $data->ingredient }}">

        <td>{{ $data->ingredient_id }}</td>
        <td>{{ $data->ingredient}}</td>
        <td><input type="number"  name="consumption_quantity[]" value="{{ $data->cunsumption}}">
        </td>
     
        <td>
          {{-- <a href="{{route('admin.add.edit', $data->id)}}"><i class="fa fa-edit">Edit</i></a>&nbsp;&nbsp; --}}
          <a href="javascript:" class="delete_foodMenu_table" ingredient_id="{{$data->id}}" style="display:inline;">
            <i class="fa fa-trash fa-" aria-hidden="true" ></i>
          </a></td>
        </tr>
        @empty
        <p>No Data</p>
        @endforelse
    </tbody>
  </table>
</div>


 
  