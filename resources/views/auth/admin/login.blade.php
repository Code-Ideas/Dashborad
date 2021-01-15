@extends('admin.layouts.app')
@section('page.title', 'دخول')
@section('content')
  <div class="login-form-container">
          <div >
            <figure class="avatar image is-96x96">
              <img class="is-rounded" src="{{ asset('/admin/img/avatar.svg') }}">
            </figure>
            <p class="mb-12 is-size-3 has-text-black has-text-weight-bold has-text-centered">تسجيل دخول لوحة التحكم</p>
            <form action="{{ route('admin_logged') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mt-8 field">
                <div class="control has-icons-left has-icons-right">
                  <i class="fas fa-envelope"></i>
                  <input id="email" type="email" class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold" name="email" placeholder="البريد الالكتروني" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-8 field">
                <div class="control has-icons-left has-icons-right">
                  <i class="fas fa-lock"></i>
                  <input id="password" type="password" class="border-white input form-element line-input has-text-centered is-white has-text-weight-semibold" name="password" placeholder="كلمة السر " required autocomplete="current-password">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mt-6 field has-text-centered mb2-5-minus">
                <button class="px-6 button is-primary is-rounded is-fullwidth has-text-weight-bold is-medium">
                  دخول
                </button>
              </div>
            </form>
          </div>


  </div>
@endsection
@section('scripts')
  <script>
    const inputs = document.querySelectorAll(".input");
    function addcl(){
      let parent = this.parentNode.parentNode;
      parent.classList.add("focus");
    }

    function remcl(){
      let parent = this.parentNode.parentNode;
      if(this.value == ""){
        parent.classList.remove("focus");
      }
    }


    inputs.forEach(input => {
      input.addEventListener("focus", addcl);
      input.addEventListener("blur", remcl);
    });
  </script>
@endsection
