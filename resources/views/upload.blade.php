@extends('common.layout')

@section('content')
<div class="container">
    <!-- Success and Errors-section -->
    @include('common.messages')

    <div class="row justify-content-center">
        {!!Form::open(array('route' => 'mediaUpload', 'class'=>'form-horizontal col-md-10 col-md-offset-1', 'id'=>'upload_media' , 'enctype' => 'multipart/form-data')) !!}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Upload Media</div>
                <div class="card-body">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="spn_media_name" name="spn_media_name">Upload</span>
                                </div>
                                <div class="custom-file form-group">
                                    <input type="file" class="custom-file-input form-control" id="media_name" name="media_name" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label form-control" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="resolutions" class="col-md-4 control-label">Resolutions <span class="requiredfield">*</span></label>
                            {!! Form::select('resolution_id', $mediaResolutions, '', array('id'=>'resolution_id', 'name'=>'resolution_id[]', 'class'=>'form-control', 'multiple'=>'true')) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group box-footer">
                            <button class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </div>

                <!-- Show last uploaded images -->
                <div class="col-md-4 justify-content-center">
                    @if($mediaUpload)
                    <div class="col-md-4">
                        @if($mediaUpload->uploadedmedias)
                        @forelse($mediaUpload->uploadedmedias as $media)
                        <img width="600" height="300" src="{{asset('uploads/'.$media->name)}}" />
                        @empty
                        <span>No uploads found</span>
                        @endforelse
                        @endif
                    </div>
                    <div class="col-md-6"></div>
                    @endif
                </div>
                <!-- ./Show last uploaded images -->
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @endsection
</div>