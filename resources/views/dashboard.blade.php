<x-app-layout>
    <x-slot name="header">
        <h2>Dashboard</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
                <div class="stat-card">
                    <div class="stat-icon" style="background:#eff6ff;color:#2563eb;">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="stat-label">Total Companies</p>
                        <p class="stat-value">{{ $totalCompanies }}</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background:#ecfdf5;color:#059669;">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="stat-label">Total Employees</p>
                        <p class="stat-value">{{ $totalEmployees }}</p>
                    </div>
                </div>

                <a href="{{ route('companies.create') }}" class="stat-card">
                    <div class="stat-icon" style="background:#fef3c7;color:#d97706;">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <p class="stat-label">Quick Action</p>
                        <p class="stat-action">Add Company</p>
                    </div>
                </a>

                <a href="{{ route('employees.create') }}" class="stat-card">
                    <div class="stat-icon" style="background:#fce7f3;color:#db2777;">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="stat-label">Quick Action</p>
                        <p class="stat-action">Add Employee</p>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card p-6">
                    <div class="flex justify-between items-center mb-4">
                        <p class="card-header">Recent Companies</p>
                        <a href="{{ route('companies.index') }}" class="action-link">View All</a>
                    </div>

                    @if($recentCompanies->isEmpty())
                        <p class="empty-state">No companies yet.</p>
                    @else
                        @foreach($recentCompanies as $company)
                        <div class="recent-item">
                            <div style="display:flex;align-items:center;gap:12px;">
                                @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" class="avatar-img">
                                @else
                                    <div class="avatar" style="background:#eff6ff;color:#2563eb;">
                                        {{ substr($company->name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="item-name">{{ $company->name }}</p>
                                    <p class="item-sub">{{ $company->employees()->count() }} employees</p>
                                </div>
                            </div>
                            <a href="{{ route('companies.show', $company) }}" class="action-link">View</a>
                        </div>
                        @endforeach
                    @endif
                </div>

                <div class="card p-6">
                    <div class="flex justify-between items-center mb-4">
                        <p class="card-header">Recent Employees</p>
                        <a href="{{ route('employees.index') }}" class="action-link">View All</a>
                    </div>

                    @if($recentEmployees->isEmpty())
                        <p class="empty-state">No employees yet.</p>
                    @else
                        @foreach($recentEmployees as $employee)
                        <div class="recent-item">
                            <div style="display:flex;align-items:center;gap:12px;">
                                <div class="avatar" style="background:#ecfdf5;color:#059669;">
                                    {{ substr($employee->first_name, 0, 1) }}{{ substr($employee->last_name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="item-name">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                    <p class="item-sub">{{ $employee->company->name }}</p>
                                </div>
                            </div>
                            <a href="{{ route('employees.show', $employee) }}" class="action-link">View</a>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
