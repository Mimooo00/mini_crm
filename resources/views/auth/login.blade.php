<x-guest-layout>
    @if (session('status'))
        <div class="status-msg">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email">
            @if($errors->get('email'))
                <p class="error-msg">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="mt-4">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
            @if($errors->get('password'))
                <p class="error-msg">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="checkbox-label">
                <input id="remember_me" type="checkbox" name="remember">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-6">
            <button type="submit" class="btn-login">
                Log in
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </button>
        </div>
    </form>
</x-guest-layout>
