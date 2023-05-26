<?php

namespace App\Http\Controllers\Admin;

use toastr;
use App\Models\Admin;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    use PhotoTrait;
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $admins = Admin::get();
            return Datatables::of($admins)
                ->addColumn('action', function ($admins) {
                    return '
                            <button type="button" data-id="' . $admins->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $admins->id . '" data-title="' . $admins->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($admins) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="'. asset($admins->image) .'">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.admin.index');
        }
    }
    // Index End

    public function create()
    {
        return view('admin.admin.parts.create');
    }
    // Create End

    // Store Start

    public function store(StoreAdmin $request)
    {
        $inputs = $request->all();

        if ($request->has('image')) {
            $inputs['image'] = $this->saveImage($request->image, 'uploads/admins', 'photo');
        }
        $inputs['password'] = Hash::make($request->password);

        if (Admin::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(Admin $admin)
    {
        return view('admin.admin.parts.edit', compact('admin'));
    }
    // Edit End

    // Update Start

    public function update(Request $request, Admin $admin)
    {
        if ($admin->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
        $admin = Admin::where('id', $request->id)->firstOrFail();
        $admin->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
