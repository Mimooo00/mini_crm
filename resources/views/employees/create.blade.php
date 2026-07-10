<x-app-layout>
    <x-slot name="header">
        <h2>Create Employee</h2>
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
                    <span style="color:#1e293b;font-size:16px;font-weight:600;">Employee Information</span>
                </div>
            </div>

            <form action="{{ route('employees.store') }}" method="POST" style="padding:28px;">
                @csrf

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                    <div class="mb-5" style="margin-bottom:0;">
                        <label class="form-label">First Name <span style="color:#dc2626;">*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-input" required placeholder="John">
                        @error('first_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5" style="margin-bottom:0;">
                        <label class="form-label">Last Name <span style="color:#dc2626;">*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-input" required placeholder="Doe">
                        @error('last_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-5" style="margin-top:20px;">
                    <label class="form-label">Company <span style="color:#dc2626;">*</span></label>
                    <select name="company_id" class="form-select" required>
                        <option value="">Select a company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @error('company_id') <p class="form-error">{{ $message }}</p> @enderror
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                    <div class="mb-5" style="margin-bottom:0;">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="john@acme.com">
                        @error('email') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5" style="margin-bottom:0;">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-input" placeholder="+60 12-345 6789">
                        @error('phone') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div style="display:flex;align-items:center;gap:12px;padding-top:20px;border-top:1px solid #f1f5f9;margin-top:24px;">
                    <button type="submit" class="btn-primary" style="padding:10px 28px;">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        Create Employee
                    </button>
                    <a href="{{ route('employees.index') }}" style="color:#64748b;font-size:14px;text-decoration:none;font-weight:500;padding:10px 16px;border-radius:10px;transition:background 0.15s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
