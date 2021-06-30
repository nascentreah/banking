@extends('master')

@section('content')

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Articles</a></li>
            <li class="breadcrumb-item active"><a href="#">Compose</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Posts</h4>
                </div>
                <div class="card-body">
                    <p class="text-danger"></p>
                    <form class="form-horizontal" action="{{route('blog.create')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Title:</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                            @if ($errors->has('title'))
                                <div class="error">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Category:</label>
                            <select class="form-control select" name="cat_id" data-dropdown-css-class="bg-info-800"
                                    required>
                                @foreach($cat as $val)
                                    <option value='{{$val->id}}'>{{$val->categories}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('cat_id'))
                                <div class="error">{{ $errors->first('cat_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Thumbnail:</label>
                            <input type="file" name="image" class="form-input-styled" data-fouc>
                            <span
                                class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 1Mb</span>
                            @if ($errors->has('image'))
                                <div class="error">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Content:</label>
                            <textarea type="text" name="details" rows="8" class="tinymce form-control"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-rounded btn-success">Submit<i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
