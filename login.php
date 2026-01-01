<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login RAID SCHOOL</title>
     <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <style>
        body{
            background:#f3f5fb;
        }
        .login-wrapper{
            max-width:420px;
            margin:60px auto;
        }
        .login-box{
            background:#fff;
            padding:25px 30px;
            border-radius:10px;
            box-shadow:0 4px 12px rgba(0,0,0,.08);
        }
        .role-btn{
            margin-bottom:15px;
        }
        .login-title{
            text-align:center;
            margin-bottom:20px;
            font-weight:600;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">
        <div class="login-title">Login SMKS RAID SCHOOL</div>

        <!-- Pilih Role -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#admin" aria-controls="admin" role="tab" data-toggle="tab">Admin</a>
            </li>
            <li role="presentation">
                <a href="#guru" aria-controls="guru" role="tab" data-toggle="tab">Guru / Siswa</a>
            </li>
        </ul>

        <div class="tab-content" style="margin-top:15px;">
            <!-- TAB ADMIN -->
            <div role="tabpanel" class="tab-pane active" id="admin">
                <form method="post" action="proses_login_admin.php">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-success btn-block">Login Admin</button>
                </form>
            </div>

            <!-- TAB GURU / SISWA -->
            <div role="tabpanel" class="tab-pane" id="guru">
                <form method="post" action="proses_login_user.php">
                    <div class="form-group">
                        <label>NIP / NIS</label>
                        <input type="text" name="kode" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary btn-block">Login Guru / Siswa</button>
                </form>
            </div>
        </div>

    </div>
</div>

<script src="bootstrap/bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>