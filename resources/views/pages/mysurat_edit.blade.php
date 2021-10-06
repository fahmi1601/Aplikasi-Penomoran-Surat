@extends('layouts.main')

@section('title', 'Edit Penomoran Surat')

@section('content')

<div class="page-header">
    <h1>
        Edit Penomoran Surat
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            {{ $surat->nomor_surat.$surat->takahs->takah.$surat->tahun }}
        </small>
        <div class="pull-right">
            <a href="/mysurat" class="btn btn-primary btn-sm">
                <i class="ace-icon fa fa-arrow-left bigger-125"></i>
                Kembali
            </a>
        </div>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/mysurat/edit/{{ $surat->id }}" class="form-horizontal" role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="takah"> Takah <span class="red">*</span></label>
                <div class="col-sm-10">
                    <select name="takah" id="takah" class="col-sm-3">
                        <option></option>
                        @foreach($takah as $data)
                        <option value="{{ $data->id }}"
                            @if($data->id == $surat->id_takah)
                                selected
                            @endif
                            >{{ $surat->nomor_surat.$data->takah.date('Y') }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="kepada"> Kepada <span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="kepada" id="kepada" class="col-sm-6" placeholder="Kepada" value="{{ $surat->kepada }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="perihal"> Perihal <span class="red">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="perihal" id="perihal" class="col-sm-6" placeholder="Perihal" value="{{ $surat->perihal }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="tembusan"> Tembusan </label>
                <div class="col-sm-10">
                    <input type="text" name="tembusan" id="tembusan" class="col-sm-6" placeholder="Tembusan" value="{{ $surat->tembusan }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="keterangan"> Keterangan </label>
                <div class="col-sm-10">
                    <input type="text" name="keterangan" id="keterangan" class="col-sm-6" placeholder="Keterangan" value="{{ $surat->keterangan }}" />
                </div>
            </div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-2 col-sm-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection