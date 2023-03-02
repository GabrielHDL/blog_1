<div>
    <div class="navbar bg-base-100">
        <div class="flex-1">
          <a href="{{route('posts.index')}}" class="btn btn-ghost normal-case text-xl">Blog Chingon</a>
        </div>
        <div class="flex-none gap-2">
          <div class="form-control">
            <input type="text" placeholder="Search" class="input input-bordered" />
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
              <li>
                <a class="justify-between">
                  Profile
                  <span class="badge">New</span>
                </a>
              </li>
              <li><a>Settings</a></li>
              @if (Auth::user())
                <li>
                  <form method="POST" action="{{route('logout')}}" onclick="event.preventDefault();
                  this.closest('form').submit();">
                    @csrf
                    <a href="{{route('logout')}}">Logout</a>
                  </form>
                </li>
              @else
                <li>
                  <a href="{{route('login')}}">Login</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
</div>
