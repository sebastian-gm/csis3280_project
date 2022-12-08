@section('title', "Brainy Wallet")
@section('table_title', $userData['title'])
@include('partials.header')
@include('partials.menu')
@guest
@include('home')
@else
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>@yield('table_title')</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                </tr>
            </thead>
            <tbody>
                @if (count($userData["users"]) == 0)
                <tr>No registered users </tr>
                @else
                @foreach($userData["users"] as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->last_name }} </td>
                    <td> {{ $user->date_of_birth }} </td>
                    <td> {{ $user->occupation }} </td>
                    <td> {{ $user->email }} </td>
                    <td> {{ $user->user_type }} </td>
                    <td><a href=" {{ route('user.delete', $user->id) }}">Delete</a></td>
                </tr>

                @endforeach


                @endif
            </tbody>
        </table>
    </div>
    </div>
</main>
</div>
</div>
@endguest
@include('partials.footer')