<div class="pane">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
                <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" class="img-responsive" alt="">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    {{$user->firstname }} {{$user->lastname }} 
                </div>
                <div class="profile-usertitle-job">
                {{$user->job }}
                </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
                <!-- <button type="button" class="btn btn-success btn-sm">دنبال کردن</button> -->
                <!-- <button type="button" class="btn btn-danger">لوپر جدید</button> -->
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
                <ul class="nav">
                    <li>
                        <a href="{{ route('user.show' , ['username' =>$user->name ]) }}">
                        <i class="glyphicon glyphicon-user"></i>
                        پروفایل کاربری </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="glyphicon glyphicon-user"></i>
                        مقالات </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="glyphicon glyphicon-home"></i>
                        ارسال پیام </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                        <i class="glyphicon glyphicon-ok"></i>
                        تمامی مقالات </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                        <i class="glyphicon glyphicon-flag"></i>
                        120 نفر را دنبال کرده </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="glyphicon glyphicon-flag"></i>
                        10 نفر او را دنبال می کنند </a>
                    </li> -->

                </ul>
            </div>
            <!-- END MENU -->

        </div>