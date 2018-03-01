@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>错误</strong> 输入不符合要求<br><br> {!! implode('<br>', $errors->all()) !!}
</div>
@endif