<x-app-layout>
    <x-slot name="header">
        <h2>Companies</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="card-header">All Companies</p>
                    <a href="{{ route('companies.create') }}" class="btn-primary">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        New Company
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                <table>
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($companies as $company)
                        <tr>
                            <td>
                                @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" style="width:36px;height:36px;border-radius:8px;object-fit:cover;">
                                @else
                                    <span style="color:#cbd5e1;font-size:12px;">—</span>
                                @endif
                            </td>
                            <td style="font-weight:600;color:#1e293b;">{{ $company->name }}</td>
                            <td>{{ $company->email ?? '—' }}</td>
                            <td>{{ $company->website ?? '—' }}</td>
                            <td>
                                <div style="display:flex;gap:10px;">
                                    <a href="{{ route('companies.show', $company) }}" class="action-link">View</a>
                                    <a href="{{ route('companies.edit', $company) }}" class="action-link">Edit</a>
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="action-link danger" style="background:none;border:none;cursor:pointer;font-size:13px;font-weight:500;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="empty-state">No companies found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
</x-app-layout>
