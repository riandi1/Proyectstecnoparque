<x-app-layout>
    <h1>categoria :{{$category->name}}</h1>
    @foreach($cursos as $curso)
        <article>
            <img src="{{Storage::url($curso->image->url) }}" alt="">

            <div class="">
                <h1>
                    <a href="{{route('cursos.show',$curso)}}">{{$curso->name}}</a>
                </h1>

                <div class="">
                    {{$curso->extract}}
                </div>
            </div>
        </article>
    @endforeach
</x-app-layout>