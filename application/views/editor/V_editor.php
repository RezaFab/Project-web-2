<?php if(empty($this->session->pelanggan_id)):
  $user_id = $_SESSION['admin_id'];
else:
  $user_id = $_SESSION['pelanggan_id'];
endif ?>

<!DOCTYPE html>
<html lang="en" ng-app="kitchensink">

<head>
    <meta charset="UTF-8">
    <title>Editor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/editor/css/vendor/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/editor/css/vendor/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/editor/css/main.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/editor/css/master.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/editor/css/prism.css') ?>">
    <script src="<?= base_url('assets/editor/lib/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/editor/js/paster.js') ?>"></script>
    <script src="<?= base_url('assets/editor/lib/fabric.js') ?>"></script>
    <script src="<?= base_url('assets/editor/js/master.js') ?>"></script>
    <script src="<?= base_url('assets/editor/lib/prism.js') ?>"></script>
    <script src="<?= base_url('assets/editor/js/fileSaver.js') ?>"></script>
    <script src="<?= base_url('assets/editor/js/toBlob.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Plaster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
</head>

<body id="app-container" class="menu-default show-spinner">
<div id="bd-wrapper" ng-controller="CanvasControls">
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>
        </div>


        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <?php if($_GET['level'] == '2' || $_GET['level'] == 'c'): ?>
                  <a class="btn btn-sm btn-outline-primary mr-2 d-md-inline-block mb-2" type="button" class="btn btn-info"  id="modal_lihat" class="modal_lihat"  data-toggle="modal" data-target="#lihat" >&nbsp;KIRIM DESIGN&nbsp;</a>
                <?php endif ?>
                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>
                  
            </div>

            
            
        
        </div>
    </nav>
    <input type="hidden" value="<?= $user_id ?>" id="id_user">
                <input type="hidden" value="<?= $width ?>" id="width">
                <input type="hidden" value="<?= $height ?>" id="height">
                <input type="hidden" value="<?= $category ?>" id="category">
                <input type="hidden" value="<?= $design_id ?>" id="design_id">
                <input type="hidden" value="<?= $design_image ?>" id="design_image">
                <input type="hidden" value="<?= $this->input->get('level') ?>" id="level">
                <input type="hidden" value="<?= $this->input->get('id') ?>" id="id_transaksi">
    <div class="sidebar">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                <li>
                        <a href="#file">
                            <i class="fa fa-file"></i>
                            <span>File</span>
                        </a>
                    </li>
                    <li>
                        <a href="#upload">
                            <i class="fa fa-upload"></i>
                            <span>Your Image</span>
                        </a>
                    </li>
                    <li>
                        <a href="#image">
                            <i class="fa fa-image"></i> Image
                        </a>
                    </li>
                    <li>
                        <a href="#shapes">
                            <i class="fa fa-shapes"></i> Shapes
                        </a>
                    </li>
                    <li>
                        <a href="#text">
                            <i class="fa fa-font"></i> Text
                        </a>
                    </li>
                    <li>
                        <a href="#pencil">
                            <i class="fa fa-pencil-alt"></i> Pencil
                        </a>
                    </li>
                    <li class="active">
                        <a href="#property">
                            <i class="fa fa-layer-group"></i> Property
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
            <ul style="margin-right:20px;" class="list-unstyled" data-link="file">
                    <li>
                        <label>Nama Design</label>
                        <input style="border-radius: 0px;" class="form-control name_file" type="text" value="<?= $nama ?>" name="name_file">
                    </li>
                    <li>
                    <button style="width: 100%;border-radius: 0px;" type="button" class="btn btn-info save" ng-click="saveJSON()">Save</button>
                    </li>
                    <?php
                    if(empty($_SESSION['admin_nama'])) {
                    $author = $_SESSION['pelanggan_nama'];
                    }else{
                      $author = $_SESSION['admin_nama'];
                    }
                    ?>
                    <li>Author : <?= $author ?></li>
                    <li style="text-align:center;"><span class="saved"></span></li>
                    <li><hr></li>
                    <li>
                    <button style="width: 100%;" class="btn btn-primary" id="export">Export to image</button>
                    </li>
                </ul>
                <ul style="margin:10px;" class="list-unstyled" data-link="upload">
                <form id="addimage" action="" method="post" enctype="multipart/form-data">
                <li style="margin-right:30px;">
                <input type="file" name="image" class="form-control">
                </li>
                <li style="margin-right:30px;">
                <input type="submit" name="submit" value="Upload" class="form-control btn btn-primary">
                </li>
                </form>
                <div id="pesan"></div>
                <br>
                <div class="gallery" id="gallery_image"></div>
                </ul>

                <ul class="list-unstyled" data-link="image">
                    <div style="margin:10px;">
                    <div class="gallery" id="gallery"></div>
                    <br>
                    <button style="width: 100%;" class="btn btn-primary" id="more">More</button>
                    </div>
                </ul>
                <ul class="list-unstyled" data-link="shapes">
                <div style="margin:10px;">
                <div class="row">
                <div class="col-sm-5" style="margin-bottom: 20px;"><a type="button" class="btn rect" ng-click="addRect()"><img style="width: 50px;" src="<?= base_url('assets/editor/shapes/rectangle.png') ?>"></a></div>
                <div class="col-sm-5" style="margin-bottom: 20px;"><a type="button" class="btn circle" ng-click="addCircle()"><img style="width: 50px;" src="<?= base_url('assets/editor/shapes/circle.png') ?>"></a></div>
                <div class="col-sm-5" style="margin-bottom: 20px;"><a type="button" class="btn triangle" ng-click="addTriangle()"><img style="width: 50px;" src="<?= base_url('assets/editor/shapes/triangle.png') ?>"></a></div>
                <div class="col-sm-5" style="margin-bottom: 20px;"><a type="button" class="btn line" ng-click="addLine()"><img style="width: 50px;" src="<?= base_url('assets/editor/shapes/line.png') ?>"></a></div>
                </div>
                </div>
                </ul>
                <ul style="margin-right:20px;" class="list-unstyled" data-link="text">
                    <li>Text</li>
                    <li>
                    <button class="btn" ng-click="addTextbox()">Add textbox</button></li>
                    <li>
                    Character
                    </li>
                    <li><hr></li>
                    <div id="text-wrapper" ng-show="getText()">
                    <li><textarea class="form-control" bind-value-to="text" rows="3" columns="80"></textarea></li>
                    <li><label for="font-family" style="display:inline-block">Font family:</label>
            <select id="font-family" class="btn-object-action form-control" bind-value-to="fontFamily">
              <option value="arial">Arial</option>
              <option value="helvetica" selected>Helvetica</option>
              <option value="myriad pro">Myriad Pro</option>
              <option value="delicious">Delicious</option>
              <option value="verdana">Verdana</option>
              <option value="georgia">Georgia</option>
              <option value="courier">Courier</option>
              <option value="comic sans ms">Comic Sans MS</option>
              <option value="impact">Impact</option>
              <option value="monaco">Monaco</option>
              <option value="optima">Optima</option>
              <option value="hoefler text">Hoefler Text</option>
              <option value="plaster">Plaster</option>
              <option value="engagement">Engagement</option>
            </select></li>
            <li><label for="text-align" style="display:inline-block">Text align:</label>
            <select id="text-align" class="btn-object-action form-control" bind-value-to="textAlign">
              <option>Left</option>
              <option>Center</option>
              <option>Right</option>
              <option>Justify</option>
              <option>Justify-left</option>
              <option>Justify-right</option>
              <option>Justify-center</option>
            </select></li>
            <li>
              <label for="text-lines-bg-color">Background text color:</label>
              <input type="color" value="" id="text-lines-bg-color" size="10" class="btn-object-action form-control"
                bind-value-to="textBgColor">
            </li>
            <li><label for="text-font-size">Font size:</label>
              <input type="range" value="" min="1" max="120" step="1" id="text-font-size" class="btn-object-action form-control"
                bind-value-to="fontSize"></li>
                <li><label for="text-line-height">Line height:</label>
              <input type="range" value="" min="0" max="10" step="0.1" id="text-line-height" class="btn-object-action form-control"
                bind-value-to="lineHeight"></li>
                <li><label for="text-char-spacing">Char spacing:</label>
              <input type="range" value="" min="-200" max="800" step="10" id="text-char-spacing" class="btn-object-action form-control" bind-value-to="charSpacing"></li>
              <li><button type="button" class="btn btn-object-action"
              ng-click="toggleBold()"
              ng-class="{'btn-inverse': isBold()}">
              <b>B</b>
            </button>
            <button type="button" class="btn btn-object-action" id="text-cmd-italic"
              ng-click="toggleIyotalic()"
              ng-class="{'btn-inverse': isItalic()}">
              <i>I</i>
            </button>
            <button type="button" class="btn btn-object-action" id="text-cmd-underline"
              ng-click="toggleUnderline()"
              ng-class="{'btn-inverse': isUnderline()}">
              <b><u>U</u></b>
            </button>
            <button type="button" class="btn btn-object-action" id="text-cmd-linethrough"
              ng-click="toggleLinethrough()"
              ng-class="{'btn-inverse': isLinethrough()}">
              <b><del>U</del></b>
            </button>
            <button type="button" class="btn btn-object-action" id="text-cmd-overline"
              ng-click="toggleOverline()"
              ng-class="{'btn-inverse': isOverline()}">
              <b style="text-decoration:overline">U</b>
            </button></li>
                    </div>
                </ul>
                <ul style="20px;" class="list-unstyled" data-link="pencil">
                    <li><button id="drawing-mode" class="btn btn-info"
          ng-click="setFreeDrawingMode(!getFreeDrawingMode())"
          ng-class="{'btn-inverse': getFreeDrawingMode()}">
          {[ getFreeDrawingMode() ? 'Exit free drawing mode' : 'Enter free drawing mode' ]}
        </button></li>
        <div id="drawing-mode-options" ng-show="getFreeDrawingMode()">
        <li>
          <label for="drawing-mode-selector">Mode:</label><br>
          <select id="drawing-mode-selector" bind-value-to="drawingMode">
            <option>Pencil</option>
            <option>Circle</option>
            <option>Spray</option>
            <option>Pattern</option>

            <option>hline</option>
            <option>vline</option>
            <option>square</option>
            <option>diamond</option>
            <option>texture</option>
          </select>
          </li>
          <li>
          <label for="drawing-line-width">Line width:</label><br>
          <input type="range" value="30" min="0" max="150" bind-value-to="drawingLineWidth">
          </li>
          <li>
          <label for="drawing-color">Line color:</label><br>
          <input type="color" value="#005E7A" bind-value-to="drawingLineColor">
          </li>
          <li>
          <label for="drawing-shadow-width">Line shadow width:</label><br>
          <input type="range" value="0" min="0" max="50" bind-value-to="drawingLineShadowWidth">
          </li>
                </ul>

                <ul class="list-unstyled" data-link="property">
                <li>Object</li>
                <li><hr></li>
                    <li>
                    <table>
                    <tr>
                        <td> <label class="object">Fill</label></td>
                        <td> : </td>
                        <td> <input title="Fill" type="color" style="width:40px" bind-value-to="fill" class="btn-object-action"></td>
                    </tr>
                    <tr>
                        <td> <label class="object">Stroke</label></td>
                        <td> : </td>
                        <td> <input title="Stroke" type="color" style="width:40px" bind-value-to="stroke" class="btn-object-action"></td>
                    </tr>
                    <tr>
                        <td> <label class="object">Background</label></td>
                        <td> : </td>
                        <td> <input title="Background" type="color" value="" id="text-bg-color" size="10" class="btn-object-action" bind-value-to="bgColor"></td>
                    </tr>
                    <tr>
                        <td> <label class="object">Opacity</label></td>
                        <td> : </td>
                        <td> <input value="100" type="range" bind-value-to="opacity" class="btn-object-action"></td>
                    </tr>
                    <tr>
                        <td> <label class="object">Stroke</label></td>
                        <td> : </td>
                        <td> <input value="1" min="0" max="30" type="range" bind-value-to="strokeWidth" class="btn-object-action"></td>
                    </tr>
                    </table>
                    </li>
                    <li><hr></li>
                    <li>
                    <table>
                    <tr>
                    <td><button id="send-backwards" class="btn btn-object-action btn-sm"
            ng-click="sendBackwards()">Send backwards</button></td>
            <td>
                <button id="send-to-back" class="btn btn-object-action btn-sm"
            ng-click="sendToBack()">Send to back</button>
                </td>
            </tr>
            <tr>
            <td>
                <button id="bring-forward" class="btn btn-object-action btn-sm"
            ng-click="bringForward()">Bring forwards</button>
                </td>
                <td>
                <button id="bring-to-front" class="btn btn-object-action btn-sm"
            ng-click="bringToFront()">Bring to front</button>
                </td></tr>
                    </table></li>
                    <li><hr></li>
                    <li>
                    <table>
                    <tr>
                    <td><button id="gradientify" class="btn btn-object-action" ng-click="gradientify()">
            Gradientify
          </button></td>
          <td><button id="shadowify" class="btn btn-object-action" ng-click="shadowify()">
            Shadowify
          </button></td>
                    </tr>
                    </table>
                    </li>
                    <li>Background</li>
                    <li><hr></li>
                    <li><input style="height: 50px;width:50px;" type="color" bind-value-to="canvasBgColor"></li>
                </ul>
            </div>
        </div>
    </div>
    <main>
        <div class="container-fluid">
            <div class="row  ">
                <div class="col-lg-12">
                    <table><tr><td>
                        <button style="border-radius:0px;" title="Lock Horizontal Movement" class="btn btn-lock btn-object-action btn-sm"
                            ng-click="setVerticalLock(!getVerticalLock())"
                            ng-class="{'btn-inverse': getVerticalLock()}"><i class="fa fa-arrows-alt-h"></i>
                            {[ getVerticalLock() ? 'Unlock' : 'Lock' ]}
                        </button>
                        </td>
                        <td>
                        <div class="col-sm-1">
                        <button style="border-radius:0px;" title="Lock Vertical Movement" class="btn btn-lock btn-object-action btn-sm"
                            ng-click="setHorizontalLock(!getHorizontalLock())"
                            ng-class="{'btn-inverse': getHorizontalLock()}"><i class="fa fa-arrows-alt-v"></i>
                            {[ getHorizontalLock() ? 'Unlock' : 'Lock' ]}
                        </button>
                        </td>
                        <td>
                        <button style="float: right;margin-right:10px;border-radius:0px;" class="btn btn-object-action" id="remove-selected btn-sm"
            ng-click="removeSelected()">
            <i class="fa fa-trash"></i>
          </button></td>
                        </tr></table>
                    <div class="separator mb-5"></div>
                </div>
                <style>
                    .space {
                        width: 100%;
                        height: 50%;
                        overflow-x: auto;
                        overflow-y: auto;
                        }
                </style>
                  <div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Kirim Design</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <label>Nama Design</label>
       <input style="border-radius: 0px;" class="form-control name_file" type="text" value="<?= $nama ?>" name="name_file">
        <button style="width: 100%;border-radius: 0px;" type="button" class="btn btn-info save" ng-click="saveJSON()">Save</button>
                    <?php
                    if(empty($_SESSION['admin_nama'])) {
                    $author = $_SESSION['pelanggan_nama'];
                    }else{
                      $author = $_SESSION['admin_nama'];
                    }
                    ?>
                    <p>Author : <?= $author ?></p>
                    <div class="saved"></div>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                <div class="col-lg-12">
                <div class=" justify-content-center align-items-center space">
                <div id="workspace" style="transform: scale(0.3);transform-origin: 0% 0% 0px;background-color:white;width:<?= $width ?>px;height:<?= $height ?>px;">
                    <canvas id="canvas" width="<?= $width ?>" height="<?= $height ?>"></canvas>
                </div>
                </div>
                
                <textarea style="display:none;" id="design" bind-value-to="consoleJSON"></textarea>
                </div>
            </div>
        </div>
    </main>
    <style>
