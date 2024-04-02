<div class="table-wrapper">
    <table id="postsTable" class="table table-responsive table-borderless table-hover table-success">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('general.title')</th>
                {{-- <th>Thể loại</th> --}}
            </tr>
        </thead>
    </table>
</div>

@push('scripts')
    <script>
        const APP_URL = @json(env('APP_URL'));
    </script>

    <script src="{{asset('js/post-datatable.js')}}?v={{env('STATIC_FILE_VERSION')}}"></script>
@endpush