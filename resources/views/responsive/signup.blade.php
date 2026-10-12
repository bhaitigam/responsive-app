<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - FastDate.in | Create Your Dating Profile</title>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        .wave-bg {
            background: radial-gradient(
                circle at 50% -20%,
                #ffd9de 0%,
                #e2165f 45%,
                #b80049 85%,
                #900038 100%
            );
        }

        .fastdate-input {
            background-color: #fcf9f8;
            border: 1px solid #e4bdc2;
            color: #1b1c1c;
            transition: border-color .2s, box-shadow .2s, background-color .2s;
        }

        .fastdate-input:focus {
            background-color: #ffffff;
            border-color: #b80049;
            box-shadow: 0 0 0 2px rgb(184 0 73 / 12%);
            outline: none;
        }

        .fastdate-primary {
            background-color: #b80049;
            color: #ffffff;
            transition: background-color .2s, transform .2s;
        }

        .fastdate-primary:hover {
            background-color: #9f003f;
        }

        .fastdate-option input:checked + span {
            background-color: #ffd9de;
            color: #400014;
            border-color: #b80049;
        }

        .fastdate-option:focus-within span {
            outline: 2px solid #b80049;
            outline-offset: 2px;
        }

        .fastdate-link {
            color: #b80049;
        }

        .fastdate-link:hover {
            color: #632ce5;
        }

        .fastdate-checkbox {
            accent-color: #b80049;
        }
    </style>
</head>

