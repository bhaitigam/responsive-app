
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">

    <title>Verify OTP - FastDate.in</title>

    {{-- Existing Laravel Tailwind CSS v4 / Vite assets --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- FastDate.in theme font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
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

        .fd-primary-text {
            color: var(--fd-primary);
        }

        .fd-icon-box {
            background: #fff0f4;
            color: var(--fd-primary);
        }

        .fd-otp-box {
            caret-color: var(--fd-primary);
            -webkit-appearance: none;
            appearance: none;
        }

        .fd-otp-box:focus {
            border-color: var(--fd-primary);
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(184, 0, 73, 0.12);
        }

        .fd-primary-button {
            background: var(--fd-primary);
            color: #ffffff;
        }

        .fd-primary-button:hover {
            background: var(--fd-primary-container);
        }

        .fd-primary-button:focus-visible {
            outline: 3px solid var(--fd-primary-fixed);
            outline-offset: 3px;
        }

        .fd-link {
            color: var(--fd-primary);
            text-decoration-color: #e8a0b7;
        }

        .fd-link:hover {
            color: var(--fd-primary-container);
        }

        .fd-back-button {
            border-color: #f0dce1;
            color: var(--fd-on-surface);
        }

        .fd-back-button:hover {
            background: #fff5f7;
        }
    </style>
</head>

<body class="min-h-screen bg-white antialiased">

@php
    $verificationEmail = request()->query('email')
        ?? session('verification_email')
        ?? '';
@endphp

<main class="mx-auto flex min-h-screen w-full max-w-md flex-col px-5 py-6 sm:px-7 sm:py-10">

    {{-- Back to registration --}}
    <a href="{{ url('/register') }}"
       aria-label="Back to registration"
       class="fd-back-button mb-8 flex h-10 w-10 items-center justify-center rounded-xl border transition active:scale-95">

        <svg class="h-5 w-5"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="2.2"
             aria-hidden="true">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15 18l-6-6 6-6"/>
        </svg>
    </a>

    <section class="flex flex-1 flex-col">

        {{-- Verification icon --}}
        <div class="fd-icon-box mb-7 flex h-16 w-16 items-center justify-center rounded-2xl">
            <svg class="h-8 w-8"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="1.8"
                 aria-hidden="true">
                <rect x="4" y="3" width="16" height="18" rx="3"/>
                <path stroke-linecap="round" d="M8 7h8M8 11h2m4 0h2M8 15h2m4 0h2"/>
            </svg>
        </div>

        <p class="fd-primary-text mb-2 text-xs font-extrabold uppercase tracking-[.18em]">
            Account verification
        </p>

        <h1 class="text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">
            Verify your email
        </h1>

        <p class="mt-3 max-w-sm text-sm leading-6 text-slate-500">
            Enter the 5-digit verification code we sent to your email address
            to finish creating your FastDate account.
        </p>

        {{-- Email information --}}
        <div class="mt-7 rounded-2xl border border-[#f0dce1] bg-[#fff8fa] p-4">
            <p class="text-xs font-semibold text-slate-500">
                Code sent to
            </p>

            <p id="maskedEmail"
               class="mt-1 break-all text-sm font-bold text-slate-800">
                {{ $verificationEmail ?: 'your email address' }}
            </p>
        </div>

        {{-- OTP verification form --}}
        <form id="otpForm"
              action="{{ url('/verify-otp') }}"
              method="POST"
              class="mt-8"
              novalidate>

            @csrf

            <label for="otp1" class="mb-3 block text-sm font-bold text-slate-800">
                5-digit verification code
            </label>

            {{-- Hidden field submitted to Laravel --}}
            <input type="hidden"
                   name="otp"
                   id="otp"
                   value="{{ old('otp') }}">

            <input type="hidden"
                   name="email"
                   value="{{ $verificationEmail }}">

            <div class="grid grid-cols-5 gap-2.5 sm:gap-3"
                 role="group"
                 aria-label="Five digit verification code">

                @for ($i = 1; $i <= 5; $i++)
                    <input
                        id="otp{{ $i }}"
                        type="text"
                        class="fd-otp-box h-14 min-w-0 rounded-xl border border-[#eadde0] bg-[#fcf9f8] text-center text-xl font-extrabold text-slate-950 outline-none transition sm:h-16"
                        inputmode="numeric"
                        autocomplete="{{ $i === 1 ? 'one-time-code' : 'off' }}"
                        maxlength="1"
                        pattern="[0-9]"
                        aria-label="Digit {{ $i }}"
                        required>
                @endfor

            </div>

            {{-- Client-side validation --}}
            <p id="errorMessage"
               class="mt-3 hidden text-xs font-semibold text-red-600"
               role="alert">
                Please enter all 5 digits.
            </p>

            {{-- Laravel validation errors --}}
            @error('otp')
                <p class="mt-3 text-xs font-semibold text-red-600" role="alert">
                    {{ $message }}
                </p>
            @enderror

            @if (session('error'))
                <p class="mt-3 text-xs font-semibold text-red-600" role="alert">
                    {{ session('error') }}
                </p>
            @endif

            <button type="submit"
                    class="fd-primary-button mt-7 w-full rounded-xl px-5 py-4 text-sm font-extrabold shadow-sm transition focus:outline-none active:scale-[.99]">
                Verify &amp; Create Account
            </button>
        </form>

        {{-- Resend OTP --}}
        <div class="mt-6 text-center">
            <p class="text-sm text-slate-500">
                Didn't receive the code?
            </p>

            <form action="{{ url('/resend-otp') }}" method="POST" class="mt-2">
                @csrf

                <input type="hidden"
                       name="email"
                       value="{{ $verificationEmail }}">

                <button id="resendButton"
                        type="submit"
                        class="fd-link text-sm font-extrabold underline underline-offset-4">
                    Resend code
                </button>
            </form>

            @if (session('status'))
                <p class="mt-3 text-xs font-semibold text-green-700" role="status">
                    {{ session('status') }}
                </p>
            @endif

            @if (session('resend_error'))
                <p class="mt-3 text-xs font-semibold text-red-600" role="alert">
                    {{ session('resend_error') }}
                </p>
            @endif
        </div>

        {{-- Security notice --}}
        <div class="mt-auto pt-10 text-center">
            <p class="text-xs leading-5 text-slate-400">
                Keep your verification code private. FastDate support will
                never ask you to share it.
            </p>
        </div>

    </section>
</main>

<script>
    const otpInputs = Array.from(document.querySelectorAll('.fd-otp-box'));
    const otpForm = document.getElementById('otpForm');
    const otpHidden = document.getElementById('otp');
    const errorMessage = document.getElementById('errorMessage');

    // Restore previously entered OTP digits if available.
    const previousOtp = @json(old('otp', ''));

    if (previousOtp) {
        String(previousOtp).replace(/\D/g, '').slice(0, 5)
            .split('')
            .forEach((digit, index) => {
                if (otpInputs[index]) {
                    otpInputs[index].value = digit;
                }
            });
    }

    otpInputs.forEach((input, index) => {

        input.addEventListener('input', () => {
            input.value = input.value.replace(/\D/g, '').slice(-1);

            if (input.value && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }

            errorMessage.classList.add('hidden');
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

        // Allow pasting the complete 5-digit OTP.
        input.addEventListener('paste', (event) => {
            event.preventDefault();

            const digits = (
                event.clipboardData.getData('text') || ''
            ).replace(/\D/g, '').slice(0, 5);

            digits.split('').forEach((digit, i) => {
                otpInputs[i].value = digit;
            });

            const nextEmpty = otpInputs.findIndex((item) => !item.value);

            if (nextEmpty !== -1) {
                otpInputs[nextEmpty].focus();
            } else {
                otpInputs[4].focus();
            }

            errorMessage.classList.add('hidden');
        });
    });

    // Combine the five digits into the hidden Laravel form field.
    otpForm.addEventListener('submit', (event) => {
        const code = otpInputs.map(input => input.value).join('');

        if (!/^\d{5}$/.test(code)) {
            event.preventDefault();

            errorMessage.textContent = 'Please enter all 5 digits.';
            errorMessage.classList.remove('hidden');

            const firstEmpty = otpInputs.find(input => !input.value);

            if (firstEmpty) {
                firstEmpty.focus();
            }

            return;
        }

        otpHidden.value = code;
    });
</script>

</body>
</html>
