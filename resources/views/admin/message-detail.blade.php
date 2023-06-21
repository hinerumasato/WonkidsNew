@extends('admin.layouts.master')

@section('content')
    <div class="row shadow-sm p-3 my-5 bg-body-tertiary rounded">
        <div class="col-lg-2 col-sm-12">
            <img class="rounded-circle" src="{{ $sendUser->avatar }}" alt="" height="150px" width="150px">
        </div>
        <div class="col-lg-8 col-sm-12 d-flex flex-column justify-content-between">
            <div class="wrap">
                <div class="row d-flex align-items-center">
                    <h2 class="col-xl-7 col-lg-12">{{ $message->title }}</h2>
                </div>
                <div class="lh-base fs-6">
                    {!! $message->content !!}
                </div>
            </div>
    
            <div class="col-12">
                <span>{{ $message->created_at->diffForHumans() }}</span>
                @if ($message->answered === 1)
                    <span class="text-success fw-bold">Đã trả lời</span>
                @endif
            </div>
        </div>

        <div class="col-lg-2 col-sm-2">
            <button onclick="showReplyForm();" class="btn reply-btn d-block"><i class="fa-solid fa-reply"></i></button>
            <button onclick="hideReplyForm();" class="btn hide-reply-btn d-none"><i class="fa-regular fa-circle-xmark"></i></button>
        </div>
    </div>
    
    <div class="reply d-none">
        <form action="{{route('admin.messages.send')}}" class="reply_form" method="POST">
            @csrf
            <input type="hidden" name="send_id">
            <input type="hidden" name="receive_id">
            <input type="hidden" name="old_message_id">

            <div class="mb-3">
                <label for="title" class="form-label fs-5 fw-bold">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Title...">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label fs-5 fw-bold">Reply Content</label>
                <textarea name="content" id="content" rows="3"></textarea>
            </div>
            <div class="d-lg-flex d-block justify-content-end">
                <div class="col-lg-1 me-2">
                    <div onclick="hideReplyForm();" class="btn btn-secondary w-100">Cancel</div>                    
                </div>

                <div class="col-lg-1">
                    <button type="submit" class="btn btn-primary w-100">Reply</button>                    
                </div>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const sendId= @json($user->id);
        const receiveId = @json($sendUser->id);
    </script>
    <script src="{{asset('js/message.js')}}"></script>
@endsection
