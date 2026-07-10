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
        * { box-sizing: border-box; }
        body {
            font-family: 'Figtree', 'Inter', system-ui, -apple-system, sans-serif;
            background: #eef2f6;
            min-height: 100vh;
            color: #1e293b;
        }
        .content-wrap { position: relative; z-index: 1; }

        /* ── Navigation ── */
        .nav-bar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }
        .nav-bar a.nav-link { color: #64748b; font-size: 14px; font-weight: 500; padding: 6px 0; border-bottom: 2px solid transparent; transition: all 0.15s; text-decoration: none; }
        .nav-bar a.nav-link:hover { color: #334155; }
        .nav-bar a.nav-link.active { color: #2563eb; border-bottom-color: #2563eb; }
        .nav-bar .user-btn { color: #475569; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 6px 14px; font-size: 13px; font-weight: 500; cursor: pointer; transition: all 0.15s; }
        .nav-bar .user-btn:hover { background: #f1f5f9; color: #1e293b; }
        .dropdown-content { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 12px 40px rgba(0,0,0,0.08); }
        .dropdown-content a { color: #475569; font-size: 13px; padding: 8px 16px; display: block; text-decoration: none; transition: all 0.1s; }
        .dropdown-content a:hover { color: #1e293b; background: #f8fafc; }

        /* ── Page header ── */
        .page-header { background: #ffffff; border-bottom: 1px solid #e2e8f0; padding: 24px 0; }
        .page-header h2 { color: #1e293b; font-size: 20px; font-weight: 700; }
        main { padding-top: 28px; padding-bottom: 48px; }

        /* ── Cards ── */
        .card { background: #f6f9fc; border: 1px solid #e2e8f0; border-radius: 16px; box-shadow: 0 1px 4px rgba(0,0,0,0.04); }
        .card-header { color: #1e293b; font-size: 16px; font-weight: 600; }

        /* ── Tables ── */
        .card table { width: 100%; border-collapse: collapse; }
        .card th { color: #64748b; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; padding: 12px 16px; text-align: left; border-bottom: 2px solid #e2e8f0; background: transparent; }
        .card td { color: #475569; font-size: 14px; padding: 12px 16px; border-bottom: 1px solid #eef2f6; }
        .card tr:last-child td { border-bottom: none; }
        .card tr:hover td { background: rgba(37,99,235,0.03); }
        .card .empty-state { color: #94a3b8; text-align: center; padding: 32px; font-size: 14px; }

        /* ── Buttons ── */
        .btn-primary { display: inline-flex; align-items: center; gap: 6px; padding: 8px 20px; background: #2563eb; color: #fff; border: none; border-radius: 10px; font-size: 13px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.15s; box-shadow: 0 2px 8px rgba(37,99,235,0.15); }
        .btn-primary:hover { background: #1d4ed8; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(37,99,235,0.2); }
        .btn-success { background: #059669; box-shadow: 0 2px 8px rgba(5,150,105,0.15); }
        .btn-success:hover { background: #047857; }
        .btn-warning { background: #d97706; box-shadow: 0 2px 8px rgba(217,119,6,0.15); }
        .btn-danger { background: #dc2626; box-shadow: 0 2px 8px rgba(220,38,38,0.15); }
        .btn-danger:hover { background: #b91c1c; }
        .btn-sm { padding: 6px 14px; font-size: 12px; border-radius: 8px; }

        /* ── Links ── */
        a.action-link { color: #2563eb; text-decoration: none; font-size: 13px; font-weight: 500; transition: color 0.15s; }
        a.action-link:hover { color: #1d4ed8; }
        a.action-link.danger { color: #dc2626; }
        a.action-link.danger:hover { color: #b91c1c; }

        /* ── Alerts ── */
        .alert-success { background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 12px 16px; border-radius: 12px; font-size: 13px; margin-bottom: 16px; }

        /* ── Forms ── */
        .form-label { color: #475569; font-size: 13px; font-weight: 500; margin-bottom: 4px; display: block; }
        .form-input, .form-select { width: 100%; padding: 10px 14px; background: #f8fafc; border: 1px solid #d1d9e6; border-radius: 10px; color: #1e293b; font-size: 14px; outline: none; transition: all 0.15s; }
        .form-input:focus, .form-select:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); background: #ffffff; }
        .form-input::placeholder { color: #94a3b8; }
        .form-select option { background: #ffffff; color: #1e293b; }
        .form-error { color: #dc2626; font-size: 12px; margin-top: 4px; }

        /* ── Stat Cards ── */
        .stat-card { background: #f6f9fc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px; display: flex; align-items: center; gap: 16px; transition: all 0.15s; box-shadow: 0 1px 4px rgba(0,0,0,0.04); text-decoration: none; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.06); border-color: #cbd5e1; }
        .stat-card .stat-icon { width: 48px; height: 48px; border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .stat-card .stat-label { color: #64748b; font-size: 12px; font-weight: 500; }
        .stat-card .stat-value { color: #1e293b; font-size: 24px; font-weight: 700; }
        .stat-card .stat-action { color: #2563eb; font-size: 14px; font-weight: 600; }

        /* ── Recent Items ── */
        .recent-item { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eef2f6; }
        .recent-item:last-child { border-bottom: none; }
        .recent-item .avatar { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; flex-shrink: 0; }
        .recent-item .avatar-img { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; }
        .recent-item .item-name { color: #1e293b; font-size: 14px; font-weight: 500; }
        .recent-item .item-sub { color: #94a3b8; font-size: 12px; }
        .recent-item:hover { background: rgba(37,99,235,0.02); margin: 0 -16px; padding-left: 16px; padding-right: 16px; border-radius: 8px; }

        /* ── Pagination ── */
        .pagination { margin-top: 16px; }
        .pagination nav { display: flex; gap: 4px; }
        .pagination a, .pagination span { padding: 6px 12px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; color: #475569; font-size: 13px; text-decoration: none; transition: all 0.1s; }
        .pagination a:hover { background: #f1f5f9; border-color: #cbd5e1; }
        .pagination span[aria-current="page"] { background: #2563eb; border-color: #2563eb; color: #fff; }

        /* ── Company badge ── */
        .company-badge { background: #eff6ff; color: #2563eb; padding: 2px 10px; border-radius: 6px; font-size: 12px; font-weight: 500; display: inline-block; }

        @media (max-width: 640px) {
            .card th, .card td { padding: 8px 10px; font-size: 12px; }
        }
    </style>
</head>
<body>
    <div class="content-wrap">
        @include('layouts.navigation')

        @isset($header)
            <div class="page-header">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </div>
        @endisset

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
