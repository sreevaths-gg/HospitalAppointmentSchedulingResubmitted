@extends('layouts.app')
@section('page-button')
   <a href="{{ route('appointments.index') }}" class="btn btn-info">
    ← Back to Dashboard
</a>
@endsection
@section('content')

<h3 style ="text-align: center;">All Appointments</h3>

<div class="container mt-4">
    <table class="table table-bordered">
        <thead>
        <tr>

            <th>Appointment ID</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Action</th>

        </tr>

        </thead>

        <tbody>

        @foreach($appointments as $appointment)

            <tr>

                <td>{{ $appointment->id }}  </td>
                <td>  {{ $appointment->patient->name }} </td>
                <td>  {{ $appointment->doctor->name }} </td>
                <td>   {{ $appointment->appointment_datetime }}  </td>
                <td>   {{ $appointment->duration }}   </td>
                <td>  {{ $appointment->status }}  </td>
                <td>

 <a  href="{{ route('appointments.edit',$appointment->id) }}"   class="btn btn-warning btn-sm">
                        Edit    </a>

<form  action="{{ route('appointments.destroy',$appointment->id) }}"   method="POST"  style="display:inline;">

 @csrf   @method('DELETE')

 <button  class="btn btn-danger btn-sm">     Cancel </button>

</form>

</td>
 </tr>

        @endforeach

        </tbody>

    </table>

    {{ $appointments->links() }}

</div>

@endsection
