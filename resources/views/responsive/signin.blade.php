<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">

    <title>Login - FastDate.in | Instant 3-Minute Dating</title>

    {{-- Laravel + Tailwind CSS v4 --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --fd-primary: #b80049;
            --fd-primary-container: #e2165f;
            --fd-secondary: #632ce5;
            --fd-secondary-container: #7c4dff;
            --fd-background: #fcf9f8;
            --fd-surface: #ffffff;
            --fd-on-surface: #1b1c1c;
            --fd-outline: #8f6f73;
            --fd-outline-variant: #e4bdc2;
            --fd-primary-fixed: #ffd9de;
        }

        * {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        html {
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            color: var(--fd-on-surface);
            background: #ffffff;
        }

        .fd-page {
            background: #ffffff;
        }

        .fd-card {
            background: var(--fd-surface);
        }

        /* FastDate pink wave header */
        .wave-bg {
            background:
                radial-gradient(
                    circle at 50% -20%,
                    #f8a2c0 0%,
                    #e2165f 48%,
                    #b80049 100%
                );
        }

        .contour-pattern {
            background-image:
                radial-gradient(
                    rgba(255, 255, 255, 0.18) 1.5px,
                    transparent 1.5px
                ),
                radial-gradient(
                    rgba(255, 217, 222, 0.15) 1.5px,
                    transparent 1.5px
                );
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
        }

        /* Theme buttons */
        .fd-primary-button {
            background: var(--fd-primary);
            color: #ffffff;
            box-shadow: 0 8px 20px -8px rgba(184, 0, 73, 0.35);
        }

        .fd-primary-button:hover {
            background: var(--fd-primary-container);
            box-shadow: 0 10px 24px -8px rgba(184, 0, 73, 0.4);
        }

        .fd-primary-button:focus-visible {
            outline: 3px solid var(--fd-primary-fixed);
            outline-offset: 3px;
        }

        /* Inputs */
        .fd-input {
            border: 1px solid #eadde0;
            background: #fcf9f8;
            color: var(--fd-on-surface);
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .fd-input::placeholder {
            color: #a49a9c;
        }

        .fd-input:focus {
            border-color: var(--fd-primary);
            background: #ffffff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(184, 0, 73, 0.10);
        }

        .fd-phone-wrap {
            border: 1px solid #eadde0;
            background: #fcf9f8;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .fd-phone-wrap:focus-within {
            border-color: var(--fd-primary);
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(184, 0, 73, 0.10);
        }

        .fd-phone-wrap input {
            outline: none;
        }

        .fd-phone-wrap input:focus {
            box-shadow: none;
        }

        /* Login tabs */
        .fd-tab-container {
            background: #f8f0f3;
        }

        .fd-tab {
            color: #76676b;
            transition: background .2s, color .2s, box-shadow .2s;
        }

        .fd-tab:hover {
            color: var(--fd-primary);
        }

        .fd-tab.active {
            background: #ffffff;
            color: var(--fd-primary);
            box-shadow: 0 1px 4px rgba(40, 10, 20, 0.08);
        }

        /* OTP fields */
        .fd-otp-input {
            border: 1px solid #eadde0;
            background: #fcf9f8;
            caret-color: var(--fd-primary);
        }

        .fd-otp-input:focus {
            border-color: var(--fd-primary);
            background: #ffffff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(184, 0, 73, 0.10);
        }

        .fd-link {
            color: var(--fd-primary);
        }

        .fd-link:hover {
            color: var(--fd-primary-container);
        }

        .fd-social-button {
            border: 1px solid #eadde0;
            background: #ffffff;
            transition: border-color .2s, background .2s;
        }

        .fd-social-button:hover {
            border-color: #d9b4bf;
            background: #fff8fa;
        }

        .fd-checkbox {
            accent-color: var(--fd-primary);
        }

        @media (max-width: 767px) {
            body {
                background: #ffffff;
            }
        }
    </style>
</head>

<body class="fd-page min-h-screen text-slate-800 antialiased">

@php
    $otpSent = session('otp_sent', false);
    $phoneValue = old('phone', session('login_phone', ''));
    $emailValue = old('email', '');
@endphp

<main class="flex min-h-screen items-center justify-center p-0 md:p-6">

    <div class="fd-card relative flex min-h-screen w-full max-w-[430px] flex-col justify-between overflow-hidden md:min-h-[760px] md:rounded-[40px] md:border md:border-[#f0dce1] md:shadow-2xl">

        {{-- Pink header --}}
        <header class="wave-bg relative flex h-44 w-full select-none flex-col items-center justify-start overflow-hidden px-6 pt-10 shadow-sm">

            {{-- Decorative contour lines --}}
            <div class="contour-pattern pointer-events-none absolute inset-0"></div>

            <svg class="pointer-events-none absolute inset-0 h-full w-full opacity-20"
                 viewBox="0 0 400 200"
                 fill="none"
                 stroke="#ffffff"
                 stroke-width="1.6"
                 aria-hidden="true">
                <path d="M-20 40 Q 100 120, 220 30 T 420 80"/>
                <path d="M-40 90 Q 90 170, 240 70 T 440 120"/>
                <path d="M-10 140 Q 120 200, 280 110 T 460 160"/>
            </svg>

            <div class="relative z-10 flex items-center gap-1.5 rounded-full bg-white/25 px-3 py-1 text-[11px] font-bold text-white backdrop-blur-md">
                <span aria-hidden="true">⚡</span>
                <span>INDIA'S 3-MINUTE SPEED DATING</span>
            </div>

            <h1 class="relative z-10 mt-2 text-2xl font-extrabold tracking-tight text-white">
                Welcome to FastDate
            </h1>

            <p class="relative z-10 text-xs font-semibold text-white/90">
                Login to your account
            </p>
        </header>

        {{-- Login content --}}
        <div class="relative z-20 -mt-6 flex flex-1 flex-col justify-between rounded-t-[36px] bg-white px-7 py-6">

            <div>

                {{-- Phone / Email tabs --}}
                <div class="fd-tab-container mb-5 flex rounded-2xl p-1 text-xs font-bold">

                    <button
                        id="tabPhone"
                        type="button"
                        onclick="toggleAuthMode('phone')"
                        class="fd-tab active flex-1 rounded-xl py-2"
                        aria-pressed="true">
                        Phone &amp; OTP
                    </button>

                    <button
                        id="tabEmail"
                        type="button"
                        onclick="toggleAuthMode('email')"
                        class="fd-tab flex-1 rounded-xl py-2"
                        aria-pressed="false">
                        Email &amp; Password
                    </button>

                </div>

                {{-- General validation / status --}}
                @if (session('error'))
                    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-3 text-xs font-semibold text-red-700"
                         role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('status'))
                    <div class="mb-4 rounded-xl border border-green-200 bg-green-50 p-3 text-xs font-semibold text-green-700"
                         role="status">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- PHONE LOGIN --}}
                <div id="phoneAuthForm"
                     class="{{ old('auth_mode', 'phone') === 'email' ? 'hidden' : '' }} space-y-4">

                    @if (!$otpSent)

                        {{-- Request OTP --}}
                        <form action="{{ url('/login/phone/send-otp') }}"
                              method="POST"
                              id="phoneRequestForm"
                              class="space-y-4">

                            @csrf

                            <div>
                                <label for="loginPhone"
                                       class="mb-1.5 block text-xs font-bold text-slate-700">
                                    Phone number
                                </label>

                                <div class="fd-phone-wrap flex items-center rounded-2xl p-1.5">

                                    <div class="flex cursor-default select-none items-center gap-1.5 border-r border-[#eadde0] px-3 py-2">
                                        <span class="text-base leading-none">🇮🇳</span>
                                        <span class="text-xs font-bold text-slate-800">+91</span>
                                        <svg class="h-3 w-3 text-slate-400"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24"
                                             aria-hidden="true">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>

                                    <input
                                        type="tel"
                                        id="loginPhone"
                                        name="phone"
                                        inputmode="numeric"
                                        autocomplete="tel-national"
                                        maxlength="10"
                                        pattern="[6-9][0-9]{9}"
                                        placeholder="Enter 10-digit number"
                                        value="{{ $phoneValue }}"
                                        required
                                        class="w-full min-w-0 bg-transparent px-3 py-2 text-sm font-semibold text-slate-900">

                                </div>

                                @error('phone')
                                    <p class="mt-2 text-xs font-semibold text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <p class="mt-1.5 pl-1 text-[11px] leading-relaxed text-slate-400">
                                    We'll send an SMS or WhatsApp OTP to verify you. Standard rates apply.
                                </p>
                            </div>

                            <button
                                type="submit"
                                class="fd-primary-button w-full rounded-2xl py-4 text-sm font-bold transition active:scale-[0.98]">
                                Send OTP
                            </button>

                        </form>

                    @else

                        {{-- Verify OTP --}}
                        <form action="{{ url('/login/phone/verify-otp') }}"
                              method="POST"
                              id="phoneVerifyForm"
                              class="space-y-4">

                            @csrf

                            <input type="hidden" name="phone" value="{{ $phoneValue }}">

                            <div>
                                <label for="loginOtp1"
                                       class="mb-1.5 block text-xs font-bold text-slate-700">
                                    Enter 4-digit OTP
                                </label>

                                <p class="mb-3 text-xs leading-5 text-slate-500">
                                    Enter the verification code sent to your phone.
                                </p>

                                <div class="grid grid-cols-4 gap-3">

                                    @for ($i = 1; $i <= 4; $i++)
                                        <input
                                            id="loginOtp{{ $i }}"
                                            type="text"
                                            inputmode="numeric"
                                            maxlength="1"
                                            pattern="[0-9]"
                                            autocomplete="{{ $i === 1 ? 'one-time-code' : 'off' }}"
                                            aria-label="OTP digit {{ $i }}"
                                            required
                                            class="fd-otp-input h-12 min-w-0 rounded-2xl text-center text-lg font-bold text-slate-900">
                                    @endfor

                                </div>

                                <input type="hidden" name="otp" id="loginOtpValue">

                                @error('otp')
                                    <p class="mt-2 text-xs font-semibold text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <p id="loginOtpError"
                                   class="mt-2 hidden text-xs font-semibold text-red-600"
                                   role="alert">
                                    Please enter all 4 digits.
                                </p>
                            </div>

                            <button
                                type="submit"
                                class="fd-primary-button w-full rounded-2xl py-4 text-sm font-bold transition active:scale-[0.98]">
                                Verify OTP &amp; Log In
                            </button>

                        </form>

                        {{-- Resend OTP --}}
                        <form action="{{ url('/login/phone/resend-otp') }}"
                              method="POST"
                              class="mt-4 text-center">

                            @csrf

                            <input type="hidden" name="phone" value="{{ $phoneValue }}">

                            <button type="submit"
                                    class="fd-link text-xs font-bold underline underline-offset-4">
                                Resend OTP
                            </button>

                        </form>

                    @endif

                </div>

                {{-- EMAIL + PASSWORD LOGIN --}}
                <div id="emailAuthForm"
                     class="{{ old('auth_mode') === 'email' ? '' : 'hidden' }} space-y-4">

                    <form action="{{ url('/login') }}"
                          method="POST"
                          id="emailLoginForm"
                          class="space-y-4">

                        @csrf

                        <input type="hidden" name="auth_mode" value="email">

                        <div>
                            <label for="loginEmail"
                                   class="mb-1.5 block text-xs font-bold text-slate-700">
                                Email address
                            </label>

                            <input
                                type="email"
                                id="loginEmail"
                                name="email"
                                autocomplete="email"
                                placeholder="you@example.com"
                                value="{{ $emailValue }}"
                                required
                                class="fd-input w-full rounded-2xl px-4 py-3 text-sm font-semibold">

                            @error('email')
                                <p class="mt-2 text-xs font-semibold text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <div class="mb-1.5 flex items-center justify-between">

                                <label for="loginPassword"
                                       class="text-xs font-bold text-slate-700">
                                    Password
                                </label>

                                <a href="{{ url('/forgot-password') }}"
                                   class="fd-link text-xs font-bold transition-colors">
                                    Forgot password?
                                </a>

                            </div>

                            <div class="relative">

                                <input
                                    type="password"
                                    id="loginPassword"
                                    name="password"
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                    required
                                    class="fd-input w-full rounded-2xl px-4 py-3 pr-12 text-sm font-semibold">

                                <button
                                    type="button"
                                    id="togglePasswordButton"
                                    onclick="togglePasswordVisibility()"
                                    aria-label="Show password"
                                    class="absolute right-4 top-3 text-slate-400 transition hover:text-[#b80049]">

                                    <svg id="passwordEyeIcon"
                                         class="h-5 w-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24"
                                         aria-hidden="true">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>

                                </button>
                            </div>

                            @error('password')
                                <p class="mt-2 text-xs font-semibold text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between text-xs">

                            <label class="flex cursor-pointer items-center gap-2 text-slate-600">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                    @checked(old('remember'))
                                    class="fd-checkbox h-4 w-4 rounded">

                                <span>Remember me</span>
                            </label>

                        </div>

                        <button
                            type="submit"
                            class="fd-primary-button w-full rounded-2xl py-4 text-sm font-bold transition active:scale-[0.98]">
                            Log In
                        </button>

                    </form>

                </div>

                {{-- Divider --}}
                <div class="relative flex items-center py-5">

                    <div class="flex-grow border-t border-[#eadde0]"></div>

                    <span class="mx-3 flex-shrink text-xs font-bold uppercase tracking-wider text-slate-400">
                        Or
                    </span>

                    <div class="flex-grow border-t border-[#eadde0]"></div>

                </div>

                {{-- Google and Apple buttons --}}
                <div class="space-y-3">

                    {{-- Google --}}
                    <a href="{{ url('/auth/google') }}"
                       class="fd-social-button flex w-full items-center justify-center gap-3 rounded-2xl px-4 py-3.5 text-xs font-bold text-slate-700 shadow-sm">

                        <svg class="h-4 w-4"
                             viewBox="0 0 24 24"
                             aria-hidden="true">
                            <path fill="#4285F4"
                                  d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853"
                                  d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05"
                                  d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                            <path fill="#EA4335"
                                  d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                        </svg>

                        Continue with Google
                    </a>

                    {{-- Apple --}}
                    <a href="{{ url('/auth/apple') }}"
                       class="fd-social-button flex w-full items-center justify-center gap-3 rounded-2xl px-4 py-3.5 text-xs font-bold text-slate-900 shadow-sm">

                        <svg class="h-4 w-4 fill-current"
                             viewBox="0 0 24 24"
                             aria-hidden="true">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.61-.75 1.04-1.8 1.01-2.87-1 .04-2.13.67-2.75 1.41-.54.63-.99 1.68-.89 2.69 1.1.09 2.03-.49 2.63-1.23z"/>
                        </svg>

                        Continue with Apple
                    </a>

                </div>

            </div>

            {{-- Signup prompt --}}
            <div class="pt-6 text-center">

                <p class="text-xs text-slate-500">
                    Don't have an account?

                    <a href="{{ url('/register') }}"
                       class="fd-link font-bold underline underline-offset-2 transition-colors">
                        Create an account
                    </a>
                </p>

            </div>

        </div>
    </div>
