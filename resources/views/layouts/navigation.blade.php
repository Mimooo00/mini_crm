<nav x-data="{ open: false }" class="nav-bar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 no-underline">
                    <span style="width:32px;height:32px;background:linear-gradient(135deg,#2563eb,#1d4ed8);border-radius:10px;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 8px rgba(37,99,235,0.2);">
                        <svg width="16" height="16" fill="none" stroke="white" viewBox="0 0 24 24" style="stroke-width:1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </span>
                    <span style="color:#1e293b;font-size:16px;font-weight:700;">{{ config('app.name', 'Mini CRM') }}</span>
                </a>

                <div class="hidden sm:flex items-center gap-6">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('companies.index') }}" class="nav-link {{ request()->routeIs('companies.*') ? 'active' : '' }}">Companies</a>
                    <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">Employees</a>
                </div>
            </div>

            <div class="hidden sm:flex items-center">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="user-btn flex items-center gap-2">
                        <span>{{ Auth::user()->name }}</span>
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 dropdown-content">
                        <a href="{{ route('profile.edit') }}">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex sm:hidden items-center">
                <button @click="open = !open" style="color:#64748b;background:none;border:none;padding:8px;cursor:pointer;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition class="sm:hidden" style="border-top:1px solid #e2e8f0;padding:8px 16px 12px;background:#fff;">
        <div style="display:flex;flex-direction:column;gap:4px;">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" style="padding:10px 0;">Dashboard</a>
            <a href="{{ route('companies.index') }}" class="nav-link {{ request()->routeIs('companies.*') ? 'active' : '' }}" style="padding:10px 0;">Companies</a>
            <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" style="padding:10px 0;">Employees</a>
        </div>
        <div style="margin-top:12px;padding-top:12px;border-top:1px solid #e2e8f0;">
            <div style="color:#64748b;font-size:13px;margin-bottom:8px;">{{ Auth::user()->name }} · {{ Auth::user()->email }}</div>
            <a href="{{ route('profile.edit') }}" class="nav-link" style="padding:8px 0;display:block;">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="nav-link" style="padding:8px 0;display:block;" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
            </form>
        </div>
    </div>
</nav>
