<div class="col-md-2">
  <div class="widget nav-widget">
    <div class="widget-body list-group">
      <a href="/admin"><i class="fa fa-table"></i>{NAVBAR_ITEM_HOME}</a>
      <a href="/admin/settings"><i class="fa fa-cogs"></i>{NAVBAR_ITEM_SETTINGS}</a>
      <a href="/admin/mail"><i class="fa fa-send"></i>{NAVBAR_ITEM_MAIL}</a>
      <a href="#" data-menu="plugins"><i class="fa fa-plus rigth"></i>{NAVBAR_ITEM_PLUGINS}</a>
      <span class="plugins">
        %{ec-admin navbar-left plugins}%
      </span>
      <a href="/admin/news/list"><i class="fa fa-comment"></i>{NAVBAR_ITEM_NEWS}</a>
      <a href="/admin/pages/list" data-menu="pages"><i class="fa fa-bookmark"></i>{NAVBAR_ITEM_PAGES}</a>
      <span class="pages">
        %{ec-admin navbar-left pages}%
      </span>
      <a href="/admin/navigation/list"><i class="fa fa-book"></i>{NAVBAR_ITEM_NAVIGATION}</a>
      <div class="widget-separator"></div>
      <a href="/admin/documentation"><i class="fa fa-archive"></i>{NAVBAR_ITEM_DOCS}</a>
    </div>
  </div>
</div>