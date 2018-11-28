@extends('layouts.base')

@section('active-skill-edit')
 uk-active
@endsection

@section('content')
<form method="POST" action="{{ route('skills.update', ['skill' => $skill->id]) }}" class="uk-form uk-form-stacked">
    @method('PUT')
    @csrf
    <fieldset data-uk-margin>
        <legend>{{ $skill->name }}</legend>
        <div class="uk-form-row">
            <label class="uk-form-label" for="skillset">Skillset</label>
            @if($errors->has('skillset'))
                <ul class="uk-list">
                    @foreach($errors->get('skillset') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <select id="skillset" class="uk-form-danger" name="skillset">
                    @foreach($skillsets as $skillset)
                        @if($skillset->id === old('skillset'))
                            <option value="{{ $skillset->id }}" selected="selected">{{ $skillset->title }}</option>
                        @else
                            <option value="{{ $skillset->id }}">{{ $skillset->title }}</option>
                        @endif
                    @endforeach
                </select>
            @elseif($errors->any())
                <select id="skillset" class="uk-form-success" name="skillset">
                    @foreach($skillsets as $skillset)
                        @if($skillset->id === old('skillset'))
                            <option value="{{ $skillset->id }}" selected="selected">{{ $skillset->title }}</option>
                        @else
                            <option value="{{ $skillset->id }}">{{ $skillset->title }}</option>
                        @endif
                    @endforeach
                </select>
            @else
                <select id="skillset" name="skillset">
                    @foreach($skillsets as $skillset)
                        @if($skillset->id === $skill->sid)
                            <option value="{{ $skillset->id }}" selected="selected">{{ $skillset->title }}</option>
                        @else
                            <option value="{{ $skillset->id }}">{{ $skillset->title }}</option>
                        @endif
                    @endforeach
                </select>
            @endif
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label" for="type">Type</label>
            @if($errors->has('type'))
                <ul class="uk-list">
                    @foreach($errors->get('type') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <select id="type" class="uk-form-danger" name="type">
                    @foreach($skills as $skillName => $icon)
                        @if($icon === old('type'))
                            <option value="{{ $icon }}" selected="selected">{{ $skillName }}</option>
                        @else
                            <option value="{{ $icon }}">{{ $skillName }}</option>
                        @endif
                    @endforeach
                </select>
            @elseif($errors->any())
                <select id="type" class="uk-form-success" name="type">
                    @foreach($skills as $skillName => $icon)
                        @if($icon === old('type'))
                            <option value="{{ $icon }}" selected="selected">{{ $skillName }}</option>
                        @else
                            <option value="{{ $icon }}">{{ $skillName }}</option>
                        @endif
                    @endforeach
                </select>
            @else
                <select id="type" name="type">
                    @foreach($skills as $skillName => $icon)
                        @if($icon === $skill->type)
                            <option value="{{ $icon }}" selected="selected">{{ $skillName }}</option>
                        @else
                            <option value="{{ $icon }}">{{ $skillName }}</option>
                        @endif
                    @endforeach
                </select>
            @endif
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label" for="development">Development</label>
            @if($errors->has('development'))
                <ul class="uk-list">
                    @foreach($errors->get('development') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <input id="development" class="uk-form-width-large uk-form-danger" name="development" type="checkbox" checked="{{ old('development') }}"> Development
            @elseif($errors->any())
                <input id="development" class="uk-form-width-large uk-form-success" name="development" type="checkbox" checked="{{ old('development') }}"> Development
            @else
                @if($skill->development === 1)
                    <input id="development" class="uk-form-width-large" name="development" type="checkbox" checked="{{ old('development') }}"> Development
                @else
                    <input id="development" class="uk-form-width-large" name="development" type="checkbox"> Development
                @endif
            @endif
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label" for="production">Production</label>
            @if($errors->has('production'))
                <ul class="uk-list">
                    @foreach($errors->get('production') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <input id="production" class="uk-form-width-large uk-form-danger" name="production" type="checkbox"> Production
            @elseif($errors->any())
                <input id="production" class="uk-form-width-large uk-form-success" name="production" type="checkbox" checked="{{ old('production') }}"> Production
            @else
                @if($skill->production === 1)
                    <input id="production" class="uk-form-width-large" name="production" type="checkbox" checked="{{ old('production') }}"> Production
                @else
                    <input id="production" class="uk-form-width-large" name="production" type="checkbox"> Production
                @endif
            @endif
        </div>
        <hr>
        <button class="uk-button uk-button-primary uk-button-small uk-width-1-4">Submit</button>
    </fieldset>
</form>
<hr>
<form method="POST" action="{{ route('skills.destroy', ['skill' => $skill->id]) }}" class="uk-form uk-form-stacked">
    @method('DELETE')
    @csrf
    <hr>
    <button class="uk-button uk-button-danger uk-button-small uk-width-1-4">Delete</button>
</form>
@include('partials.legend')
@endsection