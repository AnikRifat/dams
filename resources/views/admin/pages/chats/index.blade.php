@extends('admin.app.app')
@section('main-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Chat</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Skote</a></li>
                                <li class="breadcrumb-item active">Chat</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="d-lg-flex">
                <div class="chat-leftsidebar me-lg-4">
                    <div class="">
                        <div class="py-4 border-bottom">
                            <div class="d-flex">

                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">{{ Auth::user()->name }}</h5>
                                    <p class="text-muted mb-0"><i
                                          class="mdi mdi-circle text-success align-middle me-1"></i> Active</p>
                                </div>


                            </div>
                        </div>

                        <div class="search-box chat-search-box py-4">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>

                        <div class="chat-leftsidebar-nav">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active"
                                      aria-selected="true" role="tab">
                                        <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                        <span class="d-none d-sm-block">Batches</span>
                                    </a>
                                </li>


                            </ul>
                            <div class="tab-content py-4">

                                <div class="tab-pane show active" id="chat" role="tabpanel">

                                    <div>
                                        <h5 class="font-size-14 mb-3">Recent</h5>
                                        <ul class="list-unstyled chat-list" data-simplebar="init"
                                          style="max-height: 410px;">
                                            <div class="simplebar-wrapper" style="margin: 0px;">
                                                <div class="simplebar-height-auto-observer-wrapper">
                                                    <div class="simplebar-height-auto-observer"></div>
                                                </div>
                                                <div class="simplebar-mask">
                                                    <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                                                        <div class="simplebar-content-wrapper"
                                                          style="height: auto; overflow: hidden scroll;">
                                                            <div class="simplebar-content" style="padding: 0px;">
                                                                @foreach ($appointments as $k=>$group)
                                                                <li class="
                                                                @if($activechat == $group->id)

active

                                                                @endif
                                                                ">
                                                                    <a href="{{ route('admin.chat.show',$group->id) }}">
                                                                        <div class="d-flex">
                                                                            <div
                                                                              class="flex-shrink-0 align-self-center me-3">
                                                                                <i
                                                                                  class="mdi mdi-circle text-success font-size-10"></i>
                                                                            </div>
                                                                            <div
                                                                              class="flex-shrink-0 align-self-center me-3">
                                                                                <img
                                                                                  src="{{ asset('') }}uploads/appointments/{{ $group->image }}"
                                                                                  class="rounded-circle avatar-xs"
                                                                                  alt="">
                                                                            </div>

                                                                            <div class="flex-grow-1 overflow-hidden">
                                                                                <h5
                                                                                  class="text-truncate font-size-14 mb-1">
                                                                                    {{ $group->title }}
                                                                                </h5>

                                                                            </div>
                                                                            {{-- <div class="font-size-11">05 min</div> --}}
                                                                        </div>
                                                                    </a>
                                                                </li>

                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: auto; height: 484px;">
                                                </div>
                                            </div>
                                            <div class="simplebar-track simplebar-horizontal"
                                              style="visibility: hidden;">
                                                <div class="simplebar-scrollbar"
                                                  style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                            </div>
                                            <div class="simplebar-track simplebar-vertical"
                                              style="visibility: visible;">
                                                <div class="simplebar-scrollbar"
                                                  style="height: 347px; transform: translate3d(0px, 0px, 0px); display: block;">
                                                </div>
                                            </div>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="w-100 user-chat">
                    <div class="card">
                        @if($chats)
                        <div class="p-4 border-bottom ">
                            <div class="row">
                                <div class="col-md-4 col-9">
                                    <h5 class="font-size-15 mb-1">{{ $appointment->title }}</h5>
                                    <p class="text-muted mb-0"><i
                                          class="mdi mdi-circle text-success align-middle me-1"></i> Active now</p>
                                </div>
                                {{-- <div class="col-md-8 col-3">
                                    <ul class="list-inline user-chat-nav text-end mb-0">
                                        <li class="list-inline-item d-none d-sm-inline-block">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-search-alt-2"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md">
                                                    <form class="p-3">
                                                        <div class="form-group m-0">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                  placeholder="Search ..."
                                                                  aria-label="Recipient's username">

                                                                <button class="btn btn-primary" type="submit"><i
                                                                      class="mdi mdi-magnify"></i></button>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  d-none d-sm-inline-block">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-cog"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">View Profile</a>
                                                    <a class="dropdown-item" href="#">Clear chat</a>
                                                    <a class="dropdown-item" href="#">Muted</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else</a>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div> --}}
                            </div>
                        </div>


                        <div>
                            <div class="chat-conversation p-3">
                                <ul class="list-unstyled mb-0" data-simplebar="init" style="max-height: 486px;">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper"
                                                  style="height: auto; overflow: hidden scroll;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        @foreach ($chats as $chat)
                                                        @php

                                                        // dd($chat);

                                                        $userInfo = App\Models\User::find($chat->sender_id);

                                                        @endphp
                                                        @if($chat->sender_role == 1)
                                                        <li>
                                                            <div class="conversation-list">

                                                                <div class="ctext-wrap">
                                                                    <div class="conversation-name">
                                                                        {{ $userInfo ->name }}
                                                                    </div>
                                                                    <p>
                                                                        {{ $chat->text }}
                                                                    </p>
                                                                    <p class="chat-time mb-0"><i
                                                                          class="bx bx-time-five align-middle me-1"></i>
                                                                        {{ $chat->created_at->format('d M h:i:a') }}
                                                                    </p>
                                                                </div>

                                                            </div>
                                                        </li>
                                                        @elseif($chat->sender_role == 2)
                                                        <li>
                                                            <div class="conversation-list">

                                                                <div class="ctext-wrap  bg-info text-light">
                                                                    <div class="conversation-name text-light">
                                                                        {{ $userInfo ->name }}
                                                                    </div>
                                                                    <p>
                                                                        {{ $chat->text }}
                                                                    </p>
                                                                    <p class="chat-time mb-0"><i
                                                                          class="bx bx-time-five align-middle me-1"></i>
                                                                        {{ $chat->created_at->format('d M h:i:a') }}
                                                                    </p>
                                                                </div>

                                                            </div>
                                                        </li>
                                                        @else
                                                        <li class="right">
                                                            <div class="conversation-list">

                                                                <div class="ctext-wrap  bg-success text-light">
                                                                    <div class="conversation-name text-light">
                                                                        You
                                                                    </div>
                                                                    <p>
                                                                        {{ $chat->text }}
                                                                    </p>
                                                                    <p class="chat-time mb-0"><i
                                                                          class="bx bx-time-five align-middle me-1"></i>
                                                                        {{ $chat->created_at->format('d M h:i:a') }}
                                                                    </p>
                                                                </div>

                                                            </div>
                                                        </li>
                                                        @endif
                                                        @endforeach







                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: auto; height: 645px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar"
                                          style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                        <div class="simplebar-scrollbar"
                                          style="height: 366px; transform: translate3d(0px, 0px, 0px); display: block;">
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <div class="p-3 chat-input-section">
                                <form action="{{ route('chat.save') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                    <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="sender_role" value="{{ Auth::user()->role }}">
                                    <div class="row">
                                        <div class="col">
                                            <div class="position-relative">
                                                <input type="text" name="text" class="form-control chat-input"
                                                  placeholder="Enter Message...">

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit"
                                              class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light"><span
                                                  class="d-none d-sm-inline-block me-2">Send</span> <i
                                                  class="mdi mdi-send"></i></button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        @else
                        <div class="p-4 border-bottom ">
                            <div class="row">
                                <div class="col-md-4 col-9">
                                    <h5 class="font-size-15 mb-1">Plz Select Any Chats</h5>

                                </div>

                            </div>
                        </div>


                        @endif
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

    {{-- </div> --}}
    @endsection