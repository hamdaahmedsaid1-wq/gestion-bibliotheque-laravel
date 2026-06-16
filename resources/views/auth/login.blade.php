<x-guest-layout>
    <style>
        body{
            background: linear-gradient(135deg, #2563eb, #60a5fa);
        }

        .login-title{
            text-align:center;
            font-size:28px;
            font-weight:bold;
            color:#1f2937;
            margin-bottom:8px;
        }

        .login-subtitle{
            text-align:center;
            color:#6b7280;
            margin-bottom:25px;
        }

        .login-card{
            background:white;
            padding:30px;
            border-radius:22px;
            box-shadow:0 12px 30px rgba(0,0,0,0.15);
        }

        .login-button{
            background:#2563eb;
            color:white;
            padding:10px 20px;
            border-radius:10px;
            font-weight:bold;
        }

        .login-button:hover{
            background:#1d4ed8;
        }
    </style>

    <div class="login-card">

        <h1 class="login-title">Bibliothèque</h1>
        <p class="login-subtitle">Connexion administrateur</p>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="'Email'" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="'Mot de passe'" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block mt-4">
                <label>
                    <input type="checkbox" name="remember">
                    <span>Se souvenir de moi</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="login-button">
                    Connexion
                </button>
            </div>
        </form>

    </div>
</x-guest-layout>