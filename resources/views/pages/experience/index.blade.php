@extends('layouts.base')

@section('active-index')
 uk-active
@endsection

@section('content')
  <div id="experience-intro" class="uk-block" data-uk-parallax="{bgp: '75'}">
      <div class="uk-panel">
          <h3 class="uk-article-title uk-text-center">Experience</h3>
          <p class="uk-article-lead uk-text-center">Languages, frameworks, libraries and tools I have used.</p>
          <p>I have managed to pick up quite a few skill sets since beginning freelance development in 2008, and they are outlined below.  My experience in these skills ranges from simply getting basic functionality going all the way to full fledged working applications.</p>
      </div>
  </div>

  <div id="skills" class="uk-flex uk-flex-column uk-flex-space-around uk-block">
    @foreach($experience as $key => $skillset)
      @if($key === "Design" or $key === "go" or $key === "php")
        <div class="uk-grid" data-uk-grid-match="{target:'.uk-panel'}">
      @endif
          <div class="uk-width-medium-1-2 uk-margin-top">
            @include('partials.skill', ["title" => $key, "skillset" => $skillset])
          </div>
      @if($key !== "Design" or $key !== "go" or $key !== "php")
        
      @endif
    @endforeach
  </div>

  @include('partials.legend')
@endsection