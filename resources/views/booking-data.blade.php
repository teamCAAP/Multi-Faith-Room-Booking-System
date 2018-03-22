@extends('includes.layout')

@section('content')
@include('includes/navbar', ['title' => 'Booking Data'])
<div class="container">

    <legend>
        <a class="btn btn-link" href="/">
            <i class="fas fa-arrow-left"></i>
            Back to bookings
        </a>
    </legend>

    <h1>Booking Data</h1>
    <p class="lead">There has been {{ $total }} booked so far <span style="font-size: 2em;">🎉🎊</span></p>

    <h3>Booking stats by gender</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Male</th>
                <th>Female</th>
                <th>No Gender</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $gender_stats['male'] }}</td>
                <td>{{ $gender_stats['female'] }}</td>
                <td>{{ $gender_stats['none'] }}</td>
            </tr>
        </tbody>
    </table>

    <h3>All Bookings</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Gender</th>
                    <th>Created At</th>
                </tr>
            </thead>
        
            <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{ $d['id'] }}</td>
                    <td>{{ $d['time'] }}</td>
                    <td>{{ $d['date'] }}</td>
                    <td>{{ $d['gender'] }}</td>
                    <td>{{ $d['created_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    @if($prev_page_url)
        <a class="btn btn-success" href="{{ $prev_page_url }}"><i class="fas fa-arrow-left"></i> Prev Page</a>
    @endif
    @if($next_page_url)
        <a class="btn btn-success" href="{{ $next_page_url }}">Next Page <i class="fas fa-arrow-right"></i></a>
    @endif
</div>

@endsection