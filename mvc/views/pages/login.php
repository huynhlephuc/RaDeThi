<center>
    <div class="middle">
        <div id="login">

            <form action="/hotrorade/Login/Logged/page=1" method="POST">
                <?php
                if (isset($data["result"])) {
                    if ($data["result"] == true) {
                    } else { ?>
                        <h4 style="color: whitesmoke;"><?php echo ("Đăng nhập thất bại");?></h4>
                        
                        
                        <?php
                    }
                }

                ?>
                <fieldset class="clearfix">

                    <p><span class="fa fa-user"></span><input type="text" Placeholder="Username" required name="username"></p> <!-- JS because of IE support; better: placeholder="Username" -->
                    <p><span class="fa fa-lock"></span><input type="password" Placeholder="Password" required name="password"></p> <!-- JS because of IE support; better: placeholder="Password" -->

                    <div>
                        <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="/hotrorade/Login/Register">Don't have an account?</a></span>

                        <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="LOGIN" name="login"></span>
                    </div>

                </fieldset>
                <div class="clearfix"></div>
            </form>

            <div class="clearfix"></div>

        </div> <!-- end login -->
        <div class="logo">Welcome!!!

            <div class="clearfix"></div>
        </div>

    </div>
</center>