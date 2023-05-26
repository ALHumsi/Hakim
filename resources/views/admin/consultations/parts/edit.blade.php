<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('consultations.update', $consultation->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $consultation->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">Photo</label>
                    <select name="appointment_id" class="form-control">
                        @foreach ($data['appointments'] as $appointment)
                            <option value="{{ $appointment->id }}" style="text-align: center" {{  $appointment->id == $consultation->appointment_id ? 'selected' : '' }}>{{ $appointment->id }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="patient_message" class="form-control-label">Patient Message</label>
                    <textarea name="patient_message" class="form-control" rows="8">{{ $consultation->patient_message }}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="doctor_response">Doctor Response</label>
                    <textarea name="doctor_response" class="form-control" rows="8">{{ $consultation->doctor_response }}</textarea>
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
<script>
</script>
