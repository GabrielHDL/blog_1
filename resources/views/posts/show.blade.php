<x-app-layout>
    <div class="flex flex-col justify-center items-center gap-8">
        <div>
            <h1 class="text-xl font-bold text-black">{{$post->name}}</h1>
        </div>
    
        <div>
            <p class="text-gray-700">{{$post->body}}</p>
        </div>
    </div>
</x-app-layout>