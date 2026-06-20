<!DOCTYPE html>
<html>
<head>
    <title>Hospital Appointment System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h2 style ="text-align: center;"><u>Hospital Appointment Scheduling System</u></h2>
    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        </div>
    @endif

     @yield('page-button')   <!-- placeholder for button -->
    @yield('content')

</div>

</body>
</html>
<style>
.container .form-section .card {
  background: #f5f5f5;
  border-radius: 15px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border: none;
  padding: 20px 30px;
    color: #333333;
}
.card-header{
    background: lightgreen
}
.card-body{

}
.card label {
  color: #444444;
  font-weight: 500;
  margin-bottom: 8px;
  display: block;
}
.table {
  width: 100%;
  border-collapse: collapse;
  background: #f5f5f5;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.table th {
  background: #e0e0e0;
  color: #333333;
  font-weight: 600;
  text-align: left;
  padding: 12px 20px;
}

.table td {
  background: #ffffff;
  color: #444444;
  padding: 12px 20px;
  border-bottom: 1px solid #ddd;
}
.table th,
.table td {
  white-space: nowrap;   /* Prevents text from wrapping */
  overflow: hidden;      /* Hides overflow if content is too long */
  text-overflow: ellipsis; /* Adds "..." if text is cut off */
  padding: 12px 20px;    /* Consistent spacing */
  color: #333333;        /* Dark grey text */
}

.card.dashboard-card {
  background: #ffffff;          /* White background */
  border-radius: 10px;          /* Rounded corners */
  box-shadow: 0 2px 6px rgba(0,0,0,0.1); /* Subtle shadow */
  border: 1px solid #28a745;    /* Success green border */
  margin-bottom: 20px;          /* Space between cards */
}

/* Dashboard card header */
.card.dashboard-card .card-header {
  background: #28a745;
  color: #ffffff;
  font-weight: 600;
  font-size: 1.1rem;
  padding: 12px 16px;
}

/* Dashboard card body */
.card.dashboard-card .card-body {
  padding: 20px;
  color: #333333;
  font-size: 0.95rem;
}

    </style>
