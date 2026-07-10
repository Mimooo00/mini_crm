<x-app-layout>
    <x-slot name="header">
        <h2>Create Company</h2>
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
                    <span style="color:#1e293b;font-size:16px;font-weight:600;">Company Information</span>
                </div>
            </div>

            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data" style="padding:28px;">
                @csrf

                <div class="mb-5">
                    <label class="form-label">Company Name <span style="color:#dc2626;">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-input" required placeholder="e.g. Acme Corporation">
                    @error('name') <p class="form-error">{{ $message }}</p> @enderror
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                    <div class="mb-5" style="margin-bottom:0;">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="contact@acme.com">
                        @error('email') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5" style="margin-bottom:0;">
                        <label class="form-label">Website</label>
                        <input type="url" name="website" value="{{ old('website') }}" class="form-input" placeholder="https://acme.com">
                        @error('website') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-5" style="margin-top:20px;">
                    <label class="form-label">Company Logo</label>
                    <div style="margin-top:6px;border:2px dashed #d1d9e6;border-radius:12px;padding:24px;text-align:center;background:#fafcff;cursor:pointer;transition:all 0.15s;" onclick="document.getElementById('logo-input').click()" onmouseover="this.style.borderColor='#2563eb';this.style.background='#eff6ff'" onmouseout="this.style.borderColor='#d1d9e6';this.style.background='#fafcff'">
                        <svg width="32" height="32" fill="none" stroke="#94a3b8" viewBox="0 0 24 24" stroke-width="1.5" style="margin:0 auto 8px;display:block;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                        </svg>
                        <p style="color:#64748b;font-size:13px;font-weight:500;margin-bottom:2px;">Upload logo</p>
                        <p style="color:#94a3b8;font-size:11px;">PNG or JPG, min 100×100px</p>
                        <input id="logo-input" type="file" name="logo" accept="image/png,image/jpg,image/jpeg" style="display:none;" onchange="this.closest('div').querySelector('p:first-of-type').textContent = this.files[0]?.name || 'Upload logo'; this.closest('div').querySelector('p:last-of-type').textContent = this.files[0] ? (this.files[0].size/1024).toFixed(1)+' KB' : 'PNG or JPG, min 100×100px'">
                    </div>
                    @error('logo') <p class="form-error" style="margin-top:6px;">{{ $message }}</p> @enderror
                </div>

                <div style="display:flex;align-items:center;gap:12px;padding-top:20px;border-top:1px solid #f1f5f9;margin-top:24px;">
                    <button type="submit" class="btn-primary" style="padding:10px 28px;">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        Create Company
                    </button>
                    <a href="{{ route('companies.index') }}" style="color:#64748b;font-size:14px;text-decoration:none;font-weight:500;padding:10px 16px;border-radius:10px;transition:background 0.15s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
