<div class="custom-form">
    <form method="post" action="{{ route('login') }}" name="registerform">
        @csrf
        <label>Username or Email Address * </label>
        <input name="email" required class="input @error('email') is-invalid @enderror" value="{{ old('email') }}"
            type="text" onClick="this.select()">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors }}</strong>
            </span>
        @enderror

        <label>Password * </label>
        <input name="password" required class="@error('password') is-invalid @enderror" type="password"
            onClick="this.select()">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors }}</strong>
            </span>
        @enderror

        <button type="submit" class="log-submit-btn"><span>Log In</span></button>
        <div class="clearfix"></div>
        <div class="filter-tags">
            <input id="check-a" type="checkbox" name="remember">
            <label for="check-a">Remember me</label>
        </div>
    </form>
    @if (Route::has('password.request'))
        <div class="lost_password">
            <a href="{{ route('password.request') }}">Lost Your Password?</a>
        </div>
    @endif
</div>
