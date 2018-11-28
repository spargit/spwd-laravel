@extends('layouts.base')

@section('content')
<form class="uk-form uk-form-stacked" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @csrf
    <fieldset data-uk-margin>
        <legend>{{ __('Login') }}</legend>
        <div class="uk-form-row">
            {{-- Email --}}
            <label for="email" class="uk-form-label">{{ __('E-Mail Address') }}</label>
            @if($errors->has('email'))
                <input id="email" class="uk-form-danger" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <ul class="uk-list">
                    @foreach($errors->get('email') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @elseif($errors->any())
                <input id="email" class="uk-form-success" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @else
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            @endif

            {{-- Password --}}
            <label for="password" class="uk-form-label">{{ __('Password') }}</label>
            @if($errors->has('password'))
                <input id="password" type="password" class="uk-form-danger" name="password" required>
                <ul class="uk-list">
                    @foreach($errors->get('password') as $error)
                        <li class="uk-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @elseif($errors->any())
                <input id="password" type="password" class="uk-form-success" name="password" required>
            @else
                <input id="password" type="password" name="password" required>
            @endif
        </div>
        <div class="uk-form-row">
            <button class="uk-button">Login</button>
            <label><input type="checkbox"> Remember Me</label>
        </div>
    </fieldset>
</form>
@endsection
