@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">

    <h2 class="text-center mt-2">My Bookings</h2>

    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">Booking Id</th>
            <th scope="col">Appointment Id</th>
            <th scope="col">Department Name</th>
            <th scope="col">Appointment Date</th>
            <th scope="col">Want to Cancel?</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <th scope="row">{{$booking->id}}</th>
                    <td>{{$booking->appointment_id}}</td>
                    <td>{{$booking->appointment_name}}</td>
                    <td>{{$booking->appointment_date}}</td>
                    <td>
                        <form action="/cancelBooking" method="post">
                            @csrf
                            <input type="text" style="display : none" name="booking_id" value="{{$booking->id}}">
                            <input type="text" style="display : none" name="appointment_id" value="{{$booking->appointment_id}}">
                            <input type="submit" class="btn btn-danger" value="cancel">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection