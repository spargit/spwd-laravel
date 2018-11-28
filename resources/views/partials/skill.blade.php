<div class="uk-panel uk-panel-box">
    <h3 class="uk-text-center">{{ $title }}</h3>
    <p>{{ $skillset['description'] }}</p>
    <table class="uk-table">
        <thead>
            <tr>
                <th class="uk-text-right">Skill</th>
                <th class="uk-text-center">Type</th>
                <th class="uk-text-center">Development</th>
                <th class="uk-text-center">Production</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skillset['skills'] as $skill)
            <tr>
                <td class="uk-text-right"><a href="{{ route('skills.edit', ['skill' => $skill->id]) }}">{{ $skill->name }}</a></td>
                <td class="uk-text-center"><i class="fa {{ $skill->type }}"></i></td>
                @if($skill->development === 1)
                    <td class="uk-text-center uk-text-success"><i class="fa fa-check"></i></td>
                @else
                    <td class="uk-text-center uk-text-danger"><i class="fa fa-times"></i></td>
                @endif
                @if($skill->production === 1)
                    <td class="uk-text-center uk-text-success"><i class="fa fa-check"></i></td>
                @else
                    <td class="uk-text-center uk-text-danger"><i class="fa fa-times"></i></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>