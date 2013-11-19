var login=' <div class="container"> \
        <ul class="nav nav-pills"> \
            <li class="active"> \
                <a href="https://github.com/vidali/Vidali">Get involved</a> \
            </li> \
            <li> \
                <a href="http://www.onvidali.com/blog">Blog</a> \
            </li> \
            <li> \
                <a href="https://github.com/vidali/Vidali/wiki">Wiki</a> \
            </li> \
            <li> \
                <a href="http://www.twitter.com/vidalisn">@Vidalisn</a> \
            </li> \
        </ul> \
        <div class="row"> \
            <div class="col-xs-12 col-md-6"> \
                <div style="text-align: center; color: #fff"> \
                    <img class="image" src="img/vidali-icon.png" alt="placeholder image" height="200" width="200"> \
                     <h2>Vidali</h2> \
                    <p>Vidali is an open-source social network. You can share and meet people with your sames hobbies. \
                    	Keep your data safe, you are the only owner of your personal life!</p> \
                </div> \
            </div> \
            <div class="col-xs-12 col-md-6" style="color: #fff;"> \
                <h2>Login</h2> \
                <form id="login-form" class="form-horizontal" method="post" autocomplete="on"> \
                    <div class="form-group"> \
                        <label for="email" class="col-lg-2 control-label">Email</label> \
                        <div class="col-lg-10"> \
                            <input id="email" name="email" type="email" class="form-control input-lg" placeholder="Email" autofocus="autofocus" required> \
                        </div> \
                    </div> \
                    <div class="form-group"> \
                        <label for="password" class="col-lg-2 control-label">Password</label> \
                        <div class="col-lg-10"> \
                            <input id="password" name="password" type="password" class="form-control input-lg" placeholder="password" required> \
                        </div> \
                    </div> \
                    <div class="form-group"> \
                        <div class="col-lg-offset-2 col-lg-10"> \
                            <div class="btn-group pull-left" data-toggle="buttons"> \
                                <label class="btn btn-primary"> \
                                    <input type="checkbox" id="remember" name="remember"> Remember me \
                                </label> \
                            </div> \
                            <button href="#" type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#myModal"> Forgoten password? \
                        </div> \
                    </div> \
                    <div class="form-group"> \
                        <div class="col-lg-offset-2 col-lg-10"> \
                            <button href="#" type="button" class="login btn btn-success btn-lg btn-block">Login</button> \
                        </div> \
                    </div> \
                </form> \
                <a href="#" type="button" class="disabled btn btn-primary btn-lg btn-block">Register</a><br> \
            </div> \
        </div> \
    </div> \
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> \
      <div class="modal-dialog"> \
        <div class="modal-content"> \
          <div class="modal-header"> \
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> \
            <h4 class="modal-title" id="myModalLabel">Recover Password</h4> \
          </div> \
          <div class="modal-body"> \
            <form class="form-horizontal" role="form"> \
              <div class="form-group"> \
                <label for="inputEmail3" class="col-sm-2 control-label">Put your email</label> \
                <div class="col-sm-10"> \
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email"> \
                </div> \
              </div> \
            </form> \
          </div> \
          <div class="modal-footer"> \
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> \
            <button type="button" class="forgot btn btn-primary">Recover</button> \
          </div> \
        </div><!-- /.modal-content --> \
      </div><!-- /.modal-dialog --> \
    </div><!-- /.modal -->
    <div class="modal fade" id="myModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> \
      <div class="modal-dialog"> \
        <div class="modal-content"> \
          <div class="modal-header"> \
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> \
            <h4 class="modal-title" id="myModalLabel">Register</h4> \
          </div> \
          <div class="modal-body"> \
            <form class="form-horizontal" role="form"> \
              <div class="form-group"> \
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label> \
                <div class="col-sm-10"> \
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Name"> \
                </div> \
              </div> \
              <div class="form-group"> \
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label> \
                <div class="col-sm-10"> \
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email"> \
                </div> \
              </div> \
            </form> \
          </div> \
          <div class="modal-footer"> \
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> \
            <button type="button" class="forgot btn btn-primary">Recover</button> \
          </div> \
        </div><!-- /.modal-content --> \
      </div><!-- /.modal-dialog --> \
    </div><!-- /.modal -->';