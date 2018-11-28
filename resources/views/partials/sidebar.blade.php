<h3 class="uk-panel-title">Experience</h3>
<ul class="uk-nav uk-nav-side">
    <li class="@yield('active-index')"><a href="{{ route('home') }}">Summary</a></li>
    <li class="uk-nav-divider"></li>
    <li class="uk-nav-header">Skillsets</li>
    <li class="@yield('active-skillset-index')"><a href="{{ route('skillsets.index') }}">List Skillsets</a></li>
    <li class="@yield('active-skillset-create')"><a href="{{ route('skillsets.create') }}">Add Skillset</a></li>
    <li class="uk-nav-header">Skills</li>
    <li class="@yield('active-skill-index')"><a href="{{ route('skills.index') }}">List Skills</a></li>
    <li class="@yield('active-skill-create')"><a href="{{ route('skills.create') }}">Add Skill</a></li>
</ul>