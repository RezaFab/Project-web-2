    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="<?= base_url('assets/user/js/jquery/jquery-2.2.4.min.js') ?>"></script>
    <!-- Popper js -->
    <script src="<?= base_url('assets/user/js/popper.min.js') ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url('assets/user/js/bootstrap.min.js') ?>"></script>
    <!-- Plugins js -->
    <script src="<?= base_url('assets/user/js/plugins.js') ?>"></script>
    <!-- Classy Nav js -->
    <script src="<?= base_url('assets/user/js/classy-nav.min.js') ?>"></script>
    <!-- Active js -->
    <script src="<?= base_url('assets/user/js/active.js') ?>"></script>
    <script src="<?= base_url('assets/user/jquery.gScrollingCarousel.js') ?>"></script>
    
    <!-- <script>
        const slider_poster = document.querySelector('.poster');
let isDown = false;
let startX;
let scrollLeft;

slider_poster.addEventListener('mousedown', (e) => {
  isDown = true;
  slider_poster.classList.add('active');
  startX = e.pageX - slider_poster.offsetLeft;
  scrollLeft = slider_poster.scrollLeft;
});
slider_poster.addEventListener('mouseleave', () => {
  isDown = false;
  slider_poster.classList.remove('active');
});
slider_poster.addEventListener('mouseup', () => {
  isDown = false;
  slider_poster.classList.remove('active');
});
slider_poster.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider_poster.offsetLeft;
  const walk = (x - startX) * 3; //scroll-fast
  slider_poster.scrollLeft = scrollLeft - walk;
  console.log(walk);
});
    </script> -->

    <script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > 300) {
        document.getElementById("cari").style.display = "block";
      } else {
        document.getElementById("cari").style.display = "none";
      }
      prevScrollpos = currentScrollPos;
    }
</script>

<script>
    $(document).ready(function() {
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
    });
</script>
<?php if($this->uri->segment(1)=='Search'): ?>
<script>
    var key = $('#key').val();
    var category = $('#category').val();
    var id = $('#id').val();
    var flag = 0;
    $.ajax({
        url:"<?= base_url('Search/get_data') ?>",
        type: "POST",
        data:{
            key:key,
            id:id,
            category:category,
            'offset':0,
            'limit':30
        },
        success:function(data) {
            $('#gallery').append(data);
            flag += 30;
        }
    });
    $(window).scroll(function() {
      if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
        $.ajax({
        url:"<?= base_url('Search/get_data') ?>",
        type: "POST",
        data:{
            key:key,
            id:id,
            category:category,
            'offset':flag,
            'limit':30
        },
        success:function(data) {
            $('#gallery').append(data);
            flag += 30;
        }
    });
      }
    })
</script>
<?php endif ?>
<?php if($this->uri->segment(1)=='Your_design'): ?>
  <script>
    function your_d() {
      var id = $('#id_user').val();
    var flag = 0;
    $.ajax({
        url:"<?= base_url('Your_design/get_your_design') ?>",
        type: "POST",
        data:{
            id:id,
            'offset':0,
            'limit':30
        },
        success:function(data) {
            $('#gallery').append(data);
            flag += 30;
        }
    });
    $(window).scroll(function() {
      if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
        $.ajax({
        url:"<?= base_url('Your_design/get_your_design') ?>",
        type: "POST",
        data:{
            id:id,
            'offset':flag,
            'limit':30
        },
        success:function(data) {
            $('#gallery').append(data);
            flag += 30;
        }
    });
      }
    });
    $(document).on('click','.info_design', function() {
      var id = $(this).attr('id');
      $.ajax({
        url: "<?= base_url('Your_design/get_design') ?>",
        type: "POST",
        data: {
          id:id
        },
        success:function(data) {
          $('#data_design').html(data);
        }
      });
    });
    }
    your_d();
</script>
<?php endif ?>
<script>
  $(document).ready(function(){
    <?php $no=1; foreach($design as $d): ?>
    $(".g<?= $no++ ?> .i<?= $no++ ?>").gScrollingCarousel();
    <?php endforeach ?>
  });
</script>

<script>
  $(document).on('click','.delete_user_design',function() {
    var url = document.URL;
    var result = confirm("Want to delete?");
    if (result) {
      var id = $(this).attr('id');
      var nama = $(this).attr('title');
        $.ajax({
          url: "<?= base_url('Your_design/delete_design') ?>",
          type: "POST",
          data: {
            id:id,
            nama:nama
          },
          success:function(data) {
            window.location.href = url;
          }
        });
    }
  });
</script>

</body>

</html>