@section('title', "Brainy Wallet")
@section('table_title', $txData['title'])
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
          <th scope="col">Bank</th>
          <th scope="col">Account Type</th>
          <th scope="col">Date</th>
          <th scope="col">Amount</th>
          <th scope="col">Merchant</th>
          <th scope="col">Transaction Type</th>
          <th scope="col">Category </th>
        </tr>
      </thead>
      <tbody>
        @if (count($txData["transaction"]) == 0)
        <tr>No registered transactions </tr>
        @else
        @foreach($txData["transaction"] as $tx)
        <tr>
          <td> {{ $tx->bank }} </td>
          <td> {{ $tx->account_type }} </td>
          <td> {{ $tx->transaction_date }} </td>
          <td> {{ $tx->transaction_amount }} </td>
          <td> {{ $tx->merchant }} </td>
          <td> {{ $tx->transaction_type }} </td>
          <td> {{ $tx->category_name }} </td>

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