<!-- Start Card Content -->
<div class="card-content">
    @foreach($languages as $lang)
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">{{ 'النبذة'.' : '.$lang->name }} </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input type="text" name="summery[{{ $lang->code }}]" class="input"
                               value="{{ isset($about) ? $about->summery[$lang->code] : null }}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <br>
    <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">الصورة </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <uploader label="اختر صورة" name="image" @if(isset($about)) file="{{ $about->image }}" @endif></uploader>
                    </div>
                </div>
            </div>
        </div>
    <hr>
    @foreach($languages as $lang)
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">{{ 'الرسالة'.' : '.$lang->name }} </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input type="text" name="mission[{{ $lang->code }}]" class="input"
                               value="{{ isset($about) ? $about->mission[$lang->code] : null }}">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <hr>
    @foreach($languages as $lang)
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">{{ 'الرؤية'.' : '.$lang->name }} </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input type="text" name="vision[{{ $lang->code }}]" class="input"
                               value="{{ isset($about) ? $about->vision[$lang->code] : null }}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <hr>
    @foreach($languages as $lang)
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">{{ 'الاهداف'.' : '.$lang->name }} </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input type="text" name="goals[{{ $lang->code }}]" class="input"
                               value="{{ isset($about) ? $about->goals[$lang->code] : null }}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.abouts.edit') }}"> الغاء </a>
        <button type="submit" class="button is-success">حفظ</button>
    </div>
</div>
<!-- End Card Footer -->
