@php
    use App\Helpers\DateHelper;
@endphp

@extends('admin.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/member.css') }}">
@endsection

@section('content')
    <section class="member_container mt-5">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <div class="">
                <div class="d-flex align-items-center">
                    <div class="member_title">{{ trans('admin.members') }}</div>
                    <div class="member_quantity">{{ count($members) }}</div>
                </div>
            </div>
            <div class="">
                <div class="d-flex justify-content-between member_right">
                    <input type="text" placeholder="{{trans('admin.member.find')}}..." class="menber_find_input">

                    @if ($user->role->name == 'admin')
                        <button class="add_member_btn" data-bs-toggle="modal" data-bs-target="#addMemberModal">{{ trans('admin.member.add-member') }}
                        </button>
                    @endif

                </div>
            </div>
        </div>

        <table class="table mt-3 member_table">
            <thead>
                <tr>
                    <th>{{ trans('admin.member.name') }}</th>
                    <th>{{ trans('admin.member.email') }}</th>
                    <th>{{ trans('admin.member.role') }}</th>
                    <th>{{ trans('admin.member.join-date') }}</th>
                    <th>{{ trans('admin.member.phone') }}</th>
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
                        <td class="role_col" data="{{ $member->role->name }}">{{ $member->role->name }}</td>

                        <td>{{ DateHelper::formatVietNamDate($member->created_at) }}</td>
                        <td class="phone_col" data="{{ $member->phone }}">{{ $member->phone }}</td>

                        <td>
                            <button onclick='inboxTo(@json($member));' class="member_inbox_btn" data-bs-toggle="modal" data-bs-target="#sendMessageModal"><i class="fa-solid fa-envelope"></i></button>
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

        <div class="modal modal-lg fade" id="sendMessageModal" tabindex="-1" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
            <form memberId="" action="{{route('admin.member.send')}}" method="POST" class="sendMessageForm">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sendMessageModalLabel">Send mail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="send_id" value="{{$user->id}}">
                            <div class="mb-3">
                                <label for="toMail" class="form-label">To: </label>
                                <input name="receive_id" type="text" class="form-control" id="toMail" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="messageTitle" class="form-label">Title </label>
                                <input name="title" value="" type="text" class="form-control" id="messageTitle">
                            </div>

                            <textarea name="content" id="" class="w-100">

                            </textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" type="button" class="btn btn-primary send-message-btn">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
            <form action="{{route('admin.member.add')}}" method="POST">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addMemberModalLabel">{{ trans('admin.member.add-member') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputName1" class="form-label">{{ trans('general.name') }}</label>
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                    id="exampleInputName1" aria-describedby="emailHelp" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{ trans('admin.member.add.email-address') }}</label>
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <div id="emailHelp" class="form-text">{{ trans('admin.member.add.email-address-desc') }}</div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ trans('admin.member.add.password') }}</label>
                                <input name="password" value="{{ old('password') }}" type="password" class="form-control"
                                    id="exampleInputPassword1" required>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPhone1" class="form-label">{{ trans('admin.member.add.phone') }}</label>
                                <input name="phone" value="{{ old('phone') }}" type="text" class="form-control"
                                    id="exampleInputPhone1" required>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputRole1" class="form-label">{{ trans('admin.member.add.role') }}</label>
                                <select name="role_id" value="{{ old('role_id') }}"
                                    class="form-select form-select-sm role_select" aria-label=".form-select-sm example">
                                    @foreach ($roles as $role)
                                        <option class="role_option" value="{{ $role->id }}">{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('admin.member.add.close') }}</button>
                            <button type="submit" type="button" class="btn btn-primary">{{ trans('admin.member.add.add') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection

@section('scripts')
    @if ($user->role->name == 'admin')
        <script src="{{ asset('js/member.js') }}"></script>
    @endif
    <script>
        const fail = @json(session('fail'));
        if(fail == 'fail') {
            const btn = document.querySelector('.add_member_btn');
            btn.click();
        }
    </script>

    <script>
        function inboxTo(member) {
            const inboxModal = document.querySelector('#sendMessageModal');
            const sendMessageForm = document.querySelector('.sendMessageForm')
            const toMail = inboxModal.querySelector('#toMail');
            toMail.value = member.email;
            sendMessageForm.setAttribute('memberId', member.id);
        }

        function submitSendMsgForm() {
            const sendMessageForm = document.querySelector('.sendMessageForm');
            const emailField = sendMessageForm.querySelector('#toMail');
            sendMessageForm.onsubmit = e => {
                e.preventDefault();
                emailField.value= sendMessageForm.getAttribute('memberId');
                sendMessageForm.submit();
            }
        
        }
        submitSendMsgForm();
    </script>

    
@endsection
