@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Your Inbox</h1>
@stop

@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Inbox</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <input type="hidden" class="form-control" id="csrf" value="{{ csrf_token() }}">
                    <div class="input-group-append">
                        {{-- <div class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-controls">
                <!-- Check all button -->
                {{-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button> --}}
                {{-- <div class="btn-group">
                    <button id="deleteBulk" type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div> --}}
                <!-- /.btn-group -->
                <form action="{{ route('message.index') }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button></form>
                <div class="float-right">
                    {{ $messages -> count()}} Messages
                    {{-- <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i
                                class="fas fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i
                                class="fas fa-chevron-right"></i></button>
                    </div> --}}
                    <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                        @foreach ($messages as $inbox)
                        <tr>
                            <td onclick="read('{{ $inbox -> id}}')" class="mailbox-star"><a href="#">
                                    @if ($inbox -> isRead == false)
                                    <span class="right badge badge-danger">New</span>

                                    @else
                                    <i class="fas fa-check-circle text-info"></i>
                                    @endif

                                </a></td>
                            <td onclick="read('{{ $inbox -> id}}')" class="mailbox-name"><a>{{ $inbox -> name}}</a></td>
                            <td onclick="read('{{ $inbox -> id}}')" class="mailbox-subject">
                                <p class="{{ $inbox -> isRead == false ? 'font-weight-bold' : 'font-weight-normal' }}">
                                    {{ $inbox -> subject }}</p> - {{ substr($inbox -> message,0, 100) }}...
                            </td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date">{{ date('dS F Y', strtotime($inbox -> created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer p-0">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                    1-50/200
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i
                                class="fas fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i
                                class="fas fa-chevron-right"></i></button>
                    </div>
                    <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
            </div>
        </div> --}}
    </div>
    <!-- /.card -->
</div>
@stop

@section('js')
<script>
    $('#deleteBulk').click(function (e) { 
        e.preventDefault();
        $('input*[type=checkbox]:checked').val()
            
    });
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
                window.location.href = window.location.origin + '/admin/inbox/' + id
            },
            error: function(data) {
                console.log('error:', data);
            }
        });
   } 
</script>
@stop