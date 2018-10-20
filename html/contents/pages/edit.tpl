<div class="col-md-10">
  <div class="widget">
    <div class="widget-header"><h4 class="widget-title">HOME > PAGES</h4><span><u>%{ec-admin pages date}%</u> | <u>%{ec-admin pages author_name}%</u></span></div>
  </div>
</div>
<div class="col-md-10">
  <div class="widget">
    <div class="widget-body">
      <h4>Edit page</h4>
      <div class="clear"></div>
      <div class="widget-separator"></div>
      <form method="post">
        <label>Title:</label>
        <input type="text" name="page['title']" value="%{ec-admin pages title}%">
        <label>Url:</label>
        <input type="text" name="page['url']" value="%{ec-admin pages url}%" disabled>
        <label>Content:</label>
        <textarea type="text" id="pageContent" name="pageContent">
          %{ec-admin pages content}%
        </textarea>
        <button type="submit" class="btn btn-primary btn-block">{O_CONF}</button>
      </form>
      <!-- <h3>Title: %{ec-admin pages title}%</h3>
      <p><b>url: %{ec-admin pages url}%</b></p><br>
      <p>%{ec-admin pages content}%</p>
      <p><u>%{ec-admin pages date}%</u> | <u>%{ec-admin pages author_name}%</u></p> -->
      
    </div>
  </div>
</div>
<script type="text/javascript">
  window.onload = function() {
    CKEDITOR.replace('pageContent');
  };
</script>