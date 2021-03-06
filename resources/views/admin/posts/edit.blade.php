@extends('layouts.admin')

@section('title')
    Edit {{$post->title}}
@endsection

@push('stylesheet')
<!-- Include Editor style. -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
@endpush

@push('script')
<!-- Include JS file. -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.min.js'></script>
<!-- Initialize the editor. -->
<script> 
    $(function() { 
            $('#post-content').froalaEditor(
            {'height': 300}
            )}); 
</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit {{$post->title}}</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.posts.update', $post->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Post title" name="title" type="text" value="{{ ($post->title != old('title') && empty(old('title'))) ? $post->title : old('title') }}" />
                        {!! ($errors->has('title') ? $errors->first('title', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('content')) ? 'has-error' : '' }}">
                        <textarea class="form-control" name="content" id="post-content">
                            {!! ($post->content != old('content') && empty(old('content'))) ? $post->content : old('content') !!}
                        </textarea>
                        {!! ($errors->has('content') ? $errors->first('content', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Update">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
