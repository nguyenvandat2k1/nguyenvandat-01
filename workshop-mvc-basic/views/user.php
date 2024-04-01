<div class="row">
    <h2>Danh sách User</h2>

    <button type="button" onclick="formCreate()" class="btn btn-success">Create</button>

    <table class="table table-hover" id="list">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                
        </tbody>
    </table>
</div>

<div class="modal" id="showModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Trường</th>
                    <th>Giá trị</th>
                </tr>
            </thead>
            <tbody>
                    
            </tbody>
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="formModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="form">
            <input type="hidden" name="id" id="id" class="form-control">

            <div class="mt-2 mb-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="mt-2 mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="mt-2 mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="mt-2 mb-2">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-select">
                    <option value="1">Admin</option>
                    <option value="0">Member</option>
                </select>
            </div>

            <button type="button" onclick="submitForm()" class="btn btn-primary">Submit</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
    let linkUserList    = '<?= BASE_URL . '?act=ajax-user-list' ?>';
    let linkUserCreate  = '<?= BASE_URL . '?act=ajax-user-create' ?>';
    let linkUserShow    = '<?= BASE_URL . '?act=ajax-user-show&id=' ?>';
    let linkUserUpdate  = '<?= BASE_URL . '?act=ajax-user-update&id=' ?>';
    let linkUserDelete  = '<?= BASE_URL . '?act=ajax-user-delete&id=' ?>';
</script>
<script src="<?= BASE_URL ?>/assets/js/user.js?v=<?= time() ?>"></script>