@extends('frontend.layout.master')

@section('content')

<div class="container mt-5">
    <div class="m-5">
        Account Holder : <b>{{auth()->user()->name}}</b> <br>
        Holder Email : <b>{{auth()->user()->email}}</b> <br>
        Account Type : <b> @if(auth()->user()->account_type == 0) Individual @else Bussiness @endif 
    </b>
    <span style=" float: right;">Balance : {{auth()->user()->balance}}</span>
    <div class="m-5">  <a href="{{ route('logout')}}" class="btn btn-danger" style=" float: right;">Logout</a></div>
    <div class="card-title">
    </div>

    <h4>User Dashboard</h4>
</div>
    <div class="m-5">  <a href="{{ route('dashboard')}}" class="btn btn-primary">Dashboard</a></div>
    <div class="card-title">
        <h4>Withdrewl Transaction</h4>
    </div>

<div class="row">
    <div class="col-md-6">
        
        <div class="card">
            <div class="card-body">
                <form action="{{ route('withdrawl') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-3">
                                <label> User : <span style="color:red">{{ auth()->user()->name }}</span></label>
                            </div>

                            <div class="form-group mt-3">
                                <label> Amount <span style="color:red">*</span></label>
                                <input type="number" step="any" class="form-control " value="" name="amount">
                            </div>
                           

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    Save
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <table id="myTable" class="table table-striped table-bordered nowrap" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th width="60%">Amount</th>
                    <th width="20%">Fee</th>
                    <th width="20%" style="text-align: center;">Transaction Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $li)
                    <tr>
                        <td style="overflow: hidden;">{{ $li->amount }}</td>
                        <td style="overflow: hidden;">{{ $li->fee }}</td>
                        <td style="text-align: center; "><label class="label label-lg @if($li->transaction_type == 'withdrawl' ) label-primary @endif">@if($li->transaction_type == 'withdrawl' ) Wthdrawl   @endif</label></td>
                    </tr>
                @endforeach
               

                </tfoot>
        </table>
    </div>

</div>
</div>
@endsection