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
<div class="row">
    <a href="{{route('deposit')}}" class="btn btn-primary">Deposit</a>
    <a href="{{route('withdrawl')}}" class="btn btn-warning ">Withdrawl</a>
    <div class="col-md-12">
        <table id="myTable" class="table table-striped table-bordered nowrap" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th width="80%">Amount</th>
                    <th width="20%">Fee</th>
                    <th width="20%" style="text-align: center;">Transaction Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $li)
                    <tr>
                        <td style="overflow: hidden;">{{ $li->amount }}</td>
                        <td style="overflow: hidden;">{{ $li->fee }}</td>
                        <td style="text-align: center; "><label class="label label-lg @if($li->transaction_type == 'deposit' ) label-primary @else  label-danger @endif">@if($li->transaction_type == 'deposit' ) Deposit @else Withdrawl  @endif</label></td>
                    </tr>
                @endforeach
               

                </tfoot>
        </table>
    </div>

</div>
</div>
@endsection