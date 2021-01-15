<!-- Start Card Content -->
<div class="card-content">
  <div class="field is-horizontal">
      <div class="field-label is-normal">
          <label class="label required">عنوان المقال </label>
      </div>
      <div class="field-body">
          <div class="field">
              <div class="control">
                  {!! Form::text('title', null, ['class' => 'input', 'required']) !!}
              </div>
          </div>
      </div>
  </div>
  <hr />
  <div class="field is-horizontal">
      <div class="field-label is-normal">
          <label class="label required"> محتوي المقال </label>
      </div>
      <div class="field-body">
          <div class="field">
              <div class="control">
                  <ck-editor id="content" name="content" @if (isset($article))
                      old-data="{{ $article->content }}" @endif></ck-editor>
              </div>
          </div>
      </div>
  </div>
  <hr />
  <div class="field is-horizontal">
      <div class="field-label is-normal">
          <label class="label required">اختيار قسم الموقع </label>
      </div>
      <div class="field-body">
          <div class="field">
              <div class="control">
                  <div class="select is-fullwidth">
                      {!! Form::select('section_id', $sections, null, ['required']) !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
  <hr />
  <div class="field is-horizontal">
      <div class="field-label is-normal">
          <label class="label required">صورة المقال</label>
      </div>
      <div class="field-body">
          <div class="field">
              <div class="control">
                  <uploader label="صورة المقال" name="image" @if (isset($article))
                      file="{{ $article->image }}" @endif></uploader>
              </div>
          </div>
      </div>
  </div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
      <a class="button is-info" hr/ef="{{ route('admin.articles.index') }}"> الغاء </a>
      <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
