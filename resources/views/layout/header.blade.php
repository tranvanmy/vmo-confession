<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="homepage">VMO-Confession</a>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>

                    <a href="introduct">Giới thiệu</a>
                </li>
                <li>
                    <a href="contact">Liên hệ</a>

                </li>
                @role('admin')
                <li>
                    <a href="admin/post/danhsachchuaduyet">Admin</a>
                </li>
                @endrole
            </ul>

            <form class="navbar-form navbar-left" role="search" action="search" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="keyword" class="form-control" placeholder="Search">
                </div>
                <div class="form-group">

                    <select class="form-control" name="category" style="color: blu">
                        <option value="0" selected>Tất cả thể loại</option>
                        @foreach($category as $tl)

                            <option value={{ $tl->id }}>{{ $tl->title }}</option>

                        @endforeach

                    </select>
                </div>
                <button type="submit" class="btn btn-default">Tìm kiếm</button>
            </form>

            <ul class="nav navbar-nav pull-right">
                @if(Auth::check())
                    <li>

                        <a href="nguoidung">

                            <span class="glyphicon glyphicon-user"></span>
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li>
                        <a href="dangxuat">Đăng xuất</a>
                    </li>
                @else
                    <li>
                        <a href="register">Đăng ký</a>
                    </li>
                    <li>
                        <a href="dangnhap">Đăng nhập</a>
                    </li>
                @endif



            </ul>
        </div>



        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
