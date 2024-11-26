<!-- Header -->
<?php require './views/layout/header.php'; ?>

<!-- Navbar -->
<?php require './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php require './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<<<<<<< HEAD
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Sua thong tin san pham: <?= $sanPham['ten_san_pham'] ?></h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Quay lai</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thong tin san pham</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                <label for="ten_san_pham">Ten san pham</label>
                                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control"
                                    value="<?= $sanPham['ten_san_pham'] ?>">
                                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="gia_san_pham">Gia san pham</label>
                                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control"
                                    value="<?= $sanPham['gia_san_pham'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="gia_khuyen_mai">Gia khuyen mai</label>
                                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control"
                                    value="<?= $sanPham['gia_khuyen_mai'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="hinh_anh">Hinh anh</label>
                                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="so_luong">So luong</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control"
                                    value="<?= $sanPham['so_luong'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="ngay_nhap">Ngay nhap</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control"
                                    value="<?= $sanPham['ngay_nhap'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Danh muc san pham</label>
                                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?>
                                        value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="trang_thai">Trang thai san pham</label>
                                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                    <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Con ban
                                    </option>
                                    <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dung ban
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mo_ta">Mo ta san pham</label>
                                <textarea id="mo_ta" name="mo_ta" class="form-control"
                                    rows="4"><?= $sanPham['mo_ta'] ?></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Sua thong tin</button>
                        </div>

                </div>
                </form>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <!-- /.card -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Album anh san pham</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table id="faqs" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Anh</th>
                                            <th>File</th>
                                            <th>
                                                <div class="text-center"><button onclick="addfaqs();" type="button"
                                                        class="badge badge-success"><i
                                                            class="fa fa-plus"></i>Add</button></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                        <input type="hidden" id="img_delete" name="img_delete">
                                        <?php foreach($listAnhSanPham as $key=>$value): ?>
                                        <tr id="faqs-row-<?= $key ?>">
                                            <input type="hidden" name="current_img_ids[]" $value="<?= $value['id'] ?>">
                                            <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>"
                                                    style="width: 50px; height: 50px;" alt=""></td>
                                            <td><input type="file" name="img_array[]" class="form-control"></td>
                                            <td class="mt-10"><button class="badge badge-danger" type="button"
                                                    onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i
                                                        class="fa fa-trash"></i> Delete</button></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Sua thong tin</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Save Changes" class="btn btn-success float-right">
            </div>
        </div>
    </section>
    <!-- /.content -->
=======
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-11">
          <h1>Sua thong tin san pham: <?= $sanPham['ten_san_pham'] ?></h1>
        </div>
        <div class="col-sm-1">
          <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Quay lai</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thong tin san pham</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                <label for="ten_san_pham">Ten san pham</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?= $sanPham['ten_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                <?php } ?>
              </div>

              <div class="form-group">
                <label for="gia_san_pham">Gia san pham</label>
                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $sanPham['gia_san_pham'] ?>">
              </div>

              <div class="form-group">
                <label for="gia_khuyen_mai">Gia khuyen mai</label>
                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>">
              </div>

              <div class="form-group">
                <label for="hinh_anh">Hinh anh</label>
                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
              </div>

              <div class="form-group">
                <label for="so_luong">So luong</label>
                <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>">
              </div>

              <div class="form-group">
                <label for="ngay_nhap">Ngay nhap</label>
                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>">
              </div>

              <div class="form-group">
                <label for="inputStatus">Danh muc san pham</label>
                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                  <?php foreach ($listDanhMuc as $danhMuc): ?>
                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="trang_thai">Trang thai san pham</label>
                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                  <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Con ban</option>
                  <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dung ban</option>
                </select>
              </div>

              <div class="form-group">
                <label for="mo_ta">Mo ta san pham</label>
                <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $sanPham['mo_ta'] ?></textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Sua thong tin</button>
            </div>

        </div>
        </form>
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <!-- /.card -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Album anh san pham</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="post" enctype="multipart/form-data">
              <div class="table-responsive">
                <table id="faqs" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Anh</th>
                      <th>File</th>
                      <th>
                        <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i>Add</button></div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                    <input type="hidden" id="img_delete" name="img_delete">
                    <?php foreach($listAnhSanPham as $key=>$value): ?>
                    <tr id="faqs-row-<?= $key ?>">  
                      <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">           
                      <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 50px; height: 50px;" alt=""></td>
                      <td><input type="file" name="img_array[]" class="form-control"></td>
                      <td class="mt-10"><button class="badge badge-danger" type="button" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Sua thong tin</button>
          </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
   
  </section>
  <!-- /.content -->
>>>>>>> b467831968883ad9c3e9f46ecd3e09cabd850bbf
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php require './views/layout/footer.php'; ?>
<!-- End footer -->

</body>
<script>
<<<<<<< HEAD
var faqs_row = <?= count($listAnhSanPham) ?>;

function addfaqs() {
    html = '<tr id="faqs-row-' + faqs_row + '">';
    html +=
        '<td><img src="https://i.pinimg.com/564x/59/36/69/5936698bace4c5852463a2581e890bec.jpg" style="width: 50px; height: 50px;" alt=""></td>';
    html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row +
        ', null);"><i class="fa fa-trash"></i> Delete</button></td>';
=======
  var faqs_row = <?= count($listAnhSanPham) ?>;

  function addfaqs() {
    html = '<tr id="faqs-row-' + faqs_row + '">';
    html += '<td><img src="https://i.pinimg.com/564x/59/36/69/5936698bace4c5852463a2581e890bec.jpg" style="width: 50px; height: 50px;" alt=""></td>';
    html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow('+ faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';
>>>>>>> b467831968883ad9c3e9f46ecd3e09cabd850bbf

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
<<<<<<< HEAD
}

function removeRow(rowId, imgId) {
    $('#faqs-row-' + rowId).remove();
    if (imgId !== null) {
        var imgDeleteInput = document.getElementById('img_delete')
        var currentValue = imgDeleteInput.value;
        imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }
}
=======
  }

  function removeRow(rowId, imgId){
    $('#faqs-row-' + rowId).remove();
    if (imgId !== null) {
      var imgDeleteInput = document.getElementById('img_delete')
      var currentValue = imgDeleteInput.value;
      imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }
  }
>>>>>>> b467831968883ad9c3e9f46ecd3e09cabd850bbf
</script>

</html>