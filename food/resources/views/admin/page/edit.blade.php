@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Cập nhật trang
        </div>
        <div class="card-body">
            <form action="{{ route('page/update',$id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tiêu đề trang</label>
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                     @enderror
                    <input class="form-control" type="text" name="name" value="{{ $page_by_id->page_title }}" id="name">
                </div>
                <div class="form-group">
                    <label for="name">Slug(Friendly_url )</label>
                    @error('slug')
                    <div class="form-text text-danger">{{ $message }}</div>
                     @enderror
                    <input class="form-control" type="text" name="slug"  value="{{ $page_by_id->slug }}" id="name">
                </div>
                <div class="form-group">
                    @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
                     @enderror
                    <label for="content">Nội dung trang</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="15">{{ $page_by_id->content }}"</textarea>
                </div>
                @if($status->count() >0)
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    @error('status')
                    <div class="form-text text-danger">{{ $message }}</div>
                     @enderror
                    @foreach ($status as $item)
                    @if($page_by_id->status_id == $item->id)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="{{ $item->id }}" checked>
                        <label class="form-check-label" for="exampleRadios2">
                          {{ $item->name }}
                        </label>
                    </div>
                    @else
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="{{ $item->id }}" >
                        <label class="form-check-label" for="exampleRadios2">
                          {{ $item->name }}
                        </label>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
