@extends('layouts.app')

@section('title', 'Lokasi Kerja')

@section('content')
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h1>Lokasi Kerja</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lokasi Kerja
				</div>
				<div class="panel-body">
					<p><a href="#modaltambah" class="btn btn-sm btn-primary" role="button" data-toggle="modal">Tambah Lokasi Kerja</a></p>
					<table class="table table-bordered table-hover" id="lokasikerja_table">
						<thead>
							<tr>
								<td>Lokasi Kerja ID</td>
								<td>Lokasi Kerja Nama</td>
								<td>Opsi</td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal tambah -->
	<div id="modaltambah" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Confirmation</h4>
	            </div>
	            <div class="modal-body">
	            	<form action="">
	            		<div class="form-group">
	            			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Lokasi Kerja ID</label>
	            					<input type="text" name="lokasi_kerja_id" class="form-control" id="lokasi_kerja_id" />
	            				</div>
	            			</div>
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Lokasi Kerja Nama</label>
	            					<input type="text" name="lokasi_kerja_nama" class="form-control" id="lokasi_kerja_nama" />
	            				</div>
	            			</div>
	            		</div>
	            	</form>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-primary" id="save">Save</button>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- Modal Edit -->
	<div id="modaledit" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Confirmation</h4>
	            </div>
	            <div class="modal-body">
	            	<form action="">
	            		<div class="form-group">
	            			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Lokasi Kerja ID</label>
	            					<input type="hidden" name="edit_id" class="form-control" id="edit_id" />
	            					<input type="text" name="lokasi_kerja_id" class="form-control" id="edit_lokasi_kerja_id" />
	            				</div>
	            			</div>
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Lokasi Kerja Nama</label>
	            					<input type="text" name="lokasi_kerja_nama" class="form-control" id="edit_lokasi_kerja_nama" />
	            				</div>
	            			</div>
	            		</div>
	            	</form>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-primary" id="update">Save</button>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- Modal Edit -->
	<div id="modaldelete" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Confirmation</h4>
	            </div>
	            <div class="modal-body">
	            	<input type="hidden" name="id" id="delete_id">
	            	Yakin menghapus data ini?
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-danger" id="delete">Delete</button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@push('js')
<script>
	function edit(id){
		console.log(id);
		$.ajax({
			url: '/lokasikerja/singledata/'+id,
			method: 'get',
			dataType: 'json',
			success: function(result){
				console.log(result.lokasi_kerja_id);
        		$('#modaledit').modal('show');
				$('#edit_id').val(result.id);
				$('#edit_lokasi_kerja_id').val(result.lokasi_kerja_id);
				$('#edit_lokasi_kerja_nama').val(result.lokasi_kerja_nama);
			}
		});
	}

	function delete_data(id) {
		$('#modaldelete').modal('show');
		$('#delete_id').val(id);
	}

	$(document).ready(function(){

		$("#lokasikerja_table").DataTable({
				serverSide: true,
	            processing: true,
	            ajax: '/lokasikerja/data',
	            columns: [
	                {data: 'lokasi_kerja_id'},
	                {data: 'lokasi_kerja_nama'},
	                {data: 'action', orderable: false, searchable: false}
	            ]
	        });
		});

		$("#save").click(function(){
			var lokasi_kerja_id 	= $("#lokasi_kerja_id").val();
			var lokasi_kerja_nama 	= $("#lokasi_kerja_nama").val();
			
			$.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				url: '/lokasikerja/store',
				method: 'post',
				dataType: 'json',
				data: {"lokasi_kerja_id" : lokasi_kerja_id, "lokasi_kerja_nama" : lokasi_kerja_nama},
				success: function(result){
					console.log(result);
					if(result == "Failed"){
						alert('Lokasi Kerja sudah ada!');	
					}else if(result == "Validasi"){
						alert('Form harap diisi!');
					}else{
						alert('Data berhasil disimpan!');
						window.location.reload();
					}
				}
			});
		});

		$("#update").click(function(){
			var id 					= $("#edit_id").val();
			var lokasi_kerja_id 	= $("#edit_lokasi_kerja_id").val();
			var lokasi_kerja_nama 	= $("#edit_lokasi_kerja_nama").val();
			$.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				url: '/lokasikerja/update',
				method: 'put',
				dataType: 'json',
				data: {"id" : id, "lokasi_kerja_id" : lokasi_kerja_id, "lokasi_kerja_nama" : lokasi_kerja_nama},
				success: function(result){
					console.log(result);
					alert('Data berhasil diupdate!');
					window.location.reload();
				}
			});
		});

		$("#delete").click(function(){
			var id = $("#delete_id").val();

			$.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				url: '/lokasikerja/destroy/'+id,
				method: 'delete',
				dataType: 'json',
				success: function(result){
					alert('Data berhasil dihapus!');
					window.location.reload();
				}
			});
		});
</script>
@endpush