<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    if (!empty($title)) {
      echo ($title);
    } ?>

  </title>

  <!-- Summbernote: do dùng bản cũ hơn nên cho load trước -->
  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/styles/styles.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- Fancybox CSS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>

<body>
  <!-- Phần navbar  -->
  <nav class="navbar navbar-expand-lg p-0 mb-2">
    <div class="container-fluid container-fluid-none">
      <div class="row row-none">
        <div class="col-sm-2">
          <!-- Logo  -->
          <div id="nav-logo">

            <a href="index.php" class="text-decoration-none">Askany</a>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="container-fluid nav-edit d-flex">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item icon-active">
                  <a class="nav-link" aria-current="page" href="../public/index.php"><i class="fa fa-home"></i></a>
                  </a>
                </li>
                <!-- Di Chuyển Đến Trang xem thông báo -->
                <li class="nav-item">
                  <a class="nav-link" href="<?php
                  //kiểm tra nếu người dùng chưa đăng nhập thì không cho di chuyển
                  if (!empty($_SESSION['username'])) {
                    echo ('../public/notification.php');

                  }
                  ?>" <?php
                  if (empty($_SESSION['username'])) {
                    echo ('data-bs-toggle="modal" data-bs-target="#sign-in"');

                  }
                  ?>><i class="fa fa-bell-o" aria-hidden="true"></i>
                    </i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php
                  //kiểm tra nếu người dùng chưa đăng nhập thì không cho di chuyển
                  if (!empty($_SESSION['username'])) {
                    echo ('../public/bookmark.php');

                  }
                  ?>" <?php
                  if (empty($_SESSION['username'])) {
                    echo ('data-bs-toggle="modal" data-bs-target="#sign-in"');

                  }
                  ?>>

                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa fa-toggle-off" aria-hidden="true"></i>
                    </i>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa fa-plus-square-o" aria-hidden="true" data-bs-toggle="modal"
                      data-bs-target="
                      <?php //kiểm tra nếu người dùng chưa đăng nhập thì mở modal đăng nhập 
                      if (!empty($_SESSION['username'])) {
                        echo ('#addQuestion');
                      } else {
                        echo ('#sign-in');
                      } ?>"></i>
                  </a>
                </li>
                <!-- Nếu người dùng là admin thì hiện thêm icon chuyển đến trang admin -->
                <?php
                if (!empty($_SESSION['username'])) {
                  $user = (new User())->getUserByUsername($_SESSION['username']);
                }
                if (!empty($user) && $user['role'] == 'admin') {
                  echo ('<li class="nav-item text-end">
                      <a class="nav-link" href="../admin/admin.php">
                      <span class="fa material-symbols-outlined">
                      admin_panel_settings
                      </span>
                      </a>
                    </li>');
                }

                ?>
              </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-1">
          <!-- Sign in, sign up -->
          <?php
          if (isset($_SESSION["username"])) {
            ?>
            <div id="nav-login">
              <img src="../public/avatar/<?php
              if (!empty($_SESSION['avt'])) {
                echo $_SESSION["avt"];
              } else {
                echo ("default.png");
              }
              ?>" style="width: 40px; height: auto; border-radius: 50%" alt="">
              <button type="button" class="btn btn-outline-purple" data-bs-toggle="modal" data-bs-target="">
                <?php
                echo $_SESSION["username"];
                ?>
              </button>
              <button type="button" class="btn btn-outline-blue" data-bs-toggle="modal" data-bs-target="">
                <a href="logout.php" style="text-decoration: none;">Log out</a>
              </button>
            </div>
            <?php
          } else {
            ?>
            <div id="nav-login">
              <button type="button" class="btn btn-outline-purple" data-bs-toggle="modal" data-bs-target="#sign-in">Sign
                in</button>
              <button type="button" class="btn btn-outline-blue" data-bs-toggle="modal" data-bs-target="#sign-up">Sign
                up</button>
            </div>
            <?php
          }


          ?>


        </div>
      </div>
    </div>

  </nav>
  <!-- Modal add question  -->
  <div class="modal fade" id="addQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form action="process/addquestion.php" method="post" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add your question</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <input type="hidden" name="author" id="author" value="<?php
            if (!empty($_SESSION["username"])) {
              echo ($_SESSION["username"]);
            }
            ?>">
            <textarea name="content" id="content" rows="5" placeholder="Type your question"></textarea>
            <label for="imageInput">
              <span class="material-symbols-outlined">
                imagesmode
              </span>

            </label>
            <input type="file" name="images[]" id="imageInput" class="none" accept=".jpg, .png, .jpeg|image/*" multiple>
            <hr>
            <label for="hashtags" class="d-flex align-items-center pb-1">
              <span class="material-symbols-outlined pe-2">sell</span>hashtags
            </label>

            <input type="text" name="hashtags" id="hashtags">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-purple" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-bg-blue">Add question</button>
          </div>
        </div>
      </div>

    </form>
  </div>



  <!-- Modal sign in  -->
  <div class="modal fade" id="sign-in" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body mt-5">
          <!-- <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                       -->
          <div class="d-flex justify-content-center align-items-center">

            <form class="signin-form p-5" method="POST">
              <h3 class="text-purple pb-2 text-center">Askany</h3>

              <div class="mb-3 px-2" id="error" style="color: red;"></div>
              <div class="mb-3 px-2" id="success" style="color: green;"></div>

              <div class="mb-3 px-2">
                <label for="username" class="form-label text-purple">Username</label>
                <input type="text" class="form-control" id="username_login" name="username_login"
                  placeholder="Username">
                <div id="error_username_login" style="color: red;"></div>

              </div>
              <div class="mb-3 px-2">
                <label for="password" class="form-label text-purple">Password</label>
                <input type="password" class="form-control" id="password_login" name="password_login"
                  placeholder="Password">
                <div id="error_password_login" style="color: red;"></div>

              </div>
              <div class="mb-3 px-2">
                <label for="password" class="form-label">Don't have an account? <a href="#" class="text-blue">Sign up
                    now</a></label>
              </div>
              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary btn-bg-purple px-5" id="btn_login">Sign in</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal sign up -->
  <div class="modal fade" id="sign-up" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body ">
          <!-- <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>-->
          <div class="d-flex justify-content-center align-items-center">
            <form class="signin-form p-5 needs-validation" class="my-login-validation" method="POST" novalidate
              enctype="multipart/form-data">
              <h3 class="text-purple pb-2 text-center">Askany</h3>

              <div class="mb-3 px-2" id="error_regis" style="color: red;"></div>
              <div class="mb-3 px-2" id="success_regis" style="color: green;"></div>

              <div class="mb-3 px-2">
                <label for="username" class="form-label text-purple">Username</label>
                <input type="text" class="form-control" id="username_regis" name="username" placeholder="Username"
                  required>
                <!-- <div class="invalid-feedback">
                  Please, Enter your username
                </div> -->
                <div id="error_username_regis" style="color: red;"></div>

              </div>
              <div class="row">
                <div class="col-sm">
                  <div class="mb-3 px-2">
                    <label for="lastname" class="form-label text-purple">Last Name</label>
                    <input type="text" class="form-control" id="lastname_regis" name="lastname" placeholder="last name"
                      required>
                    <div id="error_lastname_regis" style="color: red;"></div>

                  </div>
                </div>
                <div class="col-sm">
                  <div class="mb-3 px-2">
                    <label for="firstname" class="form-label text-purple">First Name</label>
                    <input type="text" class="form-control" id="firstname_regis" name="firstname"
                      placeholder="first name" required>
                    <div id="error_firstname_regis" style="color: red;"></div>
                  </div>
                </div>
              </div>
              <div class="mb-3 px-2">
                <label for="password" class="form-label text-purple">Password</label>
                <input type="password" class="form-control" id="password_regis" name="password" placeholder="Password"
                  required>
                <div id="error_password_regis" style="color: red;"></div>

              </div>
              <div class="mb-3 px-2">
                <label for="retype" class="form-label text-purple">Confirm Your Password</label>
                <input type="password" class="form-control" id="retype_regis" name="retype"
                  placeholder="Confirm your password" required>
                <div id="error_retype_regis" style="color: red;"></div>

              </div>
              <div class="mb-3 px-2">
                <label for="" class="form-label text-purple">Choose Your Avatar</label>
                <input type="file" id="avt_regis" name="avt" class="form-control">
                <div id="error_avt_regis" style="color: red;"></div>

              </div>
              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary btn-bg-blue px-5" id="btn_register">Sign up</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- Phần nội dung -->
  <div class="container-fluid container-fluid-none">
    <div class="row">
      <!-- Phần thanh bên trái  -->
      <div class="col-2-sm leftBar overflow-auto">
        <?php
        if (!empty($slot)) {
          echo ($slot);
        }
        ?>
      </div>

      <!-- Phần nội dung -->
      <div class="col-9-sm midContent overflow-auto" id="homePageContent">
        <?php
        if (!empty($slot2)) {
          echo ($slot2);
        }

        ?>

      </div>
      <!-- Phần footer -->
      <div class="col-1-sm rightBar text-center">
        <!-- This is footer -->
      </div>
    </div>
  </div>


  <script src="script/app.js">
  </script>
  <script src="script/state.js"></script>
  <script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js"
    crossorigin="anonymous"></script>
  <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
  <script type="module">
    import * as bootstrap from 'bootstrap'

    new bootstrap.Popover(document.getElementById('popoverButton'))
  </script>

  <script src="../public/script/jquery-3.2.1.min.js"></script>
  <script src="../public/script/jQuery.js"></script>
  <!-- Summernote -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script type='text/javascript'>
    $('.summernote').summernote({
      placeholder: 'Enter your answer',
      height: 100,

    })
  </script>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script>
    $(document).ready(function () {
      //FANCYBOX
      //https://github.com/fancyapps/fancyBox
      $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none",
        'nextEffect': 'fade',

      });
    });
  </script>

</body>

</html>