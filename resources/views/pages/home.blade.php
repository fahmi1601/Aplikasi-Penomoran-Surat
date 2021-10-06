@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1>
        Dashboard
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Last 5 Data
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="table-header">
            <i class="menu-icon fa fa-tachometer"></i> Last 5 Data
        </div>

        <!-- div.table-responsive -->

        <!-- div.dataTables_borderWrap -->
        <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
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
                    @foreach ($last_five as $data)
                    <tr>
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

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('pluginjquery')
        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
        <script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: true,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
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