#zoomTool {
  position: fixed;
  bottom: 8px;
  right: 10px;
  background-color:#145388;
  padding:10px;
  border-radius:10px;
}
    </style>
    <div id="zoomTool">
    <table>
                  <tr>
                    <td><i style="color:white;" class="fa fa-search-minus"></i></td>
                    <td><input class="form-control" id="zoom" min="1" max="9" value='3' step="1" type="range"/></td>
                    <td><i style="color:white;" class="fa fa-search-plus"></i></td>
                  </tr>
                </table>
    </div>
    </div>
  
    <script src="<?= base_url('assets/editor/') ?>js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/editor/') ?>js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/editor/') ?>js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/editor/') ?>js/vendor/mousetrap.min.js"></script>
    <script src="<?= base_url('assets/editor/') ?>js/dore.script.js"></script>
    <script src="<?= base_url('assets/editor/') ?>js/scripts.js"></script>
    <script>
    $('#zoom').change(function() {
        var scale = $(this).val();
        $('#workspace').css('transform', 'scale('+ 0 +'.'+ scale + ')');
    })
</script>
<script>

      $(document).ready(function() {

        <?php if(!isset($this->session->admin_nama) || !isset($this->session->pelanggan_nama)): ?>
          $('#modalLRForm').modal('show');
        <?php endif ?>

        $('#login').click(function() {
        var email_login = $('#email_login').val();
        var password_login = $('#password_login').val();
        var url = document.URL;
        $.ajax({
            type: "POST",
            url: "<?= base_url('Home/login') ?>",
            data: {
                email_login:email_login,
                password_login:password_login
            },
            success:function(data) {
                if (data=="berhasil") {
                  $('#alert_login').html('<div class="alert alert-success" role="alert">Login Success.. please Login</div>');
                  setTimeout(function() {
                    window.location.href = url;
                  }, 2000);
                }else{
                  $('#alert_login').html(data);
                }
            }
        });
        });
        $('#register').click(function() {
        var nama = $('#nama').val();
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Home/register') ?>",
            data: {
                nama:nama,
                email:email,
                password:password
            },
            success:function(data) {
                $('#alert').html(data);
            }
        });
        });
      });
    </script>
