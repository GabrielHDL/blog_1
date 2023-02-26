<x-app-layout>
    <div class="h-screen bg-base-200">
       <div class="grid grid-cols-4 gap-4">
        @foreach ($posts as $post)
        <div class="card card-compact w-96 bg-base-100 shadow-xl">
            <figure><img src="https://www.elagoradiario.com/wp-content/uploads/2021/04/Pino-Castrej%C3%B3n-1140x600.jpg" alt="Shoes" /></figure>
            <div class="card-body">
              <h2 class="card-title">{{$post->name}}</h2>
              <p>{{$post->extract}}</p>
              <div class="card-actions justify-end">
                <a href="{{route('posts.show', $post)}}" class="btn btn-primary">Ver post</a>
              </div>
            </div>
        </div>
        @endforeach
       </div>
    </div>
</x-app-layout>