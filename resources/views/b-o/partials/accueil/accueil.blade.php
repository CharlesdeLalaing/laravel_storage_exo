<div class="container">
    <button><a href="/back-office/upload/create">Upload new image</a></button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">File Type</th>
                <th scope="col">File Link</th>
                <th scope="col">File Name</th>
                <th scope="col">Image visual</th>
                <th scope="col">edit item</th>
                <th scope="col">delete item</th>
                <th scope="col">download item</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images_upload as $image_upload)
                <tr>
                    <th scope="row">{{ $image_upload->id }}</th>
                    <td>{{ $image_upload->image_type }}</td>
                    <td>{{ $image_upload->image_link }}</td>
                    <td>{{ $image_upload->image_name }}</td>
                    <td>
                        <img src={{asset('images/' . $image_upload->image_link)}} width="70px" height="70px" alt="image" >
                    </td>
                    <td>
                        <a href="/back-office/upload/{{ $image_upload->id }}/edit"
                            class="btn btn-primary text-white">Edit</a>
                    </td>
                    <td>
                        <form action="/back-office/upload/{{ $image_upload->id }}/destroy" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-primary text-white" href="/back-office/upload/{{$image_upload->id}}/download">DOWNLOAD</a>
                    </td>
            @endforeach
        </tbody>
    </table>
</div>
