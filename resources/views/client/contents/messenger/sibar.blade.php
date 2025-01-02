<div class="tyn-aside tyn-aside-base">
    <div class="tyn-aside-head">
        <div class="tyn-aside-head-text">
            <h3 class="tyn-aside-title">Chats</h3>
        </div><!-- .tyn-aside-head-text -->
        <div class="tyn-aside-head-tools">
            <ul class="link-group gap gx-3">
                <li class="dropdown">
                    <button class="link" data-bs-toggle="modal" data-bs-target="#newChat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus" viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg><!-- plus -->
                        <span>New</span>
                    </button>
                </li><!-- li -->
                <li class="dropdown">
                    <button class="link dropdown-toggle" data-bs-toggle="dropdown" data-bs-offset="0,10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-filter" viewBox="0 0 16 16">
                            <path
                                d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg><!-- filter -->
                        <span>Filter</span>
                    </button>
                </li><!-- li -->
            </ul><!-- .link-group -->
        </div><!-- .tyn-aside-head-tools -->
    </div><!-- .tyn-aside-head -->
    <div class="tyn-aside-body" data-simplebar>
        <div class="tyn-aside-search">
            <div class="form-group tyn-pill">
                <div class="form-control-wrap">
                    <div class="form-control-icon start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg><!-- search -->
                    </div>
                    <input type="text" class="form-control form-control-solid" id="search"
                        placeholder="Tìm kiếm người dùng">
                </div>
            </div>
        </div><!-- .tyn-aside-search -->
        <div class="tab-content">
            <div class="tab-pane show active" id="all-chats" tabindex="0" role="tabpanel">
                <ul class="tyn-aside-list">
                    @if ($chatUsers->isEmpty())
                        <li class="tyn-aside-item js-toggle-main active">
                            <div class="tyn-media-group">
                                <div class="tyn-media-col">
                                    <h6 class="name">Chưa có tin nhắn nào.</h6>
                                </div>
                            </div>
                        </li>
                    @else
                        @foreach ($chatUsers as $chatUser)
                            <a href="{{ route('messages', $chatUser['user']->username) }}">
                                <li class="tyn-aside-item js-navigate 
                                       @if ($chatUser['user']->username === request()->route('username')) active @endif
                                       @if ($chatUser['last_message_read'] == 0 && $chatUser['user']->id !== Auth::id()) unread @endif"> 
                                    <div class="tyn-media-group">
                                        <div class="tyn-media tyn-size-lg">
                                            @if ($chatUser['user']->image == null)
                                                <img src="{{ asset('assetsClient/images/profile/Profile.jpg') }}"
                                                    alt="DP">
                                            @else
                                                <img src="{{ asset($chatUser['user']->image) }}" alt="">
                                            @endif
                                        </div>
                                        <div class="tyn-media-col">
                                            <div class="tyn-media-row">
                                                <h6 class="name">{{ $chatUser['user']->username }}</h6>
                                                {{-- <div class="indicator varified">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg><!-- check-circle-fill -->
                                                </div> --}}
                                                @if ($chatUser['unread_count'] > 0) 
                                                    <div class="ms-auto">
                                                        <span class="badge rounded text-warning bg-warning-subtle"> {{ $chatUser['unread_count'] }}</span> 
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="tyn-media-row has-dot-sap">
                                                @if (preg_match('/\.(jpg|jpeg|png|gif)$/i', Str::limit($chatUser['last_message'], 30, '...')))
                                                    {{-- <img src="{{ asset($message->message) }}" alt="Image" style="max-width: 200px; border-radius: 8px;"> --}}
                                                    <p class="content">
                                                        Đã gửi 1 ảnh
                                                    </p>
                                                    <span
                                                        class="meta">{{ $chatUser['last_message_time']->diffForHumans() }}</span>
                                                @else
                                                    <p class="content">
                                                        {{ Str::limit($chatUser['last_message'], 30, '...') }}
                                                    </p>
                                                    <span
                                                        class="meta">{{ $chatUser['last_message_time']->diffForHumans() }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </a>
                        @endforeach
                    @endif
                </ul><!-- .tyn-aside-list -->
            </div><!-- .tab-pane -->
        </div><!-- .tab-content -->
    </div><!-- .tyn-aside-body -->
</div><!-- .tyn-aside -->
