<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($posts as $post)
                <div class="card" style="width: 100%" data-post="{{$post->id}}">
                    
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>
                                {{$post->text}}
                            </p>
                            <footer class="blockquote-footer">
                                
    <a href="javascript: void(0);" onclick="{{ $post->id }}"  data-post="{{$post->id}}">                                    <i class="fal fa-heart pressLove {{$post->likes->contains('user_id',auth()->id()) ? 'redHeart' : ''}} float-right">{{$post->likes->count()}}</i>
    </a>                                
    
                                
                            </footer>
                        </blockquote>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
