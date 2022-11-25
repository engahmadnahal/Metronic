@props([
    'name' => '-',
    'type' => 'text',
    'id' => 'none',
    'value' => null
])
<div class="form-group row mt-4">
    <label class="col-3 col-form-label">{{$name}}:</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <input type="{{$type}}" class="form-control" id="{{$id}}" placeholder="{{ $name }}" value="{{$value}}"/>
        <span class="form-text text-muted">{{ __('cms.please_enter') }} {{ $name }}</span>
    </div>
</div>
