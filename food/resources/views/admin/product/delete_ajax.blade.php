
 @foreach ($thumb_detail as $item)
 {{-- <input type="file" id="files" class="hidden"/> --}}

 <img width="150px" src="{{url($item->img_detail)}}" alt="">
 <a  style=" border: 1px solid gray; padding: 2px;"  href="" data-id="{{$item->id}}" id="delete_edit" class="delete">Xoá</a>
 @endforeach
