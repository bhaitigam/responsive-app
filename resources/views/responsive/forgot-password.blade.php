<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">

    <title>Forgot Password - FastDate.in | Account Recovery</title>

    {{-- Laravel Tailwind CSS v4 / Vite --}}
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
            --fd-background: #fcf9f8;
            --fd-on-surface: #1b1c1c;
            --fd-outline: #8f6f73;
            --fd-outline-variant: #e4bdc2;
            --fd-primary-fixed: #ffd9de;
        }

        * {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        body {
            background: #ffffff;
            color: var(--fd-on-surface);
        }

        .fd-wave-bg {
            background: radial-gradient(
                circle at 50% -20%,
                #f8a2c0 0%,
                #e2165f 48%,
                #b80049 100%
            );
        }

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
            box-shadow: 0 0 0 3px rgba(184, 0, 73, .10);
        }

        .fd-contact-wrap {
            border: 1px solid #eadde0;
            background: #fcf9f8;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .fd-contact-wrap:focus-within {
            border-color: var(--fd-primary);
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(184, 0, 73, .10);
        }

        .fd-contact-wrap input {
            outline: none;
        }

        .fd-primary-button {
            background: var(--fd-primary);
            color: #ffffff;
            box-shadow: 0 8px 20px -8px rgba(184, 0, 73, .35);
        }

        .fd-primary-button:hover {
            background: var(--fd-primary-container);
        }

        .fd-primary-button:focus-visible {
            outline: 3px solid var(--fd-primary-fixed);
            outline-offset: 3px;
        }

        .fd-otp-input {
            border: 1px solid #eadde0;
            background: #fcf9f8;
            caret-color: var(--fd-primary);
        }

        .fd-otp-input:focus {
            border-color: var(--fd-primary);
            background: #ffffff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(184, 0, 73, .10);
        }

        .fd-link {
            color: var(--fd-primary);
        }

        .fd-link:hover {
            color: var(--fd-primary-container);
        }

        .fd-security-icon {
            background: #fff0f4;
            color: var(--fd-primary);
        }

        .fd-toast {
            border-color: var(--fd-primary);
            box-shadow: 0 0 30px -5px rgba(184, 0, 73, .22);
        }

        @media (max-width: 767px) {
            body {
                background: #ffffff;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-white text-slate-800 antialiased">

@php
    $recoveryCodeSent = session('recovery_code_sent', false);
    $recoveryContact = old('contact', session('recovery_contact', ''));
@endphp

<main class="flex min-h-screen items-center justify-center p-0 md:p-6">

    <div class="relative flex min-h-screen w-full max-w-[430px] flex-col justify-between overflow-hidden bg-white md:min-h-[760px] md:rounded-[40px] md:border md:border-[#f0dce1] md:shadow-2xl">

        {{-- Pink header --}}
        <header class="fd-wave-bg relative flex h-40 flex-col justify-between overflow-hidden px-6 py-6 shadow-sm">

            {{-- Decorative wave contours --}}
            <svg class="pointer-events-none absolute inset-0 h-full w-full opacity-20"
                 viewBox="0 0 400 160"
                 fill="none"
                 stroke="#ffffff"
                 stroke-width="1.6"
                 aria-hidden="true">
                <path d="M-20 30 Q 100 100, 220 30 T 420 70"/>
                <path d="M-40 70 Q 90 140, 240 60 T 440 100"/>
            </svg>

            {{-- Back navigation --}}
            <div class="relative z-10 flex items-center justify-between">

                <a href="{{ url('/login') }}"
                   aria-label="Back to login"
                   class="flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-slate-800 shadow-sm transition hover:bg-white active:scale-90">

                    <svg class="h-4 w-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24"
                         aria-hidden="true">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2.5"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>

                <span class="rounded-full bg-white/25 px-3 py-1 text-[11px] font-bold text-white backdrop-blur-md">
                    ACCOUNT SECURITY
                </span>

            </div>

            {{-- Heading --}}
            <div class="relative z-10">
                <h1 class="text-xl font-extrabold tracking-tight text-white">
                    Reset Password
                </h1>

                <p class="text-xs font-semibold text-white/90">
                    Recover your FastDate account
                </p>
            </div>

        </header>

        {{-- Form body --}}
        <div class="relative z-20 -mt-4 flex flex-1 flex-col justify-between rounded-t-[32px] bg-white px-7 py-6">

            <div class="space-y-4">

                {{-- Security information --}}
                <div class="flex items-center gap-3 rounded-2xl border border-[#f0dce1] bg-[#fff8fa] p-3">

                    <div class="fd-security-icon flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl text-lg font-bold">
                        🛡️
                    </div>

                    <div>
                        <h2 class="text-xs font-bold text-slate-900">
                            Secure Account Recovery
                        </h2>

                        <p class="mt-0.5 text-[11px] leading-tight text-slate-500">
                            We'll verify your registered phone or email before allowing a password change.
                        </p>
                    </div>

                </div>

                {{-- Laravel status and errors --}}
                @if (session('status'))
                    <div class="rounded-xl border border-green-200 bg-green-50 p-3 text-xs font-semibold text-green-700"
                         role="status">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="rounded-xl border border-red-200 bg-red-50 p-3 text-xs font-semibold text-red-700"
                         role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- STEP 1: Request recovery code --}}
                @if (!$recoveryCodeSent)

                    <form id="recoveryContactForm"
                          action="{{ url('/forgot-password/send-code') }}"
                          method="POST"
                          class="space-y-4">

                        @csrf

                        <div>
                            <label for="recoveryContact"
                                   class="mb-1.5 block text-xs font-bold text-slate-700">
                                Registered Phone or Email
                            </label>

                            <div class="fd-contact-wrap flex items-center rounded-2xl p-1.5">

                                <span class="px-3 text-slate-400">
                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24"
                                         aria-hidden="true">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                </span>

                                <input
                                    type="text"
                                    id="recoveryContact"
                                    name="contact"
                                    value="{{ $recoveryContact }}"
                                    placeholder="Phone number or email address"
                                    autocomplete="username"
                                    required
                                    class="w-full min-w-0 bg-transparent px-2 py-2 text-sm font-semibold text-slate-900">

                            </div>

                            @error('contact')
                                <p class="mt-2 text-xs font-semibold text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 pl-1 text-[11px] leading-relaxed text-slate-400">
                                Enter the phone number or email address associated with your account.
                            </p>
                        </div>

                        <button type="submit"
                                class="fd-primary-button w-full rounded-2xl py-4 text-sm font-bold transition active:scale-[0.98]">
                            Send Recovery Code
                        </button>

                    </form>

                @else

                    {{-- STEP 2: Verify code and reset password --}}
                    <form id="resetPasswordForm"
                          action="{{ url('/forgot-password/reset') }}"
                          method="POST"
                          class="space-y-4">

                        @csrf

                        <input type="hidden"
                               name="contact"
                               value="{{ $recoveryContact }}">

                        <div>
                            <div class="mb-3 flex items-center justify-between gap-2 text-xs">

                                <span class="font-bold text-slate-700">
                                    Enter 4-digit recovery code
                                </span>

                                <span class="break-all text-right text-[10px] font-semibold text-slate-500">
                                    {{ $recoveryContact }}
                                </span>

                            </div>

                            <div class="grid grid-cols-4 gap-3">

                                @for ($i = 1; $i <= 4; $i++)
                                    <input
                                        id="recoveryOtp{{ $i }}"
                                        type="text"
                                        inputmode="numeric"
                                        maxlength="1"
                                        pattern="[0-9]"
                                        autocomplete="{{ $i === 1 ? 'one-time-code' : 'off' }}"
                                        aria-label="Recovery code digit {{ $i }}"
                                        required
                                        class="fd-otp-input h-12 min-w-0 rounded-2xl text-center text-lg font-bold text-slate-900">
                                @endfor

                            </div>

                            <input type="hidden"
                                   name="otp"
                                   id="recoveryOtpValue">

                            @error('otp')
                                <p class="mt-2 text-xs font-semibold text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p id="recoveryOtpError"
                               class="mt-2 hidden text-xs font-semibold text-red-600"
                               role="alert">
                                Please enter all 4 digits.
                            </p>

                        </div>

                        {{-- Resend recovery code --}}
                        <div class="text-center">
                            <button type="button"
                                    id="resendCodeButton"
                                    class="fd-link text-xs font-bold underline underline-offset-4">
                                Resend recovery code
                            </button>

                            <p id="resendStatus"
                               class="mt-2 text-[11px] text-slate-500"
                               aria-live="polite"></p>
                        </div>

                        {{-- New password --}}
                        <div class="space-y-3 pt-2">

                            <div>
                                <label for="newPassword"
                                       class="mb-1.5 block text-xs font-bold text-slate-700">
                                    New Password
                                </label>

                                <input
                                    type="password"
                                    id="newPassword"
                                    name="password"
                                    minlength="8"
                                    autocomplete="new-password"
                                    placeholder="At least 8 characters"
                                    required
                                    class="fd-input w-full rounded-2xl px-4 py-3 text-sm font-semibold">

                                @error('password')
                                    <p class="mt-2 text-xs font-semibold text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="confirmPassword"
                                       class="mb-1.5 block text-xs font-bold text-slate-700">
                                    Confirm New Password
                                </label>

                                <input
                                    type="password"
                                    id="confirmPassword"
                                    name="password_confirmation"
                                    minlength="8"
                                    autocomplete="new-password"
                                    placeholder="Re-enter your password"
                                    required
                                    class="fd-input w-full rounded-2xl px-4 py-3 text-sm font-semibold">

                                <p id="passwordMismatch"
                                   class="mt-2 hidden text-xs font-semibold text-red-600"
                                   role="alert">
                                    Passwords do not match.
                                </p>
                            </div>

                            {{-- Dynamic password strength --}}
                            <div class="space-y-1">

                                <div class="flex items-center justify-between text-[11px]">
                                    <span class="font-semibold text-slate-500">
                                        Password Strength:
                                    </span>

                                    <span id="passwordStrengthLabel"
                                          class="font-bold text-slate-400">
                                        Not entered
                                    </span>
                                </div>

                                <div class="flex h-1.5 w-full gap-1 overflow-hidden rounded-full bg-slate-100">
                                    <div id="strengthBar1"
                                         class="h-full flex-1 rounded-full bg-slate-200"></div>
                                    <div id="strengthBar2"
                                         class="h-full flex-1 rounded-full bg-slate-200"></div>
                                    <div id="strengthBar3"
                                         class="h-full flex-1 rounded-full bg-slate-200"></div>
                                </div>

                            </div>

                        </div>

                        {{-- Submit reset --}}
                        <button type="submit"
                                class="fd-primary-button w-full rounded-2xl py-4 text-sm font-bold transition active:scale-[0.98]">
                            Update Password
                        </button>

                    </form>

                    {{-- Resend code form --}}
                    <form id="resendCodeForm"
                          action="{{ url('/forgot-password/resend-code') }}"
                          method="POST"
                          class="hidden">

                        @csrf

                        <input type="hidden"
                               name="contact"
                               value="{{ $recoveryContact }}">

                    </form>

                @endif

            </div>

            {{-- Bottom links --}}
            <div class="space-y-2 pt-6 text-center">

                <p class="text-xs text-slate-500">
                    Remembered your credentials?

                    <a href="{{ url('/login') }}"
                       class="fd-link font-bold underline underline-offset-2">
                        Back to Login
                    </a>
                </p>

                <p class="text-[11px] text-slate-400">
                    Need help?
                    <a href="{{ url('/support') }}"
                       class="font-bold text-slate-600 underline">
                        FastDate Support
                    </a>
                </p>

            </div>

        </div>
    </div>
