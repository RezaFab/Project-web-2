<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: left;">
                                <h3 class="mb-0" id="judul">Kategori</h3>
                            </td>
                            <td style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i></button></td>
                        </tr>
                    </table>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1;
                            foreach ($category as $c) : ?>
                                <tr>
                                    <td><?= $n++ ?></td>
                                    <td><?= $c['category_kode'] ?></td>
                                    <td><?= $c['category_nama'] ?></td>
                                    <td>
                                        <button id="<?= $c['category_id'] ?>" type="button" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#edit"><i class="fa fa-pen"></i></button>
                                        <button id="<?= $c['category_id'] ?>" type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Kategori</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action="<?= base_url('Category/tambah_category') ?>">
                    <div class="form-group">
                        <input type="text" placeholder="Kode" name="kode" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Nama" name="nama" class="form-control">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Edit Kategori</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="form_edit"></div>
        </div>
    </div>
</div>

</div>
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Hapus Kategori</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alert_hapus"></div>
                <h3>Apakah anda yakin?</h3>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn_hapus">hapus</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

</div>
<script type="text/javascript" src="typeahead.bundle.min.js"></script>
<script type="text/javascript" src="mab-jquery-taginput.js?v2"></script>
<script>
    $('.edit').click(function() {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Category/get_data') ?>",
            data: {
                id: id
            },
            success: function(data) {
                $('#form_edit').html(data);
            }
        });
    });

    $(document).on('click', '.update', function() {
        var id = $(this).attr('id');
        var kode = $('#kode').val();
        var nama = $('#nama').val();
        var url = document.URL;
        if (kode !== '' && nama !== '') {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Category/edit_category') ?>",
                data: {
                    id: id,
                    kode: kode,
                    nama: nama
                },
                success: function(data) {
                    $('#alert').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data terupdate</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    setTimeout(function() {
                        window.location.href = url;
                    }, 1000);
                }
            });
        } else {
            $('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-times"></i></span><span class="alert-text"><strong>Gagal!</strong> Data gagal terupdate</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
    });

    $(document).on('click', '.hapus', function() {
        var id = $(this).attr('id');
        $('.btn_hapus').attr('id', id);
    });
    $(document).on('click', '.btn_hapus', function() {
        var url = document.URL;
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Category/hapus_category') ?>",
            data: {
                id: id
            },
            success: function(data) {
                $('#alert_hapus').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data dihapus</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                setTimeout(function() {
                    window.location.href = url;
                }, 1000);
            }
        });
    });
</script>
<script type="text/javascript">
    $(function() {

        // Instantiate the Bloodhound suggestion engine
        var tags = new Bloodhound({
            datumTokenizer: function(d) {
                return Bloodhound.tokenizers.whitespace(d.tag);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: [{
                    tag: 'dog'
                },
                {
                    tag: 'cat'
                },
                {
                    tag: 'fish'
                },
                {
                    tag: 'catfish'
                },
                {
                    tag: 'dogfish'
                }
            ]
        });

        tags.initialize();

        // Set up an on-screen console for the demo
        var screenConsole = $('#console');

        // Write callback data to the screen when tags are added or removed in demo inputs
        var logCallbackDataToConsole = function(added, removed) {
            screenConsole.append('Tag Data: ' + (this.val() || null) + ', Added: ' + added + ', Removed: ' + removed + '\n');
        };

        // Create typeahead-enabled tag inputs
        $('.tag-input').tagInput({
            allowDuplicates: false,
            typeahead: true,
            typeaheadOptions: {
                highlight: true
            },
            typeaheadDatasetOptions: {
                display: function(d) {
                    return d.tag;
                },
                source: tags.ttAdapter()
            },
            onTagDataChanged: logCallbackDataToConsole
        });

        // Create basic tag inputs with no typeahead
        $('.tag-input-basic').tagInput({
            onTagDataChanged: logCallbackDataToConsole
        });

        $('#results a[rel="external"]').attr('target', '_blank');

    });
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
<script>
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
            method: 'HEAD',
            mode: 'no-cors'
        })).then(function(response) {
            return true;
        }).catch(function(e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }
</script>