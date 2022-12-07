@section('title', "Brainy Wallet")
@section('title', $addData['title'])
@include('partials.header')
@include('partials.menu')
@guest
@include('home')
@else
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form method="POST" action="{{ route('account.create')  }}">
        @csrf

        <div class="mb-3">
            <label for="account_type" class="form-label">Account type</label>
            <select name="account_type" class="form-select" id="account_type">
                <option selected>Make a selection</option>
                <option value="credit">credit</option>
                <option value="debit">debit</option>
            </select>

        </div>


       <div class="mb-3">
            <label for="bank" class="form-label">Bank</label>
            <input type="text" class="form-control" id="bank" name="bank">
        </div>

        <div class="mb-3">
            <label for="have_amount" class="form-label">Have Amount</label>
            <input type="number" class="form-control" id="have_amount" name="have_amount">
        </div>

        <div class="mb-3">
            <label for="owe_amount" class="form-label">Owe Amount</label>
            <input type="number" class="form-control" id="owe_amount" name="owe_amount">
        </div>

        <input type="submit" class="btn btn-primary" value="Add new account" >
    </form>


    @endguest
    @include('partials.footer')
</main>
</div>
</div>