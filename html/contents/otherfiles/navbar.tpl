<div class="navbar-wrapper">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="/">EnCoo Admin</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="/admin">{NAVBAR_ITEM_HOME}</a></li>
          <li><a href="/admin/cmd">{NAVBAR_ITEM_CONSOLE}</a></li>
          <li><a href="/admin/mail">{NAVBAR_ITEM_MAIL}</a></li>
          <li><a href="/admin/plugins/list">{NAVBAR_ITEM_PLUGINS}</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="user dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="%{NAVBAR PROFILE IMG}%" alt=""></a>
            <ul class="dropdown-menu">
              <li><a href="/admin/profile/%{NAVBAR PROFILE ID}%">{O_PROFILE} (%{NAVBAR PROFILE NAME}%)</a></li>
              <li><a href="/admin/mycogs">{NAVBAR_ITEM_MYCOGS}</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/admin/logout">{O_LOGOUT}</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>