</main>

<script>
    function toggleAuthMode(mode) {
        const tabPhone = document.getElementById('tabPhone');
        const tabEmail = document.getElementById('tabEmail');
        const phoneForm = document.getElementById('phoneAuthForm');
        const emailForm = document.getElementById('emailAuthForm');

        if (mode === 'phone') {
            tabPhone.classList.add('active');
            tabEmail.classList.remove('active');

            tabPhone.setAttribute('aria-pressed', 'true');
            tabEmail.setAttribute('aria-pressed', 'false');

            phoneForm.classList.remove('hidden');
            emailForm.classList.add('hidden');
        } else {
            tabEmail.classList.add('active');
            tabPhone.classList.remove('active');

            tabEmail.setAttribute('aria-pressed', 'true');
            tabPhone.setAttribute('aria-pressed', 'false');

            emailForm.classList.remove('hidden');
            phoneForm.classList.add('hidden');
        }
    }

    function togglePasswordVisibility() {
        const password = document.getElementById('loginPassword');
        const button = document.getElementById('togglePasswordButton');

        if (!password || !button) return;

        const showPassword = password.type === 'password';

        password.type = showPassword ? 'text' : 'password';

        button.setAttribute(
            'aria-label',
            showPassword ? 'Hide password' : 'Show password'
        );
    }

    // Accept digits only in the phone field.
    const phoneInput = document.getElementById('loginPhone');

    if (phoneInput) {
        phoneInput.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
        });
    }

    // Four-digit OTP keyboard navigation and paste support.
    const otpInputs = Array.from(
        document.querySelectorAll('.fd-otp-input')
    );

    const otpForm = document.getElementById('phoneVerifyForm');
    const otpHidden = document.getElementById('loginOtpValue');
    const otpError = document.getElementById('loginOtpError');

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/\D/g, '').slice(-1);

            if (input.value && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }

            if (otpError) {
                otpError.classList.add('hidden');
            }
        });

        input.addEventListener('keydown', (event) => {
            if (
                event.key === 'Backspace' &&
                !input.value &&
                index > 0
            ) {
                otpInputs[index - 1].focus();
            }

            if (event.key === 'ArrowLeft' && index > 0) {
                otpInputs[index - 1].focus();
            }

            if (
                event.key === 'ArrowRight' &&
                index < otpInputs.length - 1
            ) {
                otpInputs[index + 1].focus();
            }
        });

        input.addEventListener('paste', (event) => {
            event.preventDefault();

            const digits = (
                event.clipboardData.getData('text') || ''
            ).replace(/\D/g, '').slice(0, 4);

            digits.split('').forEach((digit, i) => {
                if (otpInputs[i]) {
                    otpInputs[i].value = digit;
                }
            });

            const firstEmpty = otpInputs.findIndex(
                item => !item.value
            );

            if (firstEmpty !== -1) {
                otpInputs[firstEmpty].focus();
            } else {
                otpInputs[otpInputs.length - 1].focus();
            }

            if (otpError) {
                otpError.classList.add('hidden');
            }
        });
    });

    if (otpForm) {
        otpForm.addEventListener('submit', (event) => {
            const code = otpInputs.map(input => input.value).join('');

            if (!/^\d{4}$/.test(code)) {
                event.preventDefault();

                if (otpError) {
                    otpError.textContent = 'Please enter all 4 digits.';
                    otpError.classList.remove('hidden');
                }

                const firstEmpty = otpInputs.find(
                    input => !input.value
                );

                if (firstEmpty) {
                    firstEmpty.focus();
                }

                return;
            }

            otpHidden.value = code;
        });
    }
</script>

</body>
</html>
