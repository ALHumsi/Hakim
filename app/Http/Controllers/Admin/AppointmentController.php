<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreAppointment;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $appointments = Appointment::get();
            return Datatables::of($appointments)
                ->addColumn('action', function ($appointments) {
                    return '
                            <button type="button" data-id="' . $appointments->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $appointments->id . '" data-title="' . $appointments->patient_id  . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.appointments.index');
        }
    }
    // Index End

    public function create()
    {
        $data['patients'] = Patient::all();
        return view('admin.appointments.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(StoreAppointment $request)
    {
        $inputs = $request->all();

        if (Appointment::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Appointment $appointment)
    {
        $data['patients'] = Patient::all();
        return view('admin.appointments.parts.edit', compact('appointment', 'data'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Appointment $appointment)
    {
        if ($appointment->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $appointment = Appointment::where('id', $request->id)->firstOrFail();
        $appointment->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
