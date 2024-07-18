<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="title">Tajuk</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"  class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" required="required">
            <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user_id">Pengguna</label>
            <select id="user_id" name="user_id" class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                @foreach ($users as $key=>$user)
                <option value="{{ old('user_id')==>$key ? 'selected' : '' }} value="{{ $key }}>{{ $user }}</option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('user_id') }}</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="due_date">Tarikh Tamat</label>
            <input type="date" id="due_date" name="due_date" value="{{old ('due_date') }}" class="form-control {{ $errors->has('due_date') ? ' is-invalid' : '' }}" required>
            <small class="text-danger">{{ $errors->first('due_date') }}</small>
        </div>
    </div>

</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="{{ old('inputname') }}"  class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" required="required" placeholder="Placeholder">
        <small class="text-danger">{{ $errors->first('inputname') }}</small>
    </div>
</div>
