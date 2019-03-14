@foreach($textBoxs as $textBox)
	<div class="{{ $textBox->text_box_name}} draggable" style="position: absolute;margin-bottom: 10px;padding-bottom: 10px;width: 200px;">
		<textarea class="text-box" style="background: none" placeholder="Enter Some Text Here"></textarea>
	</div>
@endforeach
