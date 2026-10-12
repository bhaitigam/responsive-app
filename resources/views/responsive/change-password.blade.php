
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#ffffff">
    <title>Change Password - FastDate.in</title>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #b80049;
            --primary-light: #e2165f;
            --surface: #fcf9f8;
            --text: #1b1c1c;
            --muted: #8f6f73;
            --border: #e4bdc2;
        }

        * {
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
            min-height: 100vh;
            min-height: 100dvh;
            background: #fff;
            color: var(--text);
            font-family: "Plus Jakarta Sans", sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        button, input {
            font: inherit;
        }

        .page-wrapper {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 560px;
            min-height: 100vh;
            min-height: 100dvh;
            margin: 0 auto;
            padding:
                max(18px, env(safe-area-inset-top))
                22px
                max(22px, env(safe-area-inset-bottom));
            background: #fff;
        }

        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 44px;
        }

        .back-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border: 1px solid #f0dce1;
            border-radius: 14px;
            background: #fff;
            color: var(--text);
            text-decoration: none;
            transition: background .2s;
        }

        .back-button:active {
            background: #fff0f4;
        }

        .brand {
            color: var(--primary);
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand span {
            color: var(--text);
        }

        .main-content {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding-top: clamp(32px, 7vh, 64px);
        }

        .icon-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 62px;
            height: 62px;
            margin-bottom: 25px;
            border-radius: 20px;
            background: #fff0f4;
            color: var(--primary);
        }

        .eyebrow {
            margin: 0 0 9px;
            color: var(--primary);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            color: #171717;
            font-size: clamp(28px, 7vw, 36px);
            font-weight: 800;
            letter-spacing: -1.2px;
            line-height: 1.2;
        }

        .subtitle {
            max-width: 400px;
            margin: 13px 0 30px;
            color: #777078;
            font-size: 14px;
            line-height: 1.8;
        }

        .form-group {
            margin-bottom: 23px;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            color: #282328;
            font-size: 13px;
            font-weight: 800;
        }

        .password-field {
            position: relative;
        }

        .form-input {
            display: block;
            width: 100%;
            height: 56px;
            padding: 0 65px 0 16px;
            border: 1.5px solid var(--border);
            border-radius: 15px;
            outline: none;
            background: #fff;
            color: var(--text);
            font-size: 14px;
            font-weight: 500;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-input::placeholder {
            color: #b49da1;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgb(184 0 73 / 8%);
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            padding: 8px 0 8px 8px;
            border: 0;
            background: transparent;
            color: var(--primary);
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
        }

        .strength-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin: 12px 0 8px;
            color: var(--muted);
            font-size: 11px;
        }

        #strengthText {
            color: var(--primary);
            font-weight: 800;
        }

        .strength-bars {
            display: flex;
            gap: 5px;
        }

        .strength-bar {
            height: 4px;
            flex: 1;
            border-radius: 10px;
            background: #eee4e6;
            transition: background .2s;
        }

        .strength-bar.active {
            background: var(--primary-light);
        }

        .hint {
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .match-message {
            margin: 9px 0 0;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.6;
        }

        .primary-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 56px;
            margin-top: 7px;
            padding: 15px 18px;
            border: 0;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: opacity .2s, transform .15s;
        }

        .primary-btn:active {
            transform: scale(.99);
        }

        .primary-btn:focus-visible {
            outline: 3px solid #ffd9de;
            outline-offset: 3px;
        }

        .alert {
            margin-bottom: 22px;
            padding: 13px 15px;
            border-radius: 13px;
            font-size: 12px;
            line-height: 1.7;
        }

        .alert-error {
            background: #fff0f0;
            color: #b42318;
        }

        .alert-success {
            background: #effaf2;
            color: #217a3c;
        }

        .bottom-area {
            padding-top: 28px;
            text-align: center;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 8px 12px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .back-link:active {
            color: var(--primary);
        }

        .security-note {
            margin: 18px 0 0;
            color: #a49a9e;
            font-size: 10px;
            line-height: 1.8;
        }

        @media (max-width: 360px) {
            .page-wrapper {
                padding-right: 17px;
                padding-left: 17px;
            }

            .main-content {
                padding-top: 28px;
            }

            .icon-circle {
                width: 54px;
                height: 54px;
                margin-bottom: 20px;
            }

            h1 {
                font-size: 27px;
            }

            .subtitle {
                margin-bottom: 25px;
            }

            .form-input {
                height: 53px;
            }
        }

        @media (max-height: 700px) {
            .main-content {
                padding-top: 25px;
            }

            .icon-circle {
                width: 52px;
                height: 52px;
                margin-bottom: 17px;
            }

            .subtitle {
                margin-bottom: 21px;
            }

            .form-group {
                margin-bottom: 18px;
            }

            .bottom-area {
                padding-top: 18px;
            }

            .security-note {
                margin-top: 10px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                transition: none !important;
            }
        }
    </style>
</head>

<body>
    <main class="page-wrapper">

        <header class="top-bar">
            <a href="{{ url('/login') }}"
               class="back-button"
               aria-label="Back to login">
                <svg width="20" height="20" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor"
                     stroke-width="2.2" stroke-linecap="round"
                     stroke-linejoin="round" aria-hidden="true">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </a>

            <div class="brand">FastDate<span>.in</span></div>
        </header>

        <section class="main-content">
            <div class="icon-circle">
                <svg width="31" height="31" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round"
                     stroke-linejoin="round" aria-hidden="true">
                    <rect x="4" y="10" width="16" height="11" rx="2"/>
                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                    <path d="M12 14v3"/>
                </svg>
            </div>

            <p class="eyebrow">Account security</p>

            <h1>Create new password</h1>

            <p class="subtitle">
                Choose a strong password to keep your FastDate account secure.
            </p>

            @if ($errors->any())
                <div class="alert alert-error" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success" role="status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST"
                  action="{{ url('/change-password') }}"
                  id="passwordForm">
                @csrf

                <div class="form-group">
                    <label for="password" class="form-label">
                        New password
                    </label>

                    <div class="password-field">
                        <input
                            class="form-input"
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Enter new password"
                            minlength="8"
                            autocomplete="new-password"
                            required>

                        <button class="toggle-password"
                                type="button"
                                data-target="password"
                                aria-label="Show password">
                            Show
                        </button>
                    </div>

                    <div class="strength-title">
                        <span>Password strength</span>
                        <strong id="strengthText">Not entered</strong>
                    </div>

                    <div class="strength-bars" aria-hidden="true">
                        <span class="strength-bar"></span>
                        <span class="strength-bar"></span>
                        <span class="strength-bar"></span>
                        <span class="strength-bar"></span>
                    </div>

                    <p class="hint">
                        Use at least 8 characters with a mix of uppercase,
                        lowercase, numbers, and symbols.
                    </p>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        Confirm new password
                    </label>

                    <div class="password-field">
                        <input
                            class="form-input"
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Re-enter new password"
                            minlength="8"
                            autocomplete="new-password"
                            required>

                        <button class="toggle-password"
                                type="button"
                                data-target="password_confirmation"
                                aria-label="Show confirm password">
                            Show
                        </button>
                    </div>

                    <p class="match-message"
                       id="matchMessage"
                       aria-live="polite"></p>
                </div>

                <button type="submit" class="primary-btn">
                    Update password
                </button>
            </form>
        </section>

        <div class="bottom-area">
            <a href="{{ url('/login') }}" class="back-link">
                ← Back to login
            </a>

            <p class="security-note">
                Your password is encrypted and kept secure.<br>
                Never share your password with anyone.
            </p>
        </div>
    </main>

    <script>
        const password = document.getElementById('password');
        const confirmation = document.getElementById('password_confirmation');
        const strengthBars = [...document.querySelectorAll('.strength-bar')];
        const strengthText = document.getElementById('strengthText');
        const matchMessage = document.getElementById('matchMessage');
        const passwordForm = document.getElementById('passwordForm');

        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', () => {
                const field = document.getElementById(button.dataset.target);
                const showing = field.type === 'text';

                field.type = showing ? 'password' : 'text';
                button.textContent = showing ? 'Show' : 'Hide';
                button.setAttribute(
                    'aria-label',
                    `${showing ? 'Show' : 'Hide'} ${field.id === 'password' ? 'password' : 'confirm password'}`
                );
            });
        });

        function updateStrength() {
            const value = password.value;
            let score = 0;

            if (value.length >= 8) score++;
            if (/[a-z]/.test(value) && /[A-Z]/.test(value)) score++;
            if (/\d/.test(value)) score++;
            if (/[^A-Za-z0-9]/.test(value)) score++;

            strengthBars.forEach((bar, index) => {
                bar.classList.toggle('active', index < score);
            });

            const labels = ['Not entered', 'Weak', 'Fair', 'Good', 'Strong'];
            strengthText.textContent = value ? labels[score] : labels[0];

            updateMatch();
        }

        function updateMatch() {
            if (!confirmation.value) {
                matchMessage.textContent = '';
                return;
            }

            const matches = password.value === confirmation.value;

            matchMessage.textContent = matches
                ? 'Passwords match.'
                : 'Passwords do not match.';

            matchMessage.style.color = matches ? '#217a3c' : '#b42318';
        }

        password.addEventListener('input', updateStrength);
        confirmation.addEventListener('input', updateMatch);

        passwordForm.addEventListener('submit', event => {
            if (password.value !== confirmation.value) {
                event.preventDefault();

                matchMessage.textContent =
                    'Please make sure both passwords match.';
                matchMessage.style.color = '#b42318';

                confirmation.focus();
            }
        });
    </script>
</body>
</html>
