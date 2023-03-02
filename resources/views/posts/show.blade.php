<x-app-layout>
    <div class="h-96 w-full mb-8">
        <img class="h-full w-full object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    </div>
    <div class="container text-justify flex flex-col justify-center items-center gap-8">
        <div>
            <h1 class="text-xl font-bold">{{$post->name}}</h1>
        </div>
    
        <div>
            <p>{{$post->body}}</p>
        </div>
    </div>
</x-app-layout>