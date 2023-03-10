<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'Admins | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">
        <div class="card-body">
            <h4 class="card-title">Pending Seller Requests</h4>
            <p class="card-description">
                Total requests: <code> {{ count($users) }} </code>
            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                PK
                            </th>
                            <th>
                                User
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Joining Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="py-1">
                                <img src="{{ $user->avatar }}" alt="users image" />
                            </td>
                            <td>
                                <a href="{{ route('admin.user.edit', $user->id) }}">{{ $user->name }}</a>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @if($user->status == 'nor')
                                <label class="badge badge-info">Normal</label>
                                @elseif($user->status == 'ver')
                                <label class="badge badge-success">Verified</label>
                                @elseif($user->status == 'ban')
                                <label class="badge badge-danger">Banned</label>
                                @elseif($user->status == 'pen')
                                <label class="badge badge-warning">pending req.</label>
                                @endif
                            </td>
                            <td>
                                {{ $user->created_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin.master>