@props(['post'])
<article class="card card-compact w-full bg-base-100 shadow-xl">
    <figure class="w-full h-[16rem]">
      <img class="h-full w-full object-cover object-center" src="@if ($post->image) {{Storage::url($post->image->url)}} @else {{asset('assets/img/default_blog_wall.jpg')}} @endif" alt="{{$post->name}}" />
    </figure>
    <div class="card-body">
      <h2 class="card-title">{{Str::limit($post->name, 25)}}</h2>
      <p>{{Str::limit($post->extract, 90)}}</p>
      <div class="card-actions justify-end">
        <a href="{{route('posts.show', $post)}}" class="btn btn-info">Ver post</a>
      </div>
    </div>
</article>