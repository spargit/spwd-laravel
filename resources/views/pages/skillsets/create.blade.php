@extends('layouts.base')

@section('active-skillset-create')
 uk-active
@endsection

@section('content')
<form method="POST" action="{{ route('skillsets.store') }}" class="uk-form uk-form-stacked">
    @csrf
    <fieldset data-uk-margin>
        <legend>Add A Skillset</legend>
        <div class="uk-form-row">
            <label class="uk-form-label" for="title">Title</label>
            @if($errors->has('title'))
                <ul class="uk-list">
                    @foreach($errors->get('title') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <input id="title" class="uk-form-width-large uk-form-danger" name="title" type="text" placeholder="Enter skillset name">
            @elseif($errors->any())
                <input id="title" class="uk-form-width-large uk-form-success" name="title" type="text" value="{{ old('title') }}">
            @else
                <input id="title" class="uk-form-width-large" name="title" type="text" placeholder="Enter skillset name">
            @endif
            
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label" for="description">Description</label>
            @if($errors->has('description'))
                <ul class="uk-list">
                    @foreach($errors->get('description') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <textarea id="description" class="uk-form-width-large uk-form-danger" name="description" rows="5" placeholder="Enter skillset description here..."></textarea>
            @elseif($errors->any())
                <textarea id="description" class="uk-form-width-large uk-form-success" name="description" rows="5">{{ old('description') }}</textarea>
            @else
                <textarea id="description" class="uk-form-width-large" name="description" rows="5" placeholder="Enter skillset description here..."></textarea>
            @endif
        </div>
        <hr>
        <button class="uk-button uk-button-primary">Submit</button>
    </fieldset>
</form>
@endsection