@extends('b-o.layout.base')
@extends('b-o.pages.flash')

@section('content')
    <div class="container">
        <form action="/back-office/upload/{{ $edit->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-5">
                <label for="exampleInputPassword1">Edit Image Link</label>
                <input type="file" name="image_link" class="form-control" id="exampleInputPassword1">
                <p class="my-1">current</p>
                <input class="bg-light text-dark" type="text" name="image_link" value="{{ $edit->image_link }}" id="">
            </div>
            <div class="form-group mb-5">
                <label for="exampleInputPassword1">Visual</label>
                <img src={{asset('images/' . $edit->image_link)}} width="70px" height="70px" alt="image" >
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Edit Image Name</label>
                <input type="string" name="image_name" value="{{ $edit->image_name }}" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Update upload</button>
        </form>
    </div>
@endsection
