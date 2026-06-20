@extends('layouts.app')

@section('content')

<div class="container">

    {{-- <h1 class="mb-1">
        Hospital Appointment Scheduling System
    </h1> --}}

    <h5 class="text-muted mb-4" style ="text-align: right;">
        Admin Dashboard
    </h5>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Total Appointments</h5>
                    <h2>{{ $totalAppointments }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Doctors</h5>
                    <h2>{{ $totalDoctors }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    <h5>Patients</h5>
                    <h2>{{ $totalPatients }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <h5>Departments</h5>
                    <h2>{{ $totalDepartments }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-3">

        <div class="col-md-4">
            <div class="card border-success shadow">
                <div class="card-body">
                    <h5>Scheduled Appointments</h5>
                    <h2>{{ $scheduledAppointments }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <h5>Completed Appointments</h5>
                    <h2>{{ $completedAppointments }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-danger shadow">
                <div class="card-body">
                    <h5>Cancelled Appointments</h5>
                    <h2>{{ $cancelledAppointments }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-4">

        <a
            href="{{ route('appointments.create') }}"
            class="btn btn-success me-2">

            Create Appointment

        </a>

        <a
            href="{{ route('appointments.slots') }}"
            class="btn btn-primary me-2">

            Check Slots

        </a>

        <a
            href="{{ route('appointments.showallappointments') }}"
            class="btn btn-dark">

            Show All Appointments

        </a>

    </div>

</div>

@endsection
