@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
<h1>Your Inbox</h1>
@stop --}}

@section('content')
<div class="container">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Read Mail</h3>

            <div class="card-tools">
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i
                        class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i
                        class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <h3>{{ $message -> subject }}</h3>
                <h6>From: {{ $message -> email }}
                    <span class="mailbox-read-time float-right">{{ $message -> created_at }}</span></h6>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                    <form action="{{ route('message.destroy', $message -> id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body"
                            title="Delete"><i class="far fa-trash-alt"></i></button>
                    </form>
                    {{--  --}}
                    {{-- <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body"
                        title="Reply">
                        <i class="fas fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body"
                        title="Forward">
                        <i class="fas fa-share"></i></button> --}}
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                    <i class="fas fa-print"></i></button>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                {{ $message -> message }}
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer bg-white">
            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <li>
                    <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i>
                            Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                            <span>1,245 KB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i
                                    class="fas fa-cloud-download-alt"></i></a>
                        </span>
                    </div>
                </li>
                <li>
                    <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App
                            Description.docx</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                            <span>1,245 KB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i
                                    class="fas fa-cloud-download-alt"></i></a>
                        </span>
                    </div>
                </li>
                <li>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png"
                            alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                            <span>2.67 MB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i
                                    class="fas fa-cloud-download-alt"></i></a>
                        </span>
                    </div>
                </li>
                <li>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png"
                            alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                            <span>1.9 MB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i
                                    class="fas fa-cloud-download-alt"></i></a>
                        </span>
                    </div>
                </li>
            </ul>
        </div> --}}
        <!-- /.card-footer -->
        {{-- <div class="card-footer">
            <div class="float-right">
                <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
            </div>
            <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
            <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
        </div> --}}
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>
@stop

@section('js')
<script>
    const read = (id) => {
       $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('#csrf').val()
            }
        });
        $.ajax({
            type: "POST",
               url: '/admin/inbox',
            data: {
                id:id,
                isRead: true,
            },
            success: function(data) {
                console.log(data)
            },
            error: function(data) {
                console.log('error:', data);
            }
        });
   } 
</script>
@stop