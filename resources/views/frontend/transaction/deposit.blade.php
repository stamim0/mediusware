@extends('frontend.layout.master')

@section('content')

<div class="container mt-5">


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('deposit') }}" method="post" enctype="multipart/form-data">
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
                    <th width="8    0%">Amount</th>
                    <th width="20%" style="text-align: center;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $li)
                    <tr>
                        <td style="overflow: hidden;">{{ $li->amount }}</td>
                        <td style="text-align: center; "><label class="label label-lg @if($li->transaction_type == 'deposit' ) label-primary @endif">@if($li->transaction_type == 'deposit' ) Deposit   @endif</label></td>
                    </tr>
                @endforeach
               

                </tfoot>
        </table>
    </div>

</div>
</div>
@endsection