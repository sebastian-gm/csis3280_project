@section('title', "Brainy Wallet")
@section('title', $addData['title'])
@include('partials.header')
@include('partials.menu')
@guest
@include('home')
@else
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form method="POST" action="{{ route('transaction.create')  }}">
        @csrf
        <div class="mb-3">
            <label for="account_id" class="form-label">Account</label>
            <select name="account_id" class="form-select">
                <option selected>Select the account where you want to add the transaction</option>
                @foreach($addData["accounts"] as $acc)
                <option value="{{$acc->account_id}}">{{$acc->bank}}, {{ $acc->account_type}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="transaction_date" class="form-label">Transaction Date</label>
            <input type="date" class="form-control" id="transaction_date" name="transaction_date">
        </div>

        <div class="mb-3">
            <label for="transaction_amount" class="form-label">Transaction amount</label>
            <input type="number" class="form-control" id="transaction_amount" name="transaction_amount">
        </div>

        <div class="mb-3">
            <label for="merchant" class="form-label">Merchant</label>
            <input type="text" class="form-control" id="merchant" name="merchant">
        </div>

        <div class="mb-3">
            <label for="transaction_type" class="form-label">Transaction type</label>
            <select name="transaction_type" class="form-select" id="transaction_type">
                <option selected>Make a selection</option>
                <option value="expense">expense</option>
                <option value="income">income</option>
            </select>

        </div>


        <div class="mb-3">
        <label for="category_id" class="form-label">Category type</label>
                    <select name="category_id" class="form-select">
                        <option selected>Make a selection</option>
                        @foreach($addData["categories"] as $category)
                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>


        <input type="submit" class="btn btn-primary" value="Add new transaction" >
    </form>


    @endguest
    @include('partials.footer')
</main>
</div>
</div>