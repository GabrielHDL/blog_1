<header class="fixed top-0 right-0 left-0 w-full z-[999] shadow-md shadow-[rgba(0,0,0,0.4)]" x-data>
    <div class="navbar bg-base-100">
        <div class="flex-1">
          <a href="{{route('posts.index')}}" class="btn btn-ghost normal-case text-xl">
            <img class="w-auto h-10" src="{{asset('assets/logos/logo_lasdev.svg')}}" alt="">
          </a>
        </div>
        <div class="flex-none gap-2">
          <div class="form-control">
            <input wire:model="search" type="text" placeholder="Buscar" class="input input-bordered" />
            <div class="p-4 gap-4 h-auto w-full sm:w-1/4 z-10 rounded-xl bg-white fixed shadow-lg shadow-black top-20 right-0 sm:right-4 hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
              @foreach ($posts as $post)
                  <a href="{{route('posts.show', $post)}}" class="flex items-center bg-gray-100 rounded-lg overflow-hidden gap-3 w-full h-28 @if($loop->last) @else mb-2 @endif">
                    <figure class="w-28 h-28">
                      <img class="object-center object-cover w-full h-full rounded-lg" src="@if ($post->image) {{Storage::url($post->image->url)}} @else {{asset('assets/img/default_blog_wall.jpg')}} @endif" alt="{{$post->name}}">
                    </figure>
                    <span class="flex-1">{{$post->name}}</span>
                  </a>
              @endforeach
            </div>
          </div>
          <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                @if (Auth::user())
                <img src="{{Auth::user()->profile_photo_url}}" />
                @else
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" />
                @endif
              </div>
            </label>
            <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
              @role(['Admin', 'Blogger'])
                <li>
                  <a href="{{route('admin.home')}}">Dashboard</a>
                </li>
              @endrole
              @if (Auth::user())
              <li>
                <a href="{{route('profile.show')}}" class="justify-between">
                  {{__('Profile')}}
                </a>
              </li>
                <li>
                  <form method="POST" action="{{route('logout')}}" onclick="event.preventDefault();
                  this.closest('form').submit();">
                    @csrf
                    <a href="{{route('logout')}}">{{__('Logout')}}</a>
                  </form>
                </li>
              @else
                <li>
                  <a href="{{route('login')}}">{{__('Login')}}</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
</header>
