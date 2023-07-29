@if($errors->any())
  <div class="alert alert-danger text-center">
    <p>ERROR：入力事項に誤りがあります。</p>
  </div>
@endif

@if(session('delete_user_complete'))
  <div class="alert alert-success text-center">
    <p>{{ session('delete_user_complete') }}</p>
  </div>
@endif

@if(session('deleted_user'))
  <div class="alert alert-warning text-center">
    <p>{{ session('deleted_user') }}</p>
  </div>
@endif

@if(session('edit_user'))
  <div class="alert alert-success text-center">
    <p>{{ session('edit_user') }}</p>
  </div>
@endif
@if(session('edit_password'))
  <div class="alert alert-success text-center">
    <p>{{ session('edit_password') }}</p>
  </div>
@endif
@if(session('error_confirm'))
  <div class="alert alert-danger text-center">
    <p>{{ session('error_confirm') }}</p>
  </div>
@endif
@if(session('error_edit_password'))
  <div class="alert alert-warning text-center">
    <p>{{ session('error_edit_password') }}</p>
  </div>
@endif

@if(session('add_category'))
  <div class="alert alert-primary text-center">
    <p>{{ session('add_category') }}</p>
  </div>
@endif
@if(session('edit_category'))
  <div class="alert alert-success text-center">
    <p>{{ session('edit_category') }}</p>
  </div>
@endif
@if(session('del_category'))
  <div class="alert alert-warning text-center">
    <p>{{ session('del_category') }}</p>
  </div>
@endif

@if(session('add_payment'))
  <div class="alert alert-primary text-center">
    <p>{{ session('add_payment') }}</p>
  </div>
@endif
@if(session('edit_payment'))
  <div class="alert alert-success text-center">
    <p>{{ session('edit_payment') }}</p>
  </div>
@endif
@if(session('del_payment'))
  <div class="alert alert-warning text-center">
    <p>{{ session('del_payment') }}</p>
  </div>
@endif
