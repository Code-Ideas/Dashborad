<div class="card-content">
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label required">اسم الصفحة</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control">
          {!! Form::text('name', null, ['class' => 'input' , 'required'] )!!}
        </div>
      </div>
    </div>
  </div>
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label required">اسم الصفحة بالانجليزية </label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control">
          {!! Form::text('name_en', isset($page) ? $page->translate('en')->name : null, ['class' => 'input' , 'required'] )!!}
        </div>
      </div>
    </div>
  </div>
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label required"> المحتوي </label>
    </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <ck-editor id="content" name="content" @if(isset($page)) old-data="{{ $page->content }}" @endif></ck-editor>        
      </div>
    </div>
  </div>
</div>
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label required">المحتوي بالانجليزية</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control">
          <ck-editor id="content_en" name="content_en" @if(isset($page)) old-data="{{ $page->translate('en')->content }}" @endif></ck-editor>
        </div>
      </div>
    </div>
  </div>

  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label required"> وصف الصفحة </label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control">
          <ck-editor id="description" name="description" @if(isset($page)) old-data="{{ $page->description }}" @endif></ck-editor>
        </div>
      </div>
    </div>
  </div>
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label required">وصف الصفحة بالانجليزية</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control">
          <ck-editor id="description_en" name="description_en" @if(isset($page)) old-data="{{ $page->translate('en')->description }}" @endif></ck-editor>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.pages.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</footer>
