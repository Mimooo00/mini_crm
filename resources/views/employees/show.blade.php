<x-app-layout>
    <x-slot name="header">
        <h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 4px 24px rgba(0,0,0,0.06);overflow:hidden;">
            <div style="padding:20px 28px;border-bottom:1px solid #f1f5f9;background:#fafcff;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div style="width:36px;height:36px;background:#ecfdf5;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <svg width="18" height="18" fill="none" stroke="#059669" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span style="color:#1e293b;font-size:16px;font-weight:600;">Employee Details</span>
                </div>
            </div>

            <div style="padding:28px;">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px;">
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">First Name</p>
                        <p style="color:#1e293b;font-size:15px;font-weight:600;">{{ $employee->first_name }}</p>
                    </div>
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Last Name</p>
                        <p style="color:#1e293b;font-size:15px;font-weight:600;">{{ $employee->last_name }}</p>
                    </div>
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Company</p>
                        <span style="display:inline-block;background:#eff6ff;color:#2563eb;padding:4px 12px;border-radius:8px;font-size:13px;font-weight:500;">{{ $employee->company->name }}</span>
                    </div>
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Email</p>
                        <p style="color:#475569;font-size:15px;">{{ $employee->email ?? '—' }}</p>
                    </div>
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Phone</p>
                        <p style="color:#475569;font-size:15px;">{{ $employee->phone ?? '—' }}</p>
                    </div>
                </div>

                <div style="display:flex;align-items:center;gap:10px;padding-top:24px;margin-top:24px;border-top:1px solid #f1f5f9;">
                    <a href="{{ route('employees.edit', $employee) }}" class="btn-primary" style="padding:8px 20px;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit Employee
                    </a>
                    <a href="{{ route('employees.index') }}" style="color:#64748b;font-size:14px;text-decoration:none;font-weight:500;padding:8px 16px;border-radius:8px;transition:background 0.15s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
