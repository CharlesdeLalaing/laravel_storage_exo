@extends('b-o.layout.base')
@extends('b-o.pages.flash')

@section('content')
    <div class="container">
        <form action="/back-office/upload/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Image Link</label>
                <input type="file" name="image_link" value="{{old('image_link')}}" class="form-control" id="exampleInputPassword1" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Image Name</label>
                <input type="string" name="image_name" value="{{old('image_name')}}" class="form-control" id="exampleInputPassword1" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection