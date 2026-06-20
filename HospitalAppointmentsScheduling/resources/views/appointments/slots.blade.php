@extends('layouts.app')

@section('page-button')
   <a href="{{ route('appointments.index') }}" class="btn btn-info">
    ← Back to Dashboard
   </a>
@endsection

@section('content')
<div class="container mt-4">
    <h3 class="text-muted mb-4 text-center">Doctor Slot Availability</h3>

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <!-- Department Dropdown -->
                <div class="col-md-4">
                    <label>Department</label>
                    <select class="form-control" id="department">
                        <option>Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Doctor Dropdown -->
                <div class="col-md-4">
                    <label>Doctor</label>
                    <select class="form-control" id="doctor">
                        <option value="">Select Doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Date Picker -->
                <div class="col-md-4">
                    <label>Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <!-- Available Slots -->
        <div class="col-md-6">
            <div class="card dashboard-card border-success">
                <div class="card-header bg-success text-white">
                    Available Slots
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="availableSlots">
                            <!-- Filled dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Booked Slots -->
        <div class="col-md-6">
            <div class="card dashboard-card border-danger">
                <div class="card-header bg-danger text-white">
                    Booked Slots
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="bookedSlots">
                            <!-- Filled dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('doctor').addEventListener('change', loadSlots);
document.getElementById('date').addEventListener('change', loadSlots);

function loadSlots() {
    let doctor = document.getElementById('doctor').value;
    let date = document.getElementById('date').value;

    if (!doctor || !date) {
        return;
    }

    fetch(`/api/doctors/${doctor}/available-slots?date=${date}`)
        .then(response => response.json())
        .then(data => {
            let available = '';
            data.available_slots.forEach(slot => {
                available += `
                    <tr>
                        <td>${slot}</td>
                        <td class="text-success">Available</td>
                    </tr>`;
            });
            document.getElementById('availableSlots').innerHTML = available;

            let booked = '';
            data.booked_slots.forEach(slot => {
                booked += `
                    <tr>
                        <td>${slot}</td>
                        <td class="text-danger">Booked</td>
                    </tr>`;
            });
            document.getElementById('bookedSlots').innerHTML = booked;
        });
}
</script>
@endsection
