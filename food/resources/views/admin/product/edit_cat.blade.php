@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Cập nhật Danh mục
                </div>
                <div class="card-body">
                <form action="{{route('cat/product/update' , $cat_product->id)}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            @error('name')
                            <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                        <input class="form-control" type="text" value="{{$cat_product->name}}" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input class="form-control" value="{{$cat_product->slug}}" type="text" name="slug" id="name">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục cha</label><br>
                            <select class="form-control" id="" name="categary">
                                @if($cat_product->parent_id == 0)
                                <option value="">--Chọn danh mục--</option>
                                @endif
                                @foreach ($result1 as $value)
                                @if($value->id == $cat_product->parent_id )
                                <option selected value="{{ $value->id }}">{{str_repeat('--' , $value->level).$value->name }}</option>
                                @else
                                @if($cat_product->parent_id != 0)
                                <option  value="{{ $value->id }}">{{str_repeat('--' , $value->level).$value->name }}</option>
                                @endif
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            @foreach ($status as $item)
                            @if($item->id == $cat_product->status_id)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="{{ $item->id }}" checked>
                                <label  class="form-check-label" for="exampleRadios2">
                                 {{ $item->name }}
                                </label>
                            </div>
                            @else
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="{{ $item->id }}" >
                                <label  class="form-check-label" for="exampleRadios2">
                                 {{ $item->name }}
                                </label>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
