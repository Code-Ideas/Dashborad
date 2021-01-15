<div class="card-content">
    @foreach($languages as $lang)
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">{{ 'اسم الموقع'.' : '.$lang->name }} </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <input type="text" name="site_name[{{ $lang->code }}]" class="input"
                           value="{{ isset($setting) ? $setting->site_name[$lang->code] : null }}">
                </div>
            </div>
        </div>
    </div>
    @endforeach
        @foreach($languages as $lang)
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label required">{{ 'وصف الموقع'.' : '.$lang->name }} </label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea name="site_description[{{ $lang->code }}]" class="textarea" rows="3">{{ isset($setting) ? $setting->site_description[$lang->code] : null }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
<!--    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">What's App</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('whatsapp', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>-->
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
<footer class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.settings.edit') }}"> الغاء </a>
        <button type="submit" class="button is-success">حفظ</button>
    </div>
</footer>