<body class="bg-white text-on-surface font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Main Registration Card Container -->
    <main class="flex-1 flex items-center justify-center p-0 md:p-6">

        <div class="w-full max-w-[430px] bg-white md:rounded-[40px] md:shadow-2xl overflow-hidden md:border md:border-outline-variant/50 min-h-screen md:min-h-[820px] flex flex-col justify-between relative">

            <!-- Top Wave Header -->
            <div class="relative w-full h-32 wave-bg shadow-sm flex items-center px-6 pt-4 overflow-hidden select-none">

                <!-- Subtle Wave Contours -->
                <svg class="absolute inset-0 w-full h-full opacity-20 pointer-events-none"
                     viewBox="0 0 400 150" fill="none"
                     stroke="#ffffff" stroke-width="1.6">
                    <path d="M-20 30 Q 100 90, 220 20 T 420 60" />
                    <path d="M-40 70 Q 90 130, 240 50 T 440 90" />
                </svg>

                <!-- Back Button -->
                <a href="#"
                   aria-label="Back to login"
                   class="relative z-10 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-800 flex items-center justify-center shadow-sm transition-transform active:scale-90">

                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>

                <!-- Title -->
                <h1 class="relative z-10 text-lg font-extrabold text-white ml-4 tracking-tight">
                    Finish signing up
                </h1>
            </div>

            <!-- Registration Form Body -->
            <div class="px-7 py-5 -mt-4 bg-white rounded-t-[32px] flex-1 flex flex-col justify-between relative z-20">

                <form method="POST"
                      action="#"
                      class="space-y-3.5">

                    @csrf

                    <!-- Identity Trust Banner -->
                    <div class="flex items-center gap-2.5 p-2.5 rounded-2xl bg-primary-fixed border border-outline-variant">

                        <svg class="w-4 h-4 shrink-0"
                             style="color:#b80049"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>

                        <p class="text-[11px] text-on-primary-fixed font-semibold leading-tight">
                            100% ID Verified singles. Real name on Govt ID ensures safety.
                        </p>
                    </div>

                    <!-- First Name -->
                    <div>
                        <label for="first_name"
                               class="block text-xs font-semibold text-slate-500 mb-1">
                            First name on ID
                        </label>

                        <input id="first_name"
                               name="first_name"
                               type="text"
                               placeholder="e.g. James"
                               value="{{ old('first_name') }}"
                               autocomplete="given-name"
                               required
                               class="fastdate-input w-full px-4 py-2.5 rounded-2xl text-sm font-semibold outline-none">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name"
                               class="block text-xs font-semibold text-slate-500 mb-1">
                            Last name on ID
                        </label>

                        <input id="last_name"
                               name="last_name"
                               type="text"
                               placeholder="e.g. Anderson"
                               value="{{ old('last_name') }}"
                               autocomplete="family-name"
                               required
                               class="fastdate-input w-full px-4 py-2.5 rounded-2xl text-sm font-semibold outline-none">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email"
                               class="block text-xs font-semibold text-slate-500 mb-1">
                            Email
                        </label>

                        <input id="email"
                               name="email"
                               type="email"
                               placeholder="you@example.com"
                               value="{{ old('email') }}"
                               autocomplete="email"
                               required
                               class="fastdate-input w-full px-4 py-2.5 rounded-2xl text-sm font-semibold outline-none">
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="date_of_birth"
                               class="block text-xs font-semibold text-slate-500 mb-1">
                            Date of birth
                        </label>

                        <input id="date_of_birth"
                               name="date_of_birth"
                               type="date"
                               value="{{ old('date_of_birth') }}"
                               autocomplete="bday"
                               required
                               class="fastdate-input w-full px-4 py-2.5 rounded-2xl text-sm font-semibold outline-none">
                    </div>

                    <!-- Dating Intentions -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1">
                            Dating Intention
                        </label>

                        <div class="grid grid-cols-3 gap-1.5 text-xs">

                            <label class="fastdate-option cursor-pointer">
                                <input type="radio"
                                       name="intention"
                                       value="casual"
                                       class="peer sr-only"
                                       required
                                       {{ old('intention') === 'casual' ? 'checked' : '' }}>

                                <span class="block py-2 text-center rounded-xl bg-surface-container text-on-surface font-bold border border-transparent transition-all shadow-sm">
                                    ⚡ 3m Date
                                </span>
                            </label>

                            <label class="fastdate-option cursor-pointer">
                                <input type="radio"
                                       name="intention"
                                       value="coffee"
                                       class="peer sr-only"
                                       {{ old('intention') === 'coffee' ? 'checked' : '' }}>

                                <span class="block py-2 text-center rounded-xl bg-surface-container text-on-surface font-bold border border-transparent transition-all shadow-sm">
                                    ☕ Coffee
                                </span>
                            </label>

                            <label class="fastdate-option cursor-pointer">
                                <input type="radio"
                                       name="intention"
                                       value="long_term"
                                       class="peer sr-only"
                                       {{ old('intention') === 'long_term' ? 'checked' : '' }}>

                                <span class="block py-2 text-center rounded-xl bg-surface-container text-on-surface font-bold border border-transparent transition-all shadow-sm">
                                    💍 Long-term
                                </span>
                            </label>

                        </div>
                    </div>

                    <!-- Agreement Checkbox -->
                    <div class="flex items-start gap-2.5 pt-1">

                        <input type="checkbox"
                               id="termsCheck"
                               name="terms"
                               value="1"
                               required
                               class="fastdate-checkbox mt-0.5 rounded h-4 w-4 border-slate-300">

                        <label for="termsCheck"
                               class="text-xs text-slate-500 leading-tight cursor-pointer">
                            I read and agreed to

                            <a href="{{ url('/user-agreement') }}"
                               class="text-on-surface font-bold underline hover:text-primary">
                                User Agreement
                            </a>

                            and

                            <a href="{{ url('/privacy-policy') }}"
                               class="text-on-surface font-bold underline hover:text-primary">
                                privacy policy
                            </a>
                        </label>
                    </div>

                    <!-- Primary Sign Up Button -->
                    <div class="pt-2">
                        <button type="submit"
                                class="fastdate-primary w-full py-4 rounded-2xl font-bold text-sm shadow-md active:scale-[0.98]">
                            Sign Up
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="relative flex py-2 items-center">
                        <div class="flex-grow border-t border-outline-variant"></div>

                        <span class="flex-shrink mx-3 text-xs text-slate-400 uppercase tracking-wider font-bold">
                            Or
                        </span>

                        <div class="flex-grow border-t border-outline-variant"></div>
                    </div>

                    <!-- Social Quick Signups -->
                    <div class="space-y-2">

                        <!-- Google -->
                        <button type="button"
                                class="w-full py-3 px-4 rounded-2xl border border-outline-variant hover:border-secondary bg-white text-slate-700 font-bold text-xs flex items-center justify-center gap-3 transition-colors shadow-sm">

                            <svg class="w-4 h-4" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>

                            Continue with Google
                        </button>

                        <!-- Apple -->
                        <button type="button"
                                class="w-full py-3 px-4 rounded-2xl border border-outline-variant hover:border-secondary bg-white text-slate-900 font-bold text-xs flex items-center justify-center gap-3 transition-colors shadow-sm">

                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.61-.75 1.04-1.8 1.01-2.87-1 .04-2.13.67-2.75 1.41-.54.63-.99 1.68-.89 2.69 1.1.09 2.03-.49 2.63-1.23z"/>
                            </svg>

                            Continue with Apple
                        </button>

                    </div>

                </form>

                <!-- Bottom Login Redirect -->
                <div class="pt-4 text-center">
                    <p class="text-xs text-slate-500">
                        Already have an account?

                        <a href="#"
                           class="text-on-surface font-bold underline hover:text-primary transition-colors">
                            Sign In
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </main>
</body>
</html>
