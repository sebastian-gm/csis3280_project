@section('title', "Brainy Wallet")
@section('dashboard_title', $viewData['title'])
@include('partials.header')
@include('partials.menu')
@guest
@include('home')
@else
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('dashboard_title')</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($viewData['total_income']->total_amount)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total expenses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($viewData['total_expenses']->total_amount)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h4>Show data by category and transaction</h4>
        <div class="col">
            <form action="{{route('dashboard')}}">
                <div class="col">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option selected>Select a category</option>
                        @foreach($viewData["categories"] as $category)
                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="transaction_type" class="form-select" aria-label="Default select example">
                        <option selected>Select a transaction</option>
                        <option value="expense">expense</option>
                        <option value="income">income</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-primary" value="Search Category">
            </form>

        </div>
    </div>
    <!-- validate -->
    @if($viewData["transactions"])
    <table class="table table-striped">
        <tr>
            <thead>
                <td>Transaction Type</td>
                <td>Amount</td>
                <td>Category</td>
                <td>Transaction Date</td>
            </thead>
        </tr>
        @foreach($viewData["transactions"] as $transaction)
        <tr>
            <td>{{ $transaction->transaction_type }}</td>
            <td> {{ $transaction->transaction_amount}}</td>
            <td> {{ $transaction->category_name }}</td>
            <td> {{ $transaction->transaction_date }}</td>

        </tr>
        @endforeach
    </table>
    <table class="table table-striped">
        <tr>
            <thead>
                <td>Category</td>
                <td>Total Amount</td>

            </thead>
        </tr>
        <tr>
            <td>{{ $viewData['category']->category_name }}</td>
            <td> {{ $viewData['sum_transaction'] }}</td>

        </tr>
    </table>
    @endif

    <div class="row">
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expenses by category</h6>
                </div>
                <div class="card-body">
                    @foreach($viewData["sum_expenses_cat"] as $expense)
                    <h4 class="small font-weight-bold">{{$expense->category_name}}<span class="float-end">{{round(($expense->sumAmount / $viewData['total_expenses']->total_amount) * 100, 0)}}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: {{round(($expense->sumAmount / $viewData['total_expenses']->total_amount) * 100, 0)}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>



    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

</main>
</div>
</div>
@endguest
@include('partials.footer')