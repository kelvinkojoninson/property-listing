<div class="custom-form">
    <form method="POST" action="{{ route('register') }}" name="registerform" class="main-register-form" id="main-register-form2">
        @csrf
        <label>First Name * </label>
        <input name="firstName" value="{{ old('firstName') }}" type="text" onClick="this.select()">
        <label>Last Name *</label>
        <input name="lastName" value="{{ old('lastName') }}" type="text" onClick="this.select()">
        <label>Email Address *</label>
        <input name="email" type="text" onClick="this.select()"  value="{{ old('email') }}">
        <label>Password *</label>
        <input name="password" type="password" onClick="this.select()">
        <label>Confirm Password *</label>
        <input name="password_confirmation" type="password" onClick="this.select()">
        <button type="submit" class="log-submit-btn"><span>Register</span></button>
    </form>
</div>