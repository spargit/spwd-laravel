@extends('layouts.base')

@section('active-skill-create')
 uk-active
@endsection

@section('content')
<form method="POST" action="{{ route('skills.store') }}" class="uk-form uk-form-stacked">
    @csrf
    <fieldset data-uk-margin>
        <legend>Add A Skill</legend>
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
                        <option value="{{ $skillset->id }}">{{ $skillset->title }}</option>
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
                        <option value="{{ $skillset->id }}">{{ $skillset->title }}</option>
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
                        @foreach($skills as $skill => $icon)
                            <option value="{{ $icon }}">{{ $skill }}</option>
                        @endforeach
                    </select>
                @elseif($errors->any())
                    <select id="type" class="uk-form-success" name="type">
                        @foreach($skills as $skill => $icon)
                            @if($icon === old('type'))
                                <option value="{{ $icon }}" selected="selected">{{ $skill }}</option>
                            @else
                                <option value="{{ $icon }}">{{ $skill }}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <select id="type" name="type">
                        @foreach($skills as $skill => $icon)
                            <option value="{{ $icon }}">{{ $skill }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        <div class="uk-form-row">
            <label class="uk-form-label" for="name">Name</label>
            @if($errors->has('name'))
                <ul class="uk-list">
                    @foreach($errors->get('name') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <input id="name" class="uk-form-width-large uk-form-danger" name="name" type="text" placeholder="Enter skill name">
            @elseif($errors->any())
                <input id="name" class="uk-form-width-large uk-form-success" name="name" type="text" value="{{ old('name') }}">
            @else
                <input id="name" class="uk-form-width-large" name="name" type="name" placeholder="Enter skill name">
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
                <input id="development" class="uk-form-width-large uk-form-danger" name="development" type="checkbox"> Development
            @elseif($errors->any())
                <input id="development" class="uk-form-width-large uk-form-success" name="development" type="checkbox" checked="{{ old('development') }}"> Development
            @else
                <input id="development" class="uk-form-width-large" name="development" type="checkbox"> Development
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
                <input id="production" class="uk-form-width-large" name="production" type="checkbox"> Production
            @endif
        </div>
        <hr>
        <button class="uk-button uk-button-primary">Submit</button>
    </fieldset>
</form>
@include('partials.legend')
@endsection