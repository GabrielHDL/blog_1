<x-app-layout>
    <div class="container">
        <div class="m-auto py-8">
            <h1 class="uppercase text-center text-xl font-bold">Etiqueta: {{$tag->name}}</h1>
        </div>
        <div class="grid gap-6">
            @foreach ($posts as $post)
                <x-card-post :post="$post" />
            @endforeach
        </div>
        <div class="py-8">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>