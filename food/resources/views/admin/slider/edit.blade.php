@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Cập nhật slider
        </div>
        <div class="card-body">
            <form action="{{ route('slider/update' , $slider_by_id->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @csrf
                <div class="form-group">
                    <label for="name">Tiêu đề slider</label>
                    @error('name')
                    <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                    <input class="form-control" type="text" name="name" value="{{ $slider_by_id->slider_title }}" id="name">
                </div>
                <div class="col-md-4" style="margin-top:5px">
                    <label for="" style="margin-left: -10px">Ảnh slider</label>
                    @error('file')
                    <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <img  width="550" height="250" src="{{ url($slider_by_id->img_slider) }}">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    @error('status')
                    <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                    @foreach($status as $value)
                    @if($value->id == $slider_by_id->status_id)
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="{{$value->id}}" checked >
                        <label class="form-check-label" for="exampleRadios1">
                          {{$value->name}}
                        </label>
                    </div>
                    @else
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="{{$value->id}}" >
                            <label class="form-check-label" for="exampleRadios1">
                              {{$value->name}}
                            </label>
                        </div>
                    @endif
                    @endforeach
                </div>



                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
