@forelse($cities as $city)
<option value="{{ $city->id }}" @if(Auth::user()->city_id == $city->id) selected @endif>{{ $city->name }}</option>
@empty
<option value="0">No Cities Found</option>
@endforelse



