@include('admin_page.includes_admin.head')

@include('admin_page.includes_admin.styles')

@stack('style')

@yield('styles')

</head>

<body>

    @include('admin_page.includes_admin.navigation')

    @include('admin_page.includes_admin.flash-message')

    @yield('content')

    @include('admin_page.includes_admin.footer')

    </div>
    <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
    </div>
    <!-- END Page Wrapper -->

    <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
    <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
    <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> Paramètres</h2>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                    <fieldset>
                        <legend>Photo de profil</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Photo</label>
                            <div class="col-md-8">
                                @if (Auth::user()->image == null)
                                <img class="img-fluid" style="width: 50px; height:40px; border-radius : 50%;" src="/../assets/img/no-profile-pic-icon-0.jpg" alt="">
                                @else
                                <img class="img-fluid" style="width: 50px; height:40px; border-radius : 50%;" src="{{ Storage::url(Auth::user()->image) }}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <form action="" method="post" enctype="multipart/form-data">
                                <label class="col-md-4 control-label">Modifier</label>
                                <div class="col-md-8">
                                    <div class="form-group mb-3 col-md-6">
                                        <input class="form-control" name="file" type="file" id="formFile">
                                    </div>
                                    <div class="form-group mb-3 col-md-2">
                                        <button type="submit" class="" style="border-color: transparent; background-color:transparent;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </fieldset>
                    <fieldset>
                        <form action="" method="post">
                            <legend>Informations personnelles</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Username</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">Admin</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                <div class="col-md-8">
                                    <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user-settings-notifications">Email
                                    Notifications</label>
                                <div class="col-md-8">
                                    <label class="switch switch-primary">
                                        <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                    <fieldset>
                        <legend>Password Update</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New
                                Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
                <!-- END Modal Body -->
            </div>
        </div>
    </div>
    <!-- END User Settings -->

    @include('admin_page.includes_admin.scripts')

    @stack('scripts')

</body>

</html>