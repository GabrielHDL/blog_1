<x-app-layout>
    <div class="min-h-screen bg-base-200 pt-20 flex-col flex justify-center items-center">
       <div class="grid grid-cols-4 gap-4">
        @foreach ($posts as $post)
        <div class="card card-compact w-96 bg-base-100 shadow-xl">
            <figure><img src="{{Storage::url($post->image->url)}}" alt="{{$post->name}}" /></figure>
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
      <div class="mt-4">
        {{$posts->links()}}
      </div>
    </div>
</x-app-layout>