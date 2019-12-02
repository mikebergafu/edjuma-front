@extends('layouts.dashboard')


@section('content')

   {{-- <div class="row mb-4">
            <div class="col-md-12">
            <form class="form-inline" method="get" action="">
                <div class="form-group">
                    <input type="text" name="q" value="{{request('q')}}" class="form-control" placeholder="@lang('app.payer_email')">
                </div>
                <button type="submit" class="btn btn-secondary">@lang('app.search')</button>
            </form>
        </div>
    </div>--}}


    <div class="row">
        <div class="col-md-12">
            <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th class="th-sm">Transaction Id
                    </th>
                    <th class="th-sm">Job Title
                    </th>
                    <th class="th-sm">Payment Mode
                    </th>
                    <th class="th-sm">Status
                    </th>
                    <th class="th-sm">Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td></td>
                    <td>{{$transaction->transaction_id}}</td>
                    <td>{{\App\Helpers\Controls::getJobTitle($transaction->job_is)}}</td>
                    <td>MoMo</td>
                    <td>
                        @if($transaction->status === 1)
                            Success
                        @elseif($transaction->status === 2)
                            Invalid
                        @else
                            Pending
                        @endif

                    </td>
                    <td>
                        @if($transaction->status == 1)
                            <button href="#" class="btn btn-success">Paid</button>
                        @endif
                        @if($transaction->status == 2)
                            <button href="#" class="btn btn-info">Payment Error</button>
                        @endif

                        @if($transaction->status == 0)
                            <a href="{{route('paynow',$transaction->job_is)}}" class="btn btn-default">Make Payment</a>
                        @endif

                    </td>
                </tr>
                @endforeach

                </tbody>

            </table>




        </div>
    </div>



@endsection
