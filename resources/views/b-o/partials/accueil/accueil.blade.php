<div class="container">
    <button><a href="/back-office/upload/create">Upload new image</a></button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">File Type</th>
                <th scope="col">File Link</th>
                <th scope="col">File Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images_upload as $image_upload)
                <tr>
                    <th scope="row">{{ $image_upload->id }}</th>
                    <td>{{ $image_upload->image_type }}</td>
                    <td>{{ $image_upload->image_link }}</td>
                    <td>{{ $image_upload->image_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