<script>
    $(document).ready(function() {

        var flag = 0;

        $.ajax({
            type: "GET",
            url: "<?= base_url('Editor/get_images') ?>",
            data: {
                'offset': 0,
                'limit': 20
            },
            success: function(data) {
                $('#gallery').append(data);
                flag += 20;
            }
        });

        $('#more').click(function() {
            $.ajax({
            type: "GET",
            url: "<?= base_url('Editor/get_images') ?>",
            data: {
                'offset': flag,
                'limit': 20
            },
            success: function(data) {
                $('#gallery').append(data);
                flag += 20;
            }
        });
        });
    });
</script>
<script>
  $(document).ready(function() {
    $('#addimage').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url:'<?= base_url('Editor/upload_image') ?>',
        type: 'POST',
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        success:function(data) {
          $('#pesan').html(data);
          function displayImage() {
          $.ajax({
            url: '<?= base_url('Editor/get_images_user') ?>',
            type:'POST',
            success:function(data) {
              $('#gallery_image').html(data);
            }
          });
    }
    displayImage();
        }
      });
      $(this)[0].reset();
    })
    function displayImage() {
      $.ajax({
        url: '<?= base_url('Editor/get_images_user') ?>',
        type:'POST',
        success:function(data) {
          $('#gallery_image').html(data);
        }
      });
    }
    displayImage();
  });
