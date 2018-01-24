<div class="col-md-6 mb-3">
    <label for="{{ $select }}">{{ $label ?? $select}}</label>
    {!! Form::select($select, $data ?? [], null, ['class' => 'form-control']) !!}
</div>
