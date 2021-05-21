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
function openTabs(evt, option) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(option).style.display = "block";
  evt.currentTarget.className += " active";
}
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

<script src="<?= base_url('assets/editor/lib/font_definitions.js') ?>"></script>

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
  $('#save').click(function() {
    setTimeout(function(){
    var id_user = $('#id_user').val();
    var new_design = $('#new').val();
    var name_file = $('#name_file').val();
    var design = $('#design').val();
    var width = $('#width').val();
    var height = $('#height').val();
    var category = $('#category').val();
    var design_id = $('#design_id').val();
    var design_image = $('#design_image').val();
    var level = $('#level').val();

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
            design_id:design_id
          }
        }).done(function(response) {
          alert('Save Success');
          if (response!=='save') {
            window.location.replace("<?= base_url() ?>"+response);
          }
        });
      }, 2000);
  });
</script>
  </body>
</html>


