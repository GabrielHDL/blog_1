<x-app-layout>
    <div class="h-96 w-full mb-8">
        <img class="h-full w-full object-cover object-center" src="@if ($post->image) {{Storage::url($post->image->url)}} @else {{asset('assets/img/default_blog_wall.jpg')}} @endif" alt="">
    </div>
    <div class="container">
        <div class="grid sm:grid-cols-3 gap-6">
            <div class="col-span-2">
                {{-- Titulo del post --}}
                <div>
                    <h1 class="text-2xl font-bold">{{$post->name}}</h1>
                </div>
                {{-- Cuerpo del post --}}
                <div class="py-8 text-justify">
                    <p>{!!$post->body!!}</p>
                </div>
                {{-- Autor del post --}}
                <div class="flex h-auto mt-4 pb-8 flex-col">
                    <h4 class="text-xl font-semibold mb-4">Autor del post</h4>
                    <div class="flex items-center">
                        <img class="rounded-full object-cover object-center h-16 w-16 mr-4" src="{{$author->profile_photo_url}}" alt="">
                        <div class="flex justify-center items-start flex-col">
                            <span class="text-lg font-bold font-walsheim">{{$author->name}}</span>   
                        </div>
                    </div>
                </div>
            </div>
            {{-- Sidebar con elementos relacionados --}}
            <aside>
                <div class="md:sticky top-20">
                    {{-- Titulo de la categoria relacionada --}}
                    <h1 class="text-2xl font-bold mb-4">Más en <a href="{{route('posts.category', $post->category)}}">{{$post->category->name}}</a></h1>
                    <ul>
                        {{-- Recorrido para obtener los post Relacionados --}}
                        @foreach ($relateds as $related)
                            <li class="mb-4">
                                <a class="grid grid-cols-3" href="{{route('posts.show', $related)}}">
                                    @if ($related->image)
                                        <img class="w-full col-span-1 h-20 md:h-36 lg:h-20 object-cover object-center rounded-md" src="@if ($related->image) {{Storage::url($related->image->url)}} @else {{asset('assets/img/default_blog_wall.jpg')}} @endif" alt="">
                                    @else
                                        <img class="w-full col-span-1 h-20 md:h-36 lg:h-20 object-cover object-center rounded-md" src="{{asset('img/bckhdlmaingreen.jpg')}}" alt="">
                                    @endif
                                    <span class="ml-2 col-span-2">{{$related->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>