<div class="col-md-10">
  <div class="widget">
    <div class="widget-header"><h4 class="widget-title">HOME > PROFILE > MYCOGS</h4></div>
  </div>
</div>
<div class="col-md-5">
  <div class="widget">
    <div class="widget-body">
      <h4>Avatar</h4>
      <div class="widget-separator"></div>
      <div class="centered">
        <img src="%{ec-admin profile avatar}%" class="sett-ava-50"> 
        <p class="ava-desc">
          <a href="#" class="btn btn-warning btn-block">{SET_IMAGE}</a>
          <a href="#" class="btn btn-danger btn-block">{DEL_IMAGE}</a>
        </p>
      </div>        
    </div>
  </div>
</div>
<div class="col-md-5">
  <div class="widget">
    <div class="widget-body">
      <h4>{PASS_SETTS}</h4>
      <div class="widget-separator"></div>
      <form method="post" id="setpass">
        <label>{U_PASS}</label>
        <input type="password" name="password">
        <p class="help-text">{HELP_TEXT}</p>
        <label>{NEW_PASS}</label>
        <input type="password" name="newspassword">
        <label>{C_NEW_PASS}</label>
        <input type="password" name="confirmpassword">
        <button type="submit" class="btn btn-inverse btn-block">Confirm</button>
      </form>
    </div>
  </div>
</div>