<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-6" >
            @foreach ($cursos as $curso)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif" style="background-image: url(@if($curso->image){{Storage::url($curso->image->url)}} @else https://cdn.pixabay.com/photo/2020/06/30/23/21/sunset-5357877_1280.jpg   @endif);">
                  <div class="w-full h-full px-8 flex flex-col justify-center">
                      <h1>
                        <a href="{{route('cursos.show', $curso)}}">{{$curso->name}}</a>
                      </h1>
                  </div>
                </article>
            @endforeach
        </div>
    </div>
    
    <div class="">
            {{$cursos->links()}}
    </div>
</x-app-layout>