</script>
<script>
      function addImage(nama) {
        <?php $url = base_url('image_assets/'); ?>
        fabric.Image.fromURL('<?= $url ?>'+nama, function(image) {
        canvas.add(image);
        });
    };
    </script>
    <script>
      function addImageUser(nama) {
        <?php $url = base_url('image_user/'); ?>
        fabric.Image.fromURL('<?= $url ?>'+nama, function(image) {
        canvas.add(image);
        });
    };
    </script>



<!-- <script src="../../lib/centering_guidelines.js') ?>"></script>
<script src="../../lib/aligning_guidelines.js') ?>"></script> -->



<script>
  var kitchensink = { };
  var canvas = new fabric.Canvas('canvas');
</script>
<?php
   $saveFile = $design;
   
?>
<script>
  var saveFile = <?= $saveFile ?>;
  var consoleJSONValue = (
      saveFile
    );
</script>
<script src="<?= base_url('assets/editor/lib/font_definitions.js') ?>"></script>
<script src="<?= base_url('assets/editor/js/kitchensink/utils.js') ?>"></script>
<script src="<?= base_url('assets/editor/js/kitchensink/app_config.js') ?>"></script>
<script src="<?= base_url('assets/editor/js/kitchensink/controller.js') ?>"></script>

<script>
    

  (function() {
    function renderVieportBorders() {
      var ctx = canvas.getContext();

      ctx.save();

      ctx.fillStyle = 'rgba(0,0,0,0.1)';

      ctx.fillRect(
        canvas.viewportTransform[4],
        canvas.viewportTransform[5],
        canvas.getWidth() * canvas.getZoom(),
        canvas.getHeight() * canvas.getZoom());

      ctx.setLineDash([5, 5]);

      ctx.strokeRect(
        canvas.viewportTransform[4],
        canvas.viewportTransform[5],
        canvas.getWidth() * canvas.getZoom(),
        canvas.getHeight() * canvas.getZoom());

      ctx.restore();
    }
    canvas.on('object:selected', function(opt) {
        var target = opt.target;
        if (target._cacheCanvas) {

        }
    })


    canvas.on('mouse:wheel', function(opt) {
      var e = opt.e;
      if (!e.ctrlKey) {
        return;
      }
      var newZoom = canvas.getZoom() + e.deltaY / 300;
      canvas.zoomToPoint({ x: e.offsetX, y: e.offsetY }, newZoom);

      renderVieportBorders();
      e.preventDefault();
      return false;
    });

    var viewportLeft = 0,
        viewportTop = 0,
        mouseLeft,
        mouseTop,
        _drawSelection = canvas._drawSelection,
        isDown = false;

    canvas.on('mouse:down', function(options) {
      if (options.e.altKey) {
        isDown = true;

        viewportLeft = canvas.viewportTransform[4];
        viewportTop = canvas.viewportTransform[5];

        mouseLeft = options.e.x;
        mouseTop = options.e.y;
        _drawSelection = canvas._drawSelection;
        canvas._drawSelection = function(){ };
        renderVieportBorders();
      }
    });

    canvas.on('mouse:move', function(options) {
      if (options.e.altKey && isDown) {
        var currentMouseLeft = options.e.x;
        var currentMouseTop = options.e.y;

        var deltaLeft = currentMouseLeft - mouseLeft,
            deltaTop = currentMouseTop - mouseTop;

        canvas.viewportTransform[4] = viewportLeft + deltaLeft;
        canvas.viewportTransform[5] = viewportTop + deltaTop;

        canvas.renderAll();
        renderVieportBorders();
      }
    });

    canvas.on('mouse:up', function() {
      canvas._drawSelection = _drawSelection;
      isDown = false;
    });
  })();

