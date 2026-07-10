<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Mini CRM') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Figtree', 'Inter', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            background: #eef2f6;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }
        .auth-card { width: 100%; max-width: 420px; }
        .auth-card .logo-area { text-align: center; margin-bottom: 28px; }
        .auth-card .logo-area .logo-box {
            width: 56px; height: 56px; margin: 0 auto 12px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 16px rgba(37,99,235,0.2);
        }
        .auth-card .logo-area .logo-box svg { width: 28px; height: 28px; color: white; }
        .auth-card .logo-area h1 { color: #1e293b; font-size: 22px; font-weight: 700; }
        .auth-card .form-box {
            background: #f6f9fc;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        }
        .auth-card label { color: #475569; font-size: 13px; font-weight: 500; display: block; margin-bottom: 4px; }
        .auth-card input[type="email"],
        .auth-card input[type="password"],
        .auth-card input[type="text"] {
            width: 100%; padding: 10px 14px;
            background: #f8fafc;
            border: 1px solid #d1d9e6;
            border-radius: 10px;
            color: #1e293b;
            font-size: 14px;
            outline: none;
            transition: all 0.15s;
        }
        .auth-card input:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); background: #ffffff; }
        .auth-card input::placeholder { color: #94a3b8; }
        .auth-card .checkbox-label { color: #64748b; font-size: 13px; display: inline-flex; align-items: center; gap: 8px; cursor: pointer; }
        .auth-card input[type="checkbox"] { width: 16px; height: 16px; border-radius: 4px; accent-color: #2563eb; }
        .auth-card .btn-login {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 10px 24px;
            background: #2563eb;
            color: #fff;
            border: none; border-radius: 10px;
            font-size: 14px; font-weight: 600; cursor: pointer;
            transition: all 0.15s;
            box-shadow: 0 2px 8px rgba(37,99,235,0.15);
        }
        .auth-card .btn-login:hover { background: #1d4ed8; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(37,99,235,0.2); }
        .auth-card a.forgot-link { color: #64748b; font-size: 13px; text-decoration: none; transition: color 0.15s; }
        .auth-card a.forgot-link:hover { color: #2563eb; }
        .auth-card .error-msg { color: #dc2626; font-size: 12px; margin-top: 4px; }
        .auth-card .status-msg {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="logo-area">
            <a href="/" class="logo-box">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </a>
            <h1>{{ config('app.name', 'Mini CRM') }}</h1>
        </div>
        <div class="form-box">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
