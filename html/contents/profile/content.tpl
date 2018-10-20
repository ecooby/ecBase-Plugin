<div class="modal fade bd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="SendMailToAdmin" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="SendMailToAdmin">{O_SEND_TITLE} %{ec-admin profile login}%</h5>
        </div>
        <form method="post">
          <div class="modal-body">
              <div class="form-group">
                <label for="mailto" class="col-form-label">{O_SEND_TO}:</label>
                <input type="text" class="form-control" id="mailto" name="mailto" disabled value="%{ec-admin profile email}%">
              </div>
              <div class="subj">
                <label for="recipient-name" class="col-form-label">{O_SEND_SUBJ}:</label>
                <input type="text" class="form-control" id="subj" name="subject">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">{O_SEND_SEE_MESS}:</label>
                <textarea class="form-control" id="message-text" name="message"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <div class="clear"></div>
            <button type="submit" class="btn btn-success btn-block">{O_SEND}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="col-md-10">
  <div class="widget">
    <div class="widget-header"><h4 class="widget-title">{O_PROFILE} - %{ec-admin profile login}%</h4><span>{O_ONLINE}: %{ec-admin profile online}%</span></div>
  </div>
</div>
<div class="col-md-3">
  <div class="centered" width="100%">
    <img src="%{ec-admin profile avatar}%" class="sett-ava-100">
    <div class="sendmail">
      <a href="#" class="btn btn-inverse btn-block" data-toggle="modal" data-target=".bd-modal-lg">{O_SEND_MESS}</a>
    </div>
  </div> 
</div>
<div class="col-md-7">
  <div class="widget">
    <div class="widget-body profile">
      <span class="name">%{ec-admin profile login}%</span>
      <p class="group">Group: <span class="admin">%{ec-admin profile group}%</span></p>
      <div class="widget-separator"></div>
      <table>
        <tbody>
          <tr>
            <td>ID:</td>
            <td>%{ec-admin profile id}%</td>
          </tr>
          <tr>
            <td>{O_NAME}:</td>
            <td>%{ec-admin profile lastname}% %{ec-admin profile firstname}%</td>
          </tr>
          <tr>
            <td>{O_EMAIL}:</td>
            <td>%{ec-admin profile email}%</td>
          </tr>
          <tr>
            <td>{O_BIRTHD}:</td>
            <td>%{ec-admin profile birthdate}%</td>
          </tr>
          <tr>
            <td>Registration date:</td>
            <td>%{ec-admin profile regdate}%</td>
          </tr>
        </tbody>
      </table> 
    </div>
  </div>
</div>