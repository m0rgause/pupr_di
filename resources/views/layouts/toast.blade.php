@if (Session::has('error'))
<div class="alert alert-danger alert-dismissable fade show d-flex justify-content-between" role="alert">
  {{ Session::get('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (Session::has('success'))
<div class="alert alert-success alert-dismissable fade show d-flex justify-content-between" role="alert">
  {{ Session::get('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissable fade show d-flex justify-content-between" role="alert">
  {{ $error }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif