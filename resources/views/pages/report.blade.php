@extends('layouts.main')

@section('title', 'Report')

@section('plugincss')
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}" />
@endsection

@section('content')
<div class="page-header">
    <h1>
        Report
        <!--
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Last 5 Data
        </small>-->
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form action="/report" class="form-horizontal" role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-1 control-label no-padding-right" for="tanggal1"> Tanggal </label>
                <div class="col-sm-3">
                    <div class="input-daterange input-group">
                        <input type="text" class="input-sm form-control" name="tanggal1" id="tanggal1" placeholder="Start" value="{{ $tgl1 }}" autocomplete="off">
                        <span class="input-group-addon">
                            <i class="fa fa-exchange"></i>
                        </span>
                        <input type="text" class="input-sm form-control" name="tanggal2" id="tanggal2" placeholder="End" value="{{ $tgl2 }}" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label no-padding-right" for="pembuat"> Dibuat Oleh </label>
                <div class="col-sm-3">
                    <input type="text" name="pembuat" id="pembuat" class="col-sm-12" placeholder="Dibuat Oleh (NIK)" value="{{ $owner }}" autocomplete="off" />
                </div>
            </div>
            <div class="col-md-offset-1 col-sm-3">
                <button class="btn btn-info" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Show
                </button>
            </div>
        </form>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
<br />
<div class="row">
    <div class="col-sm-12">
        @if($surat !== null)
        <div class="table-header">
            <i class="menu-icon fa fa-envelope"></i> Data Penomoran Surat
            <div class="pull-right" style="margin-right: 10px">
                <form action="/report/export" method="POST" role="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="tanggal1" value="{{ $tgl1 }}">
                    <input type="hidden" name="tanggal2" value="{{ $tgl2 }}">
                    <input type="hidden" name="pembuat" value="{{ $owner }}">
                    <button type="submit" class="btn btn-success btn-minier"><i class="ace-icon bigger-120 fa fa-download"></i> Export to Excel</button>
                </form>
            </div>
        </div>
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Kepada</th>
                        <th>Perihal</th>
                        <th>Tembusan</th>
                        <th>Keterangan</th>
                        <th>Dibuat Oleh</th>
                        <th>Tgl Dibuat</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($surat as $data)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $data->nomor_surat.$data->takahs->takah.$data->tahun }}</td>
                        <td>{{ $data->kepada }}</td>
                        <td>{{ $data->perihal }}</td>
                        <td>{{ $data->tembusan }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->pembuat }}</td>
                        <td>{{ $data->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection

@section('pluginjquery')
        <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
        <script type="text/javascript">
			jQuery(function($) {
                $('.input-daterange').datepicker({autoclose:true, format:'yyyy-mm-dd'});
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: true,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null,null, null,
					  { "bSortable": true }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			})
		</script>
@endsection