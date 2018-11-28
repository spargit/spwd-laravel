@extends('layouts.base')

@section('active-skillset-index')
 uk-active
@endsection

@section('content')
  <div class="block">
    <div class="uk-width-4-5 uk-container-center">
        <div class="uk-panel">
          <h3 class="header uk-text-center">Skillsets</h3>
          <dl class="uk-description-list-line">
          @foreach($skillsets as $skillset)
            <dt><a href="{{ route('skillsets.edit', ['skillset' => $skillset->id]) }}">{{ $skillset->title }}</a></dt>
            <dd>{{ $skillset->description }}</dd>
          @endforeach
          </dl>
        </div>
    </div>
  </div>
@endsection