</main>

{{-- Success toast: shown only when Laravel reports success --}}
@if (session('password_reset_success'))
    <div id="successToast"
         class="fd-toast fixed inset-x-4 bottom-6 mx-auto max-w-sm rounded-2xl border bg-slate-950 p-4 text-white">

        <div class="flex items-center gap-3">

            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#b80049] text-sm font-black text-white">
                ✓
            </div>

            <div>
                <h2 class="text-xs font-bold text-white">
                    Password Updated!
                </h2>

                <p class="text-[11px] text-slate-300">
                    Your password has been reset successfully.
                </p>
            </div>

        </div>
    </div>

    <script>
        setTimeout(() => {
            window.location.href = @json(url('/login'));
        }, 1800);
    </script>
@endif

<script>
    // Four-digit recovery OTP: typing, navigation and paste.
    const recoveryOtpInputs = Array.from(
        document.querySelectorAll('.fd-otp-input')
    );

    const recoveryOtpValue = document.getElementById('recoveryOtpValue');
    const resetPasswordForm = document.getElementById('resetPasswordForm');
    const recoveryOtpError = document.getElementById('recoveryOtpError');

    recoveryOtpInputs.forEach((input, index) => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/\D/g, '').slice(-1);

            if (input.value && index < recoveryOtpInputs.length - 1) {
                recoveryOtpInputs[index + 1].focus();
            }

            if (recoveryOtpError) {
                recoveryOtpError.classList.add('hidden');
            }
        });

        input.addEventListener('keydown', (event) => {
            if (
                event.key === 'Backspace' &&
                !input.value &&
                index > 0
            ) {
                recoveryOtpInputs[index - 1].focus();
            }

            if (event.key === 'ArrowLeft' && index > 0) {
                recoveryOtpInputs[index - 1].focus();
            }

            if (
                event.key === 'ArrowRight' &&
                index < recoveryOtpInputs.length - 1
            ) {
                recoveryOtpInputs[index + 1].focus();
            }
        });

        input.addEventListener('paste', (event) => {
            event.preventDefault();

            const digits = (
                event.clipboardData.getData('text') || ''
            ).replace(/\D/g, '').slice(0, 4);

            digits.split('').forEach((digit, i) => {
                if (recoveryOtpInputs[i]) {
                    recoveryOtpInputs[i].value = digit;
                }
            });

            const firstEmpty = recoveryOtpInputs.findIndex(
                item => !item.value
            );

            if (firstEmpty !== -1) {
                recoveryOtpInputs[firstEmpty].focus();
            } else {
                recoveryOtpInputs[recoveryOtpInputs.length - 1].focus();
            }
        });
    });

    // Validate OTP and matching passwords before submission.
    if (resetPasswordForm) {
        resetPasswordForm.addEventListener('submit', (event) => {
            const code = recoveryOtpInputs
                .map(input => input.value)
                .join('');

            const password = document.getElementById('newPassword').value;
            const confirmation = document.getElementById('confirmPassword').value;

            if (!/^\d{4}$/.test(code)) {
                event.preventDefault();

                if (recoveryOtpError) {
                    recoveryOtpError.classList.remove('hidden');
                }

                const firstEmpty = recoveryOtpInputs.find(
                    input => !input.value
                );

                if (firstEmpty) {
                    firstEmpty.focus();
                }

                return;
            }

            if (password !== confirmation) {
                event.preventDefault();

                document.getElementById('passwordMismatch')
                    .classList.remove('hidden');

                document.getElementById('confirmPassword').focus();
                return;
            }

            recoveryOtpValue.value = code;
        });
    }

    // Live password strength indicator.
    const newPasswordInput = document.getElementById('newPassword');

    if (newPasswordInput) {
        newPasswordInput.addEventListener('input', () => {
            const password = newPasswordInput.value;
            const label = document.getElementById('passwordStrengthLabel');
            const bars = [
                document.getElementById('strengthBar1'),
                document.getElementById('strengthBar2'),
                document.getElementById('strengthBar3')
            ];

            let score = 0;

            if (password.length >= 8) score++;
            if (/[A-Z]/.test(password) && /[a-z]/.test(password)) score++;
            if (/\d/.test(password) && /[^A-Za-z0-9]/.test(password)) score++;

            const levels = [
                { text: 'Not entered', color: 'bg-slate-200', textColor: 'text-slate-400' },
                { text: 'Weak', color: 'bg-red-500', textColor: 'text-red-600' },
                { text: 'Fair', color: 'bg-amber-500', textColor: 'text-amber-600' },
                { text: 'Strong', color: 'bg-[#b80049]', textColor: 'text-[#b80049]' }
            ];

            const level = password.length === 0 ? 0 : score;

            label.textContent = levels[level].text;
            label.className = 'font-bold ' + levels[level].textColor;

            bars.forEach((bar, index) => {
                bar.className = 'h-full flex-1 rounded-full ' +
                    (index < level ? levels[level].color : 'bg-slate-200');
            });
        });
    }

    // Clear password mismatch feedback while correcting the fields.
    const confirmationInput = document.getElementById('confirmPassword');

    if (confirmationInput) {
        confirmationInput.addEventListener('input', () => {
            document.getElementById('passwordMismatch')
                .classList.add('hidden');
        });
    }

    // Submit the Laravel resend-code form.
    const resendButton = document.getElementById('resendCodeButton');
    const resendForm = document.getElementById('resendCodeForm');

    if (resendButton && resendForm) {
        resendButton.addEventListener('click', () => {
            resendButton.disabled = true;
            resendButton.textContent = 'Sending...';
            resendForm.submit();
        });
    }
</script>

</body>
</html>
