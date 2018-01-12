<div class="form-group col-md-4 go-to-time-wrapper">
  <label for="go_to_time">Go to time:</label>
  <select class="custom-select custom-select-lg mb-3 form-control" id="go_to_time">
    <option>Go to time...</option>
    @foreach ($times as $time)
      <option value="#time_card_{{ $time['id'] }}">{{ $time['label'] }}</option>
    @endforeach
  </select>
</div>