<form method="post" action="#">

  <!-- Modal Structure -->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Change Password</h4>
       <div class="row">
          <div class="input-field col s10 m6">
            <input id="icon_prefix" name="curpass" type="password" class="validate">
            <label for="icon_prefix">Current Password</label>
          </div>
      
        
          <div class="input-field col s10 m6">
            <input id="icon_prefix" name="newpass" type="password" class="validate">
            <label for="icon_prefix">New Password</label>
          
         </div>
          
          <div class="input-field col s10 m6">
            <input id="icon_prefix" name="repass" type="password" class="validate">
            <label for="icon_prefix">Repeat Password</label>
          </div>

      </div>
    </div>
    <div class="modal-footer">
       <button class="btn waves-effect waves-light" value="editpassword" type="Submit" name="passSubmit">Submit
      <i class="material-icons right">send</i>
      </button>
      <a href="#!" class="  indigo lighten-5 modal-action modal-close waves-effect waves-green btn-flat">Cancel <i class="material-icons right">cancel</i></a>
    </div>
  </div>
         

</form