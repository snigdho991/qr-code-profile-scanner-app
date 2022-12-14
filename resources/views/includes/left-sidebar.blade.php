<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Dashboard Stuff</li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>
                @if(Auth::user()->hasRole('Administrator'))

                    <li class="menu-title" key="t-apps">QR Code Tools</li>
                        <li>
                            <a href="{{ route('qrcode.unused') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">Active Codes</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('qrcode.used') }}" class="waves-effect">
                                <i class="bx bx-play-circle"></i>
                                <span key="t-calendar">Used Codes</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('qrcode.generate') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Add QR Code</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">User Tools</li>
                        
                        <li>
                            <a href="{{ route('all.users.profile') }}" class="waves-effect">
                                <i class="bx bx-user-circle"></i>
                                <span key="t-calendar">All Users/Profiles</span>
                            </a>
                        </li>


                    <li class="menu-title" key="t-apps">Social Link Tools</li>
                        
                        <li>
                            <a href="{{ route('social.index') }}" class="waves-effect">
                                <i class="bx bx-play-circle"></i>
                                <span key="t-calendar">All Social Links</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('social.create') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Add Social Link</span>
                            </a>
                        </li>
                @else
                    <li class="menu-title" key="t-apps">Profile Tools</li>
                        
                        <li>
                            <a href="{{ route('edit.profile') }}" class="waves-effect">
                                <i class="bx bxs-user-detail"></i>
                                <span key="t-calendar">Edit Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/user/profile') }}" class="waves-effect">
                                <i class="bx bx-news"></i>
                                <span key="t-calendar">Manage Security Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('profile.mode') }}" class="waves-effect">
                                <i class="bx bx-target-lock"></i>
                                <span key="t-calendar">Select Profile Mode</span>
                            </a>
                        </li>


                    <li class="menu-title" key="t-apps">Social Link Tools</li>
                        
                        <li>
                            <a href="{{ route('social.media.links') }}" class="waves-effect">
                                <i class="bx bx-select-multiple"></i>
                                <span key="t-calendar">Manage Social Links</span>
                            </a>
                        </li>
                @endif

                {{-- @if(Auth::user()->role == 'Chief Administrator')
                    <li class="menu-title" key="t-apps">CEO Tools</li>

                        <li>
                            <a href="{{ route('master-administrator.index') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">Master Administrator List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('master-administrator.create') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Add Master Administrator</span>
                            </a>
                        </li>

                @else
                    <li class="menu-title" key="t-apps">Transaction Tools</li>
                    
                    @if(Auth::user()->hasRole('Client'))
                        <li>
                            <a href="{{ route('transaction.getstarted') }}" class="waves-effect">
                                <i class="bx bxs-info-circle"></i>
                                <span key="t-calendar">Get Started</span>
                            </a>
                        </li>
                    @endif
                        
                        <li>
                            <a href="{{ route('transaction.pending') }}" class="waves-effect">
                                <i class="bx bx-play-circle"></i>
                                <span key="t-calendar">Pending</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('transaction.accepted') }}" class="waves-effect">
                                <i class="bx bx-check-shield"></i>
                                <span key="t-calendar">Accepted</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('transaction.declined') }}" class="waves-effect">
                                <i class="bx bx-calendar-x"></i>
                                <span key="t-calendar">Declined</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">History Stuffs</li>
                        <li>
                            <a href="{{ route('report.this.week') }}" class="waves-effect">
                                <i class="mdi mdi-calendar-weekend"></i>
                                <span key="t-calendar">This Week</span>
                            </a>
                        </li>
                    
                        <li>
                            <a href="{{ route('report.this.month') }}" class="waves-effect">
                                <i class="mdi mdi-clock-start"></i>
                                <span key="t-calendar">This Month</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('report.this.year') }}" class="waves-effect">
                                <i class="mdi mdi-table-clock"></i>
                                <span key="t-calendar">This Year</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('report.advanced.search') }}" class="waves-effect">
                                <i class="bx bx-aperture"></i>
                                <span key="t-calendar">Advanced Search</span>
                            </a>
                        </li>

                @endif --}}

            </ul>
            
        </div>
        <!-- Sidebar -->
    </div>
    
</div>