<nav class="navbar navbar-light navbar-glass fs--1 font-weight-semi-bold row navbar-top sticky-kit navbar-expand">
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><a class="navbar-brand text-left ml-3" href="index.html">
    <div class="d-flex align-items-center text-primary">
      <div class="d-inline-flex flex-center"><img class="mr-2" src="{{asset('backend/pages/assets/img/illustrations/falcon.png')}}" alt="" width="40" /><span class="text-sans-serif">falcon</span></div>
    </div>
  </a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown1">
    <ul class="navbar-nav align-items-center d-none d-lg-block">
      <li class="nav-item">
        <form class="form-inline search-box">
          <input class="form-control rounded-pill search-input" type="search" placeholder="Search..." aria-label="Search" /><span class="position-absolute fas fa-search text-400 search-box-icon"></span>
        </form>
      </li>
    </ul>
    <ul class="navbar-nav align-items-center ml-auto">
      <li class="nav-item dropdown"><a class="nav-link unread-indicator" id="navbarDropdownNotification" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell fs-4" data-fa-transform="shrink-6 right-4"></span></a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-card" aria-labelledby="navbarDropdownNotification">
          <div class="card card-notification shadow-none" style="max-width: 20rem">
            <div class="card-header">
              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <h6 class="card-header-title mb-0">Notifications</h6>
                </div>
                <div class="col-auto"><a class="card-link font-weight-normal" href="#">Mark all as read</a></div>
              </div>
            </div>
            <div class="list-group list-group-flush font-weight-normal fs--1">
              <div class="list-group-title">NEW</div>
              <div class="list-group-item">
                <a class="notification notification-flush bg-200" href="#!">
                  <div class="notification-avatar">
                    <div class="avatar avatar-2xl mr-3">
                      <img class="rounded-circle" src="{{asset('backend/pages/assets/img/team/1.jpg')}}" alt="" />

                    </div>
                  </div>
                  <div class="notification-body">
                    <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                    <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>Just now</span>

                  </div>
                </a>

              </div>
              <div class="list-group-item">
                <a class="notification notification-flush bg-200" href="#!">
                  <div class="notification-avatar">
                    <div class="avatar avatar-2xl mr-3">
                      <div class="avatar-name rounded-circle"><span>AB</span></div>
                    </div>
                  </div>
                  <div class="notification-body">
                    <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                    <span class="notification-time"><span class="mr-1 fab fa-gratipay text-danger"></span>9hr</span>

                  </div>
                </a>

              </div>
              <div class="list-group-title">EARLIER</div>
              <div class="list-group-item">
                <a class="notification notification-flush" href="#!">
                  <div class="notification-avatar">
                    <div class="avatar avatar-2xl mr-3">
                      <img class="rounded-circle" src="{{asset('backend/pages/assets/img/icons/weather.jpg')}}" alt="" />

                    </div>
                  </div>
                  <div class="notification-body">
                    <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                    <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">🌤️</span>1d</span>

                  </div>
                </a>

              </div>
            </div>
            <div class="card-footer text-center border-top-0"><a class="card-link d-block" href="pages/notifications.html">View all</a></div>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown"><a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-xl">
          <img class="rounded-circle" src="{{asset('backend/pages/assets/img/team/3.jpg')}}" alt="" />

        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
        <div class="bg-white rounded-soft py-2">
          <a class="dropdown-item font-weight-bold text-warning" href="#!"><span class="fas fa-crown mr-1"></span><span>Go Pro</span></a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#!">Set status</a>
          <a class="dropdown-item" href="pages/profile.html">Profile &amp; account</a>
          <a class="dropdown-item" href="#!">Feedback</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="pages/settings.html">Settings</a>
          <a class="dropdown-item" href="authentication/log-out.html">Logout</a>
        </div>
      </div>
    </li>
  </ul>
</div>
</nav>