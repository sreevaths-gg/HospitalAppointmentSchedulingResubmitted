<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class ApiController extends Controller
{
     public function departments()
    {
        return response()->json(
            Department::select('id','name')->get()
        );
    }

    public function doctors()
    {
        return response()->json(
            Doctor::select('id','name')->get()
        );
    }

    public function patients()
    {
        return response()->json(
            Patient::select('id','name')->get()
        );
    }
}
