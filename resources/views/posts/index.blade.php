<x-app-layout>
    <div class="container min-h-screen bg-base-200 py-10">
       <div class="grid sm:grid-cols-3 gap-6">
        <div class="hidden">
          <div class="bg-yellow-500"></div>
          <div class="bg-red-500"></div>
          <div class="bg-purple-500"></div>
          <div class="bg-indigo-500"></div>
          <div class="bg-pink-500"></div>
          <div class="bg-green-500"></div>
        </div>
        @foreach ($posts as $post)
        <div class="card card-compact w-full bg-base-100 shadow-xl @if($loop->first) image-full md:col-span-2 @endif">
            <figure class="w-full @if($loop->first) h-[30rem] @else h-[16rem] @endif">
              <img class="h-full w-full object-cover object-center" src="@if ($post->image) {{Storage::url($post->image->url)}} @else {{asset('assets/img/default_blog_wall.jpg')}} @endif" alt="{{$post->name}}" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">{{Str::limit($post->name, 25)}}</h2>
              <div class="flex gap-2">
                @foreach ($post->tags as $tag)
                    <a href="{{route('posts.tag', $tag)}}" class="bg-{{$tag->color}}-500 rounded-lg py-1 px-2">
                      <span class="text-white">{{$tag->name}}</span>
                    </a>
                @endforeach
              </div>
              <p>{{Str::limit($post->extract, 90)}}</p>
              <div class="card-actions justify-end">
                <a href="{{route('posts.show', $post)}}" class="btn btn-secondary">Ver post</a>
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