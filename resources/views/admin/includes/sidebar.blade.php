<div class="sidebar sidebar-navigation active">
    <div class="logo_content">
        <a href="{{ route('dashboard') }}" class="logo">
            <div class="logo_name">
                Mini
            </div>
            LMS
            
        </a>
    </div>
    <ul class="nav_list ps-0 scrollbar">
        <li class="category-li">
            <span class="link_names">Dashboard</span>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? ' active-focus' : '' }}">
                <i class="ri-home-4-line"></i>
                <span class="link_names">Dashboard</span>
            </a>
        </li>


        <li class="category-li">
            <span class="link_names">Main</span>
        </li>

        @canany(['course-list', 'course-create', 'course-edit', 'course-delete', 'course-certificate-status'])
            <li>
                <a href="{{ route('courses.index') }}"
                class="{{ in_array(Route::currentRouteName(), ['courses.index', 'courses.create', 'courses.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-git-repository-line"></i>
                    <span class="link_names">Course</span>
                </a>
            </li>
        @endcan

        @canany(['student-list', 'student-create', 'student-edit', 'student-delete'])
            <li>
                <a href="{{ route('students.index') }}"
                class="{{ in_array(Route::currentRouteName(), ['students.index', 'students.create', 'students.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-user-3-line"></i>
                    <span class="link_names">Students</span>
                </a>
            </li>
        @endcan

        @canany(['teacher-list', 'teacher-create', 'teacher-edit', 'teacher-delete'])
            <li>
                <a href="{{ route('teachers.index') }}"
                class="{{ in_array(Route::currentRouteName(), ['teachers.index', 'teachers.create', 'teachers.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-presentation-line"></i>
                    <span class="link_names">Teachers</span>
                </a>
            </li>
        @endcan

        @canany(['enrollment-list', 'enrollment-create', 'enrollment-edit', 'enrollment-delete'])
            <li>
                <a href="{{ route('enrollments.index') }}"
                class="{{ in_array(Route::currentRouteName(), ['enrollments.index', 'enrollments.create', 'enrollments.edit']) ? 'active-focus' : '' }}">
                <i class="ri-arrow-up-line"></i>
                    <span class="link_names">Enrollments</span>
                </a>
            </li>
        @endcan

        @canany(['review-list', 'review-create', 'review-edit', 'review-delete'])
            <li>
                <a href="{{ route('reviews.index') }}"
                class="{{ in_array(Route::currentRouteName(), ['reviews.index', 'reviews.create', 'reviews.edit']) ? 'active-focus' : '' }}">
                <i class="ri-shining-line"></i>
                    <span class="link_names">Reviews</span>
                </a>
            </li>
        @endcan
        
        

        <li class="category-li">
            <span class="link_names">General</span>
        </li>

        @canany(['our-team-list', 'our-team-create', 'our-team-edit', 'our-team-delete'])
            <li>
                <a href="{{ route('our-teams.index') }}"
                    class="{{ in_array(Route::currentRoutename(), ['our-teams.index', 'our-teams.create', 'our-teams.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-group-line"></i>
                    <span class="link_names">Team Member
                    </span>
                </a>
            </li>
        @endcan

        @canany(['contact-list', 'contact-delete'])
            <li>
                <a href="{{ route('message') }}"
                    class="{{ in_array(Route::currentRouteName(), ['message']) ? 'active-focus' : '' }}">
                    <i class="ri-mail-open-line"></i>
                    <span class="link_names">Contact Message</span>
                </a>
            </li>
        @endcan

        @if(Auth::user()->hasRole('superadmin'))
            @canany(['user-list', 'user-create', 'user-edit', 'user-delete', 'role-list', 'role-create', 'role-edit', 'role-delete'])
                <li class="category-li">
                    <span class="link_names">Users</span>
                </li>
            @endcan
            @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
                <li class="drop-item">
                    <a href="{{ route('users.index') }}"
                        class="{{ in_array(Route::currentRouteName(), ['users.index', 'users.create', 'users.edit']) ? 'active-focus' : '' }}">
                        <i class="ri-user-3-line"></i>
                        <span class="link_names">User List</span>
                    </a>
                </li>
            @endcan
            @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
                <li class="drop-item">
                    <a href="{{ route('roles.index') }}"
                        class="{{ in_array(Route::currentRouteName(), ['roles.index', 'roles.create', 'roles.edit']) ? 'active-focus' : '' }}">
                        <i class="ri-shield-user-line"></i>
                        <span class="link_names">Role</span>
                    </a>
                </li>
                <li class="drop-item">
                    <a href="{{ route('assign-roles.index') }}"
                        class="{{ in_array(Route::currentRouteName(), ['assign-roles.index']) ? 'active-focus' : '' }}">
                        <i class="ri-user-settings-line"></i>
                        <span class="link_names">Assign Role</span>
                    </a>
                    <span class="tooltip">Assign Role</span>
                </li>
            @endcan
        @endIf

        

        {{-- @canany(['our-team-list', 'our-team-create', 'our-team-edit', 'our-team-delete', 'department-list', 'department-create', 'department-edit', 'department-delete'])
            <li>
                <a href="#" class="drop-list">
                    <div class="drop">
                        <i class="ri-menu-unfold-fill"></i>
                        <span class="link_names">Our Team</span>
                    </div>
                    <i class="fa-solid fa-angle-down link_names"></i>
                </a>
                <ul>
                    @canany(['department-list', 'department-create', 'department-edit', 'department-delete'])
                        <li class="drop-item">
                            <a href="{{ route('departments') }}"
                                class="{{ in_array(Route::currentRoutename(), ['departments', 'department.create', 'department.edit']) ? 'active-focus' : '' }}">
                                <i class="ri-list-ordered-2"></i>
                                <span class="link_names">Department
                                </span>
                            </a>
                        </li>
                    @endcan
                    @canany(['our-team-list', 'our-team-create', 'our-team-edit', 'our-team-delete'])
                        <li class="drop-item">
                            <a href="{{ route('our-teams') }}"
                                class="{{ in_array(Route::currentRoutename(), ['our-teams', 'our-team.create', 'our-team.edit']) ? 'active-focus' : '' }}">
                                <i class="ri-group-line"></i>
                                <span class="link_names">Team Member
                                </span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan --}}
        

        {{-- @canany(['contact-list', 'contact-delete'])
            <li>
                <a href="{{ route('message') }}"
                    class="{{ in_array(Route::currentRouteName(), ['message']) ? 'active-focus' : '' }}">
                    <i class="ri-mail-open-line"></i>
                    <span class="link_names">Contact Message</span>
                </a>
            </li>
        @endcan 

        
        @canany(['commontype-list', 'commontype-create', 'commontype-edit', 'commontype-delete'])
            <li>
                <a href="{{ route('commontypes') }}"
                    class="{{ in_array(Route::currentRouteName(), ['commontypes', 'commontype.create', 'commontype.edit']) ? ' active-focus' : '' }}">
                    <i class="ri-function-line"></i>
                    <span class="link_names">Common Type</span>
                </a>
            </li>
        @endcan

        @canany(['website-content-list', 'website-content-create', 'website-content-edit', 'website-content-delete'])
            <li>
                <a href="{{ route('website-contents') }}"
                    class="{{ in_array(Route::currentRouteName(), ['website-contents', 'website-content.create', 'website-content.edit']) ? ' active-focus' : '' }}">
                    <i class="ri-pages-line"></i>
                    <span class="link_names">Website Content</span>
                </a>
            </li>
        @endcan


        @canany(['user-list', 'user-create', 'user-edit', 'user-delete', 'role-list', 'role-create', 'role-edit',
            'role-delete'])
            <li class="category-li">
                <span class="link_names">Users</span>
            </li>
        @endcan
        @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
            <li class="drop-item">
                <a href="{{ route('users') }}"
                    class="{{ in_array(Route::currentRouteName(), ['users', 'user.create', 'user.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-user-3-line"></i>
                    <span class="link_names">User List</span>
                </a>
            </li>
        @endcan
        @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
            <li class="drop-item">
                <a href="{{ route('role.index') }}"
                    class="{{ in_array(Route::currentRouteName(), ['role.index', 'role.create', 'role.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-shield-user-line"></i>
                    <span class="link_names">Role</span>
                </a>
            </li>


            <li class="drop-item">
                <a href="{{ route('assignrole.index') }}"
                    class="{{ in_array(Route::currentRouteName(), ['assignrole.index', 'assignrole.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-user-settings-line"></i>
                    <span class="link_names">Assign Role</span>
                </a>
                <span class="tooltip">Assign Role</span>
            </li>
        @endcan --}}
    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                @if (Auth::user()->image)
                    <img id="sidebarImageDB" src="{{ asset('storage/' . Auth::user()->image) }}" alt="img" width="30"
                        height="30" class="rounded-circle">
                @else
                    <i class="ri-user-3-line profile-icon"></i>
                @endif

                <div class="name_job">
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="job">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="d-flex"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="ri-logout-box-r-line" id="log_out"></i>
                </a>
            </form>
        </div>
    </div>
</div>
