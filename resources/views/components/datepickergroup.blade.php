<label class="form-label">{{ $label }}</label>
<div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
    <input type="text" value="{{ $start }}" class="form-control btn btn-outline-primary" name="start" placeholder="Start Date" required />
    <input type="text" class="form-control btn btn-outline-primary" value="{{ $end }}" name="end" placeholder="End Date" required/>
</div>