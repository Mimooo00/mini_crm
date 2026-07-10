<x-app-layout>
    <x-slot name="header">
        <h2>{{ $company->name }}</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 4px 24px rgba(0,0,0,0.06);overflow:hidden;">
            <div style="padding:20px 28px;border-bottom:1px solid #f1f5f9;background:#fafcff;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div style="width:36px;height:36px;background:#eff6ff;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <svg width="18" height="18" fill="none" stroke="#2563eb" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <span style="color:#1e293b;font-size:16px;font-weight:600;">Company Details</span>
                </div>
            </div>

            <div style="padding:28px;">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px;">
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Company Name</p>
                        <p style="color:#1e293b;font-size:15px;font-weight:600;">{{ $company->name }}</p>
                    </div>
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Email</p>
                        <p style="color:#475569;font-size:15px;">{{ $company->email ?? '—' }}</p>
                    </div>
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Website</p>
                        <p style="color:#475569;font-size:15px;">{!! $company->website ? '<a href="' . $company->website . '" target="_blank" style="color:#2563eb;text-decoration:none;">' . $company->website . '</a>' : '—' !!}</p>
                    </div>
                    <div>
                        <p style="color:#64748b;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px;">Logo</p>
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" style="width:64px;height:64px;border-radius:12px;object-fit:cover;border:1px solid #e2e8f0;">
                        @else
                            <div style="width:64px;height:64px;border-radius:12px;background:#f8fafc;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;">
                                <span style="color:#cbd5e1;font-size:20px;font-weight:600;">{{ substr($company->name, 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div style="display:flex;align-items:center;gap:10px;padding-top:24px;margin-top:24px;border-top:1px solid #f1f5f9;">
                    <a href="{{ route('companies.edit', $company) }}" class="btn-primary" style="padding:8px 20px;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit Company
                    </a>
                    <a href="{{ route('companies.index') }}" style="color:#64748b;font-size:14px;text-decoration:none;font-weight:500;padding:8px 16px;border-radius:8px;transition:background 0.15s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
