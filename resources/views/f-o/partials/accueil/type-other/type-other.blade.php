<div class="container">
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
            @foreach ( $images_upload as $image_upload )
                @if (($image_upload->image_type != 'image/png') &&  ($image_upload->image_type != 'image/jpg') &&  ($image_upload->image_type != 'image/jpeg'))
                    <tr>
                        <th scope="row">{{$image_upload->id}}</th>
                        <td>{{$image_upload->image_type}}</td>
                        <td>{{$image_upload->image_link}}</td>
                        <td>{{$image_upload->image_name}}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
