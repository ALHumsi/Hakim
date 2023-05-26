<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="patient_id" class="form-control-label">Patient</label>
                    <select name="patient_id" class="form-control" id="">
                        @foreach($data['patients'] as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-control-label">Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="time" class="form-control-label">Time</label>
                    <input type="time" class="form-control" name="time">
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-control-label">Gender</label>
                    <select name="status" class="form-control">
                        <option value="booked">Booked</option>
                        <option value="cancaled">Cancaled</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="addButton">Add</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>
