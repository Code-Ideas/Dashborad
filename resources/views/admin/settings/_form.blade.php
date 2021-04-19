<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">اسم الموقع</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('site_name', null, ['class' => 'input', 'required']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">وصف الموقع</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::textarea('site_description', null, ['class' => 'textarea', 'rows' => 3  , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label"> ايميل الموقع</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('email', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">الهاتف</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('phone', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Whatsapp</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('whatsapp', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">FaceBook</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('facebook', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Twitter</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('twitter', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">YouTube</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('youtube', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">العنوان</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('address', null, ['class' => 'input']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الموقع علي الخريطة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <google-map :editable="true" @if(isset($setting)) :address="{latitude:{{ $setting->latitude }}, longitude:{{ $setting->longitude }}}" @endif></google-map>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.dashboard') }}"> الغاء </a>
        <button type="submit" class="button is-success">حفظ</button>
    </div>
</footer>
