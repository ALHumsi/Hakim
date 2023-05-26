<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreConsultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $consultations = Consultation::get();
            return Datatables::of($consultations)
                ->addColumn('action', function ($consultations) {
                    return '
                            <button type="button" data-id="' . $consultations->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $consultations->id . '" data-title="' . $consultations->appointment_id  . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.consultations.index');
        }
    }
    // Index End

    public function create()
    {
        $data['appointments'] = Appointment::all();
        return view('admin.consultations.parts.create', compact('data'));
    }
    // Create End

    // Store Start

    public function store(StoreConsultation $request)
    {
        $inputs = $request->all();

        if (Consultation::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Consultation $consultation)
    {
        $data['appointments'] = Appointment::all();
        return view('admin.consultations.parts.edit', compact( 'data', 'consultation'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Consultation $consultation)
    {
        if ($consultation->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $consultation = Consultation::where('id', $request->id)->firstOrFail();
        $consultation->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
