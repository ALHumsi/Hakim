<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatient;
use App\Models\Patient;
use App\Traits\PhotoTrait;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    use PhotoTrait;
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $patients = Patient::get();
            return Datatables::of($patients)
                ->addColumn('action', function ($patients) {
                    return '
                            <button type="button" data-id="' . $patients->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $patients->id . '" data-title="' . $patients->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($patients) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="'. asset($patients->image) .'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.patients.index');
        }
    }
    // Index End

    public function create()
    {
        return view('admin.patients.parts.create');
    }
    // Create End

    // Store Start

    public function store(StorePatient $request)
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'uploads/patient', 'photo');
        }

        if (Patient::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Patient $patient)
    {
        return view('admin.patients.parts.edit', compact('patient'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Patient $patient)
    {
        if ($patient->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $patient = Patient::where('id', $request->id)->firstOrFail();
        $patient->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
