@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">

    <h2 class="text-center mt-2">Appointments</h2>

    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Department Name</th>
            <th scope="col">Appointment Date</th>
            <th scope="col">Taken </th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <th scope="row">{{$appointment->id}}</th>
                    <td>{{$appointment->department_name}}</td>
                    <td>{{$appointment->appointment_date}}</td>
                    @if($appointment->taken)
                        <td>You can't book.</td>
                    @else
                        <td>
                            <form action="/bookappointment" method="post" class="mt-2">
                                @csrf
                                <input type="text" style="display : none" name="appointment_id" value="{{$appointment->id}}">
                                <input type="text" style="display : none" name="department_name" value="{{$appointment->department_name}}">
                                <input type="text" style="display : none" name="appointment_date" value="{{$appointment->appointment_date}}">
                                <input type="submit" value="book" class="btn btn-primary">
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection