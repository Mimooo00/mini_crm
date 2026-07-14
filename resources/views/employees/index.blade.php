<x-app-layout>
    <x-slot name="header">
        <h2>Employees</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="card-header">All Employees</p>
                    <a href="{{ route('employees.create') }}" class="btn-primary">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        New Employee
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                <table>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)
                        <tr>
                            <td style="color:#1e293b;font-weight:600;">{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td><span class="company-badge">{{ $employee->company->name }}</span></td>
                            <td>{{ $employee->email ?? '—' }}</td>
                            <td>{{ $employee->phone ?? '—' }}</td>
                            <td>
                                <div style="display:flex;gap:10px;">
                                    <a href="{{ route('employees.show', $employee) }}" class="action-link">View</a>
                                    <a href="{{ route('employees.edit', $employee) }}" class="action-link">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="action-link danger" style="background:none;border:none;cursor:pointer;font-size:13px;font-weight:500;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="empty-state">No employees found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
</x-app-layout>
