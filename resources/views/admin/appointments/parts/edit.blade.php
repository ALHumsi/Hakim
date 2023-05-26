<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('appointments.update', $appointment->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $appointment->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="patient_id" class="form-control-label">Patient</label>
                    <select name="patient_id" class="form-control" id="">
                        @foreach($data['patients'] as $patient)
                        <option value="{{ $patient->id }}" {{ $patient->id == $appointment->patient_id ? 'selected' : '' }}>{{ $patient->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-control-label">Date</label>
                    <input type="date" class="form-control" value="{{ $appointment->date }}" name="date">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="time" class="form-control-label">Time</label>
                    <input type="time" class="form-control" value="{{ $appointment->time }}" name="time">
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-control-label">Gender</label>
                    <select name="status" class="form-control">
                        <option value="booked" {{ $appointment->status == 'booked' ? 'selected' : '' }}>Booked</option>
                        <option value="cancaled" {{ $appointment->status == 'cancaled' ? 'selected' : '' }}>Cancaled</option>
                        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
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