</script>

    </div>

    <script>
      (function(){
        var mainScriptEl = document.getElementById('main');
        if (!mainScriptEl) return;
        var preEl = document.createElement('pre');
        var codeEl = document.createElement('code');
        codeEl.innerHTML = mainScriptEl.innerHTML;
        codeEl.className = 'language-javascript';
        preEl.appendChild(codeEl);
        document.getElementById('bd-wrapper').appendChild(preEl);
      })();
    </script>

    <script>
(function() {
  fabric.util.addListener(fabric.window, 'load', function() {
    var canvas = this.__canvas || this.canvas,
        canvases = this.__canvases || this.canvases;

    canvas && canvas.calcOffset && canvas.calcOffset();

    if (canvases && canvases.length) {
      for (var i = 0, len = canvases.length; i < len; i++) {
        canvases[i].calcOffset();
      }
    }
  });
})();
</script>


<script>
  $('#export').click(function() {
    $('#canvas').get(0).toBlob(function(blob) {
      saveAs(blob, 'Your Image.png');
    });
  });
</script>

<script>
  $('.save').click(function() {
    $('.saved').html('Saving..');
    setTimeout(function(){
    var id_user = $('#id_user').val();
    var new_design = $('#new').val();
    var name_file = $('.name_file').val();
    var design = $('#design').val();
    var width = $('#width').val();
    var height = $('#height').val();
    var category = $('#category').val();
    var design_id = $('#design_id').val();
    var design_image = $('#design_image').val();
    var level = $('#level').val();
    var id_transaksi = $('#id_transaksi').val();

    var dataURL = canvas.toDataURL();
    document.getElementById('canvas').src = dataURL;
    $.ajax({
          type: "POST",
          url: "<?= base_url('Editor/save') ?>",
          data: { 
            imgBase64: dataURL,
            id_user:id_user,
            name_file:name_file,
            design_image:design_image,
            design:design,
            width:width,
            height:height,
            category:category,
            level:level,
            id_transaksi:id_transaksi,
            design_id:design_id
          }
        }).done(function(response) {
          $('.saved').html('<a href="<?= base_url('Order_pelanggan/detail/') ?>'+id_transaksi+'" style="width: 100%;border-radius: 0px;" class="btn btn-primary">Ke detail transaksi</a>');
          if (response!=='save') {
            window.location.replace("<?= base_url() ?>"+response);
          }
        });
      }, 2000);
  });
</script>
</body>

</html>