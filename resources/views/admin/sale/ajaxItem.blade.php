
    @foreach ($foodMenus as $item)
      <div class="col col-md-4 col-sm-6 col-12"> <a href="javascript:" class="add_item" is_kitchen={{$item->is_kitchen}} is_caffe={{$item->is_caffe}}
         is_bar={{$item->is_bar}} item_id="{{ $item->id }}" price="{{ $item->sale_price }}"   names="{{$item->name }}">
        <figure><img src="{{asset($item->image)}}">
          <figcaption>
            <h4>{{$item->name}}</h4>
            <span>Rs.{{$item->sale_price}}</span> </figcaption>
        </figure>
        </a> 
      </div>
    @endforeach