@foreach ($posts as $post)
    <div class="card">
        <div class="card-header">
            <h3>
                <a href="#">{{$post->title}}</a>
            </h3>
        </div>
        <div class="card-body">
            <p>{{$post->body}}</p>
            <div class="text-center">
                <button type="button" class="btn btn-success">
                    READ MORE
                </button>
            </div>
        </div>
    </div>
@endforeach