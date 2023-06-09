@php
    use App\Helpers\DateHelper;
@endphp

@extends('admin.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/member.css') }}">
@endsection

@section('content')
    <section class="member_container mt-5">
        <div class="d-flex justify-content-between">
            <div class="">
                <div class="d-flex align-items-center">
                    <div class="member_title">Members</div>
                    <div class="member_quantity">1609</div>
                </div>
            </div>
            <div class="">
                <div class="d-flex justify-content-between member_right">
                    <input type="text" placeholder="Find..." class="menber_find_input">
                    <button class="add_member_btn">Add Member</button>

                </div>
            </div>
        </div>

        <table class="table mt-3 member_table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Join Date</th>
                    <th>Phone</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td class="name_col d-flex align-items-center" data="{{ $member->name }}">
                            <img src="{{ $member->avatar }}" alt="" class="member_avatar">
                            {{ $member->name }}
                        </td>
                        <td class="email_col" data="{{ $member->email }}">{{ $member->email }}</td>
                        <td class="role_col" data="{{ $member->role }}">{{ $member->role }}</td>

                        <td>{{ DateHelper::formatVietNamDate($member->created_at) }}</td>
                        <td class="phone_col" data="{{ $member->phone }}">{{ $member->phone }}</td>

                        <td>
                            <button class="member_inbox_btn"><i class="fa-solid fa-envelope"></i></button>
                        </td>
                        <td>
                            <div class="member_button_group">
                                <div class="member_save_btn"><i class="fa-solid fa-check"></i></div>
                                <div class="member_cancel_btn"><i class="fa-solid fa-xmark"></i></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/member.js') }}"></script>
@endsection
