<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/anggota*") ? "menu-open" : "" }} {{ request()->is("admin/articles*") ? "menu-open" : "" }} {{ request()->is("admin/events*") ? "menu-open" : "" }} {{ request()->is("admin/upcoming-prokers*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-angle-double-down">

                            </i>
                            <p>
                                {{ trans('cruds.content.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('department_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departments.index") }}" class="nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.department.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('anggotum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.anggota.index") }}" class="nav-link {{ request()->is("admin/anggota") || request()->is("admin/anggota/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.anggotum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('article_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.articles.index") }}" class="nav-link {{ request()->is("admin/articles") || request()->is("admin/articles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-newspaper">

                                        </i>
                                        <p>
                                            {{ trans('cruds.article.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('event_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.events.index") }}" class="nav-link {{ request()->is("admin/events") || request()->is("admin/events/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.event.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('upcoming_proker_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.upcoming-prokers.index") }}" class="nav-link {{ request()->is("admin/upcoming-prokers") || request()->is("admin/upcoming-prokers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-align-justify">

                                        </i>
                                        <p>
                                            {{ trans('cruds.upcomingProker.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('bank_soal_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/matkuliah*") ? "menu-open" : "" }} {{ request()->is("admin/bank-soal-materi*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-paperclip">

                            </i>
                            <p>
                                {{ trans('cruds.bankSoal.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('matkuliah_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.matkuliah.index") }}" class="nav-link {{ request()->is("admin/matkuliah") || request()->is("admin/matkuliah/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-atlas">

                                        </i>
                                        <p>
                                            {{ trans('cruds.matkuliah.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('bank_soal_materi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.bank-soal-materi.index") }}" class="nav-link {{ request()->is("admin/bank-soal-materi") || request()->is("admin/bank-soal-materi/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.bankSoalMateri.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                {{-- Temporary Pendaftaran Staff Muda daftar list --}}
                @can('pendaftaran_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/pendaftaran-staff-muda*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-paperclip">

                            </i>
                            <p>
                                {{ trans('cruds.bankSoal.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('pendaftaran_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pendaftaran-staff-muda.index") }}" class="nav-link {{ request()->is("admin/pendaftaran-staff-muda") || request()->is("admin/pendaftaran-staff-muda/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-atlas">

                                        </i>
                                        <p>
                                            Pendaftaran Staff Muda 2021
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                {{-- Temporary Pendaftaran Staff Muda daftar list 2021 --}}
                @can('misc_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/event-registrations*") ? "menu-open" : "" }} {{ request()->is("admin/event-fields*") ? "menu-open" : "" }} {{ request()->is("admin/event-field-responses*") ? "menu-open" : "" }} {{ request()->is("admin/event-field-choices*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-align-center">

                            </i>
                            <p>
                                {{ trans('cruds.misc.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('event_registration_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.event-registrations.index") }}" class="nav-link {{ request()->is("admin/event-registrations") || request()->is("admin/event-registrations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.eventRegistration.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('event_field_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.event-fields.index") }}" class="nav-link {{ request()->is("admin/event-fields") || request()->is("admin/event-fields/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-500px">

                                        </i>
                                        <p>
                                            {{ trans('cruds.eventField.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('event_field_response_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.event-field-responses.index") }}" class="nav-link {{ request()->is("admin/event-field-responses") || request()->is("admin/event-field-responses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.eventFieldResponse.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('event_field_choice_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.event-field-choices.index") }}" class="nav-link {{ request()->is("admin/event-field-choices") || request()->is("admin/event-field-choices/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-500px">

                                        </i>
                                        <p>
                                            {{ trans('cruds.eventFieldChoice.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>