<div class="uk-card  uk-card-body nav uk-light uk-padding-small" style="z-index: 980;" uk-sticky>
    <div class="logo"><h2>Lowa State University <span>Library</span></h2></div>
    {{-- student navbar --}}
    @if (Session::has("status") && session('role')=='student')
    <a href="/profile/{{session('userId')}}"><img class="uk-border-circle pro_pic" src="{{asset('img/user.png')}}" width="60" height="60" alt="Border pill"></a>
    <div class="user uk-text-large"><a href="/profile/{{session('userId')}}"> Welcome {{session('username')}}</a></div>
    <div class="user uk-text-large uk-margin-medium-right"><a href="/my_books">My books</a></div>
    <div class="user uk-text-large uk-margin-medium-right"><a href="/home">All books</a></div>


    {{-- librarian navbar --}}
    @elseif (Session::has("status") && session('role')=='librarian')
    <img class="uk-border-circle pro_pic" src="{{asset('img/user.png')}}" width="60" height="60" alt="Border pill">
    <div class="user uk-text-large">Welcome {{session('username')}}</div>
    {{-- profesor nav bar --}}
    @else
    <img class="uk-border-circle pro_pic" src="{{asset('img/user.png')}}" width="60" height="60" alt="Border pill">
    <div class="user uk-text-large pro_pic">Welcome {{session('username')}}</div>
    @endif
</div>
