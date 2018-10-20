<div class="col-md-10">
  <div class="widget">
    <div class="widget-header"><h4 class="widget-title">SETTINGS</h4></div>
  </div>
</div>
<div class="col-md-10">
  <div class="widget">
    <div class="widget-body">
      <h4>{WEBSITE_SETTS}</h4>
      <div class="widget-separator"></div>
      <form method="post" id="setpass">
        <label>{PROJ_NAME}</label>
        <input type="text" name="project" value="enCoo" disabled>
        <label>{SITE_TAGS}</label>
        <input type="text" name="webtags" value="encoo, enginecooby, cooby, engine, blog, myblog" disabled>
        <label>{SITE_LANG}</label>
        <select name="language[]">
          <option value="defaul">En</option>
          <option value="defaul">Ru</option>
          <option value="defaul">Ua</option>
          <option value="defaul">Pl</option>
        </select>
        <label>{SITE_CATEG}</label>
        <select name="webcateg[]" disabled>
          <option value="defaul">Blog</option>
          <option value="defaul">Forum</option>
          <option value="defaul">Biography</option>
          <option value="defaul">Web shop</option>
        </select>
        <label>{SITE_TPL}</label>
        <select name="tpl[]">
          <option value="defaul">default</option>
          <option value="defaul">default</option>
          <option value="defaul">default</option>
          <option value="defaul">default</option>
        </select>
        <label>{SITE_HOME}</label>
        <input type="text" name="homePage" value="main" disabled>
        <label>{SITE_LIC}</label>
        <input type="text" name="license" value="000-000-001" disabled>
        <label>{SITE_DOMAIN}</label>
        <input type="text" name="domain" value="encoo.ru" disabled>
        <button type="submit" class="btn btn-inverse btn-block">{O_CONF}</button>
      </form>
    </div>
  </div>
</div>