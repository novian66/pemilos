@extends('layouts.theme.master')
@section('title')
    Request APi
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Role</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($api as $user)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(./static/avatars/010m.jpg)"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $user->user->name }}</div>
                                                        <div class="text-muted">
                                                            {{ $user->user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Title">
                                                <div>Request Open Api Siballu</div>
                                                <div class="text-muted">Status <strong
                                                        class="{{ $user->status == 'disable' ? 'text-danger' : 'text-success' }}">{{ $user->status }}</strong></div>
                                            </td>
                                            <td class="text-muted" data-label="Role">
                                                {{ $user->user->getRoleNames()[0]}}
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('kpu.api.view', $user->id)}}" class="btn">
                                                        View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
