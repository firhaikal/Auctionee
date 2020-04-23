@auth()
    @include('layouts.footers.auth')
@endauth
    
@guest()
    @include('layouts.footers.guest')
@endguest