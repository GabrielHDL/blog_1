<x-app-layout>
    <div class="container min-h-screen bg-base-200 py-10">
       <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($posts as $post)
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class="w-full h-[16rem]">
              <img class="h-full w-full object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="{{$post->name}}" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">{{Str::limit($post->name, 25)}}</h2>
              <p>{{Str::limit($post->extract, 90)}}</p>
              <div class="card-actions justify-end">
                <a href="{{route('posts.show', $post)}}" class="btn btn-primary">Ver post</a>
              </div>
            </div>
        </div>
        @endforeach
       </div>
      <div class="mt-10">
        {{$posts->links()}}
      </div>
    </div>
</x-app-layout>