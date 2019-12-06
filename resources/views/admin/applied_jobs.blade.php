@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered">

                <tr>
                    <th>@lang('app.name')</th>
                    <th>@lang('app.employer')</th>
                </tr>

                @foreach($applications as $application)
                    <tr>
                        <td>
                            <i class="la la-user"></i> {{$application->name}}
                            <p class="text-muted"><i class="la la-clock-o"></i> {{$application->created_at->format(get_option('date_format'))}} {{$application->created_at->format(get_option('time_format'))}}</p>
                            <p class="text-muted"><i class="la la-envelope-o"></i> {{$application->email}}</p>
                            <p class="text-muted"><i class="la la-phone-square"></i> {{$application->phone_number}}</p>
                        </td>

                        <td>
                            @if( ! empty($application->job->job_title))
                                <p>
                                    <a href="{{route('job_view', $application->job->job_slug)}}" target="_blank">{{$application->job->job_title}}</a>
                                </p>
                            @endif

                            @if( ! empty($application->job->employer->company))
                                <p>{{$application->job->employer->company}}</p>
                            @endif

                            @if($application->is_shortlisted == 1)
                                    <p class="bg-warning">Shortlisted</p>

                            @elseif($application->is_shortlisted == 2)
                                    <p class="bg-success">Hired</p>
                            @elseif($application->is_shortlisted == 3)
                                    <p class="bg-danger">Cancelled</p>

                            @elseif($application->is_shortlisted == 4)
                                <p class="bg-success">Job Done</p>
                            @else
                                    <p class="bg-primary">Pending Approval</p>
                            @endif

                                <p>Pending Employers Approval</p>


                            @if($application->is_shortlisted == 2)
                            <a class="btn btn-success">Job Done</a>
                            @endif

                            @if($application->is_shortlisted == 4)
                            <a href="{{route('applied_done',$application->id)}}" class="btn btn-info">Cancel Job</a>
                            @else
                            <a href="{{route('applied_cancelled',$application->id)}}" class="btn btn-danger">Cancel Job</a>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </table>


            {!! $applications->links() !!}

        </div>
    </div>



@endsection
