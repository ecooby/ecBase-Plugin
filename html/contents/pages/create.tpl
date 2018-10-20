<div class="col-md-10">
  <div class="widget">
    <div class="widget-header"><h4 class="widget-title">HOME > MAIL > CREATE</h4></div>
  </div>
</div>
<div class="col-md-10">
  <div class="widget">
    <div class="widget-body">
      <h4>{MAIL_CREATE_SUBJECT}</h4>
      <div class="clear"></div>
      <div class="widget-separator"></div>
      <form method="post">
        <div class="row">
          <div class="col-md-7">
            <input type="text" name="cmail" placeholder="{MAIL_CREATE_PLACEHOLDER_NAME}"> 
          </div>
          <div class="col-md-5">
            <input type="text" value="@%{ec-admin domain}%" disabled> 
          </div>
        </div>  
        <textarea placeholder="{MAIL_CREATE_PLACEHOLDER_DESC}" name="cmaildesc"></textarea>

        <button type="submit" class="btn btn-success btn-block">{MAIL_CREATEPROF_BTN}</button>
      </form>
    </div>
  </div>
</div>