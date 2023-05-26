<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('patients.update', $patient->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $patient->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">Photo</label>
                    <input type="file" class="dropify" name="image"
                        data-default-file="{{ asset($patient->image) }}"
                        accept="image/png, image/gif, image/jpeg,image/jpg" />
                    <span class="form-text text-danger text-center">accept only png, gif, jpeg, jpg</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="first_name" class="form-control-label">First Name</label>
                    <input type="text" class="form-control" value="{{ $patient->first_name }}" name="first_name">
                </div>
                <div class="col-md-4">
                    <label for="last_name" class="form-control-label">Last Name</label>
                    <input type="text" class="form-control" value="{{ $patient->last_name }}" name="last_name">
                </div>
                <div class="col-md-4">
                    <label for="father_name" class="form-control-label">Father Name</label>
                    <input type="text" class="form-control" value="{{ $patient->father_name }}" name="father_name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="text" class="form-control" value="{{ $patient->email }}" name="email">
                </div>
                <div class="col-md-4">
                    <label for="gender" class="form-control-label">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="male" {{ $patient->gender == 'male' ? "selected" : '' }}>Male</option>
                        <option value="female" {{ $patient->gender == 'female' ? "selected" : '' }}>Female</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="date_of_birth" class="form-control-label">Date of birth</label>
                    <input type="date" class="form-control" value="{{ $patient->date_of_birth }}" name="date_of_birth">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="phone" class="form-control-label">Phone</label>
                    <input type="number" class="form-control" value="{{ $patient->phone }}" name="phone">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="address" class="form-control-label">Address</label>
                    <textarea name="address" class="form-control" id="" rows="8">{{ $patient->address }}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="updateButton">Update</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
<script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
<script>
    // CKEDITOR.replaceAll();
</script>
