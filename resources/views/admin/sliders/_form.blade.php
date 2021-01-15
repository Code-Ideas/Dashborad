<!-- Start Card Content -->
<div class="card-content">
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label required">العنوان</label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										{!! Form::text('title', null, ['class' => 'input' , 'required'] )!!}
								</div>
						</div>
				</div>
		</div>
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label required">الصورة </label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										<uploader label="اختر صورة" name="image" @if(isset($slider)) file="{{ $slider->image }}" @endif></uploader>
								</div>
						</div>
				</div>
		</div>
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label">الحالة</label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										<label class="radio">
												<input type="radio" name="active" value="1" @if(isset($slider) && $slider->active) checked @else checked @endif>
												مفعل
										</label>
										<label class="radio">
												<input type="radio" name="active" value="0" @if(isset($slider) && !$slider->active) checked  @endif>
												غير مفعل
										</label>
								</div>
						</div>
				</div>
		</div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
		<div class="buttons has-addons">
				<a class="button is-info" href="{{ route('admin.sliders.index') }}"> الغاء </a>
				<button type="submit" class="button is-success">حفظ</button>
		</div>
</div><!-- End Card Footer -->
