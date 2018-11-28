@extends('layouts.base')

@section('active-skillset-edit')
 uk-active
@endsection

@section('content')
<form method="POST" action="{{ route('skillsets.update', ['skillset' => $skillset->id]) }}" class="uk-form uk-form-stacked">
    @method('PUT')
    @csrf
    <fieldset data-uk-margin>
        <legend>{{ $skillset->title }}</legend>
        <div class="uk-form-row">
            <label class="uk-form-label" for="description">Description</label>
            @if($errors->has('description'))
                <ul class="uk-list">
                    @foreach($errors->get('description') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <textarea id="description" class="uk-form-width-large uk-form-danger" name="description" rows="5">{{ $skillset->description }}</textarea>
            @elseif($errors->any())
                <textarea id="description" class="uk-form-width-large uk-form-success" name="description" rows="5">{{ old('description') }}</textarea>
            @else
                <textarea id="description" class="uk-form-width-large" name="description" rows="5">{{ $skillset->description }}</textarea>
            @endif
        </div>
        <hr>
        <button class="uk-button uk-button-primary uk-button-small uk-width-1-4">Submit</button>
    </fieldset>
</form>
<form method="POST" action="{{ route('skillsets.destroy', ['skillset' => $skillset->id]) }}" class="uk-form uk-form-stacked">
    @method('DELETE')
    @csrf
    <hr>
    <button class="uk-button uk-button-danger uk-button-small uk-width-1-4">Delete</button>
</form>
@endsection