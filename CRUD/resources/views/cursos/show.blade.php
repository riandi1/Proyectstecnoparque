<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <h1 class="text-4x1 font-bold text-gray-600">{{$curso->name}}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {!!$curso->extract!!}
        </div>
        <div class="grid grid-cols-3">
            <div class="col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{Storage::url($curso->image->url) }}" alt="">
                </figure>
                
                <div class="text-base text-gray-500 mt-4" >
                    <p>
                    {!!$curso->body!!}
                    </p>
                </div>
            </div>
            <aside class="ml-5">
                <h1 class="text-2x1 font-bold text-gray-600 mb-4">Mas en {!! $curso->category->name !!}</h1>

                <ul>
                    @foreach($similares as $similar)
                    <li class="mb-4">
                        <a class="flex" href="{{route('cursos.show', $similar)}}">
                            <img class="w-36 object-cover object-center" src="{{Storage::url($similar->image->url) }}" alt="">
                            <span class="ml-2">{{$similar->name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>
</x-app-layout>