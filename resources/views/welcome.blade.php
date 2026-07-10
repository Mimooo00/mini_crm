<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Mini CRM') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Figtree', 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            background: #eef2f6;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }
        .card {
            background: #f6f9fc;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 60px;
            text-align: center;
            max-width: 520px;
            width: 100%;
            box-shadow: 0 4px 24px rgba(0,0,0,0.04);
        }
        .logo-box {
            width: 72px; height: 72px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 24px;
            box-shadow: 0 8px 24px rgba(37,99,235,0.2);
        }
        .logo-box svg { width: 36px; height: 36px; color: white; }
        h1 { color: #1e293b; font-size: 28px; font-weight: 700; margin-bottom: 8px; }
        p.tagline { color: #64748b; font-size: 15px; margin-bottom: 36px; line-height: 1.6; }
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 40px;
            background: #2563eb;
            color: #fff;
            border: none; border-radius: 12px;
            font-size: 15px; font-weight: 600;
            text-decoration: none;
            transition: all 0.15s;
            box-shadow: 0 4px 16px rgba(37,99,235,0.15);
        }
        .btn-primary:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(37,99,235,0.2); }
        .features {
            display: grid; grid-template-columns: 1fr 1fr; gap: 12px;
            margin-top: 32px; padding-top: 32px;
            border-top: 1px solid #e2e8f0;
        }
        .feature {
            padding: 16px 12px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .feature svg { width: 20px; height: 20px; color: #2563eb; margin-bottom: 6px; }
        .feature span { display: block; color: #475569; font-size: 12px; font-weight: 600; }
        .feature small { display: block; color: #94a3b8; font-size: 10px; margin-top: 2px; }
        .footer { margin-top: 24px; color: #94a3b8; font-size: 12px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo-box">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
        </div>

        <h1>{{ config('app.name', 'Mini CRM') }}</h1>
        <p class="tagline">Manage your companies and employees<br>in one simple dashboard.</p>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-primary">
                    Go to Dashboard
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            @else
                <a href="{{ route('login') }}" class="btn-primary">
                    Sign In
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            @endauth
        @endif

        <div class="features">
            <div class="feature">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <span>Companies</span>
                <small>Manage & track</small>
            </div>
            <div class="feature">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span>Employees</span>
                <small>Assign & organize</small>
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name', 'Mini CRM') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
