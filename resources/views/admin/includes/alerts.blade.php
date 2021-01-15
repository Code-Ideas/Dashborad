@if(count($errors) > 0)
    <alert
        alert-title="خطأ في البيانات"
        alert-type="error"
        :alert-messages="{{ collect($errors->all()) }}">
    </alert>
@endif

@if(session()->has('error'))
    <alert title="خطأ في البيانات" alert-type="error" alert-title="{{ session('error') }}"></alert>
@elseif(session()->has('success'))
    <alert title="تم ارسال البيانات بنجاح" alert-type="success" alert-title="{{ session('success') }}"></alert>
@endif
