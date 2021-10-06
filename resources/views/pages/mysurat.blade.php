@extends('layouts.main')

@section('title', 'My Surat')


@section('content')
<div class="page-header">
    <h1>
        Data Penomoran Surat
        <div class="pull-right">
            <a href="/mysurat/new" class="btn btn-success btn-sm">
                <i class="ace-icon fa fa-pencil-square-o bigger-125"></i>
                New Data
            </a>
        </div>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        @if (Session::has('pesan'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <strong>
                <i class="ace-icon fa fa-check"></i>
                Well done!
            </strong> 
            {{ Session::get('pesan') }}
            <br />
        </div>
        @endif
        <div class="table-header">
            <i class="menu-icon fa fa-envelope"></i> Data Penomoran Surat
        </div>

        <!-- div.table-responsive -->

        <!-- div.dataTables_borderWrap -->
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
                        <th></th>
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
                        <td class="center">
                            @if($data->pembuat == Session::get('nik'))
                                <a href="/mysurat/edit/{{ $data->id }}" class="btn btn-minier btn-yellow">Edit</a>
                            @endif
                        </td>
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
					  { "bSortable": true },
					  null, null,null, null, null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					"bPaginate": true,
			
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