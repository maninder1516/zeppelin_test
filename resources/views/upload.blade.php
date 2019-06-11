@extends('common.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {!!Form::open(array('url' => '#', 'class'=>'form-horizontal col-md-10 col-md-offset-1', 'id'=>'upload_media')) !!}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Upload Media</div>
                <div class="card-body">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label form-control" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="resolutions" class="col-md-4 control-label">Resolutions <span class="requiredfield">*</span></label>
                            {!! Form::select('category_id', $mediaResolutions, '', array('id'=>'category_id','placeholder'=>'--Select Resolutions--','class'=>'form-control', 'multiple'=>'true')) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="col-md-offset-4"><a class="pull-right mb-10" href="{{ URL::to('products/add') }}">
                                    <h3 class="btn btn-primary"><b>Upload </b></h3>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection