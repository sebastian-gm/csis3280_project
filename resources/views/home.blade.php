@section('title', "Brainy Wallet")
@include('partials.header')
@include('partials.menu')
@guest
@include('partials.covercontent')
@else
@include('partials.maincontent')
@endguest
@include('partials.footer')
