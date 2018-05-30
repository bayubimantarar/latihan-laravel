@extends('layouts.app')

@section('title', 'Lokasi Kerja')

@section('content')
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h1>Unit Kerja</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Unit Kerja
				</div>
				<div class="panel-body">
					<p><a href="#modaltambah" class="btn btn-sm btn-primary" role="button" data-toggle="modal">Tambah Unit Kerja</a></p>
					<table class="table table-bordered table-hover" id="unitkerja_table">
						<thead>
							<tr>
								<td>Unit Kerja ID</td>
								<td>Unit Kerja Nama</td>
								<td>Lokasi Kerja Nama</td>
								<td>Opsi</td>
							</tr>
						</thead>
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
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Unit Kerja ID</label>
	            					<input type="text" name="unit_kerja_id" class="form-control" id="unit_kerja_id" />
	            				</div>
	            			</div>
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Unit Kerja Nama</label>
	            					<input type="text" name="unit_kerja_nama" class="form-control" id="unit_kerja_nama" />
	            				</div>
	            			</div>
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Lokasi Kerja ID</label>
	            					<select name="" id="lokasi_kerja_id" class="form-control">
	            						@foreach($elolokasikerja as $item)
	            							<option value="{{ $item->lokasi_kerja_id }}" name="lokasi_kerja_id">{{ $item->lokasi_kerja_nama }}</option>
		            					@endforeach
	            					</select>
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
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Unit Kerja ID</label>
	            					<input type="text" name="edit_unit_kerja_id" class="form-control" id="edit_unit_kerja_id" />
	            					<input type="hidden" id="edit_id" />
	            				</div>
	            			</div>
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Unit Kerja Nama</label>
	            					<input type="text" name="unit_kerja_nama" class="form-control" id="edit_unit_kerja_nama" />
	            				</div>
	            			</div>
	            			<div class="row">
	            				<div class="col-md-12">
	            					<label for="">Lokasi Kerja ID</label>
	            					<select name="" id="edit_lokasi_kerja_id" class="form-control">
	            						@foreach($elolokasikerja as $item)
	            							<option value="{{ $item->lokasi_kerja_id }}" name="lokasi_kerja_id">{{ $item->lokasi_kerja_nama }}</option>
		            					@endforeach
	            					</select>
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
			url: '/unitkerja/singledata/'+id,
			method: 'get',
			dataType: 'json',
			success: function(result){
        		$('#modaledit').modal('show');
				$('#edit_id').val(result.id);
				$('#edit_unit_kerja_id').val(result.unit_kerja_id);
				$('#edit_unit_kerja_nama').val(result.unit_kerja_nama);
			}
		});
	}

	function delete_data(id) {
		$('#modaldelete').modal('show');
		$('#delete_id').val(id);
	}

	$(document).ready(function(){
		$("#unitkerja_table").DataTable({
			serverSide: true,
	            processing: true,
	            ajax: '/unitkerja/data',
	            columns: [
	                {data: 'unit_kerja_id'},
	                {data: 'unit_kerja_nama'},
	                {data: 'lokasi_kerja_nama'},
	                {data: 'action', orderable: false, searchable: false}
	            ]
	        });
		});

		$("#save").click(function(){
			var unit_kerja_id 		= $("#unit_kerja_id").val();
			var unit_kerja_nama 	= $("#unit_kerja_nama").val();
			var lokasi_kerja_id 	= $("#lokasi_kerja_id option:selected").val();

			$.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				url: '/unitkerja/store',
				method: 'post',
				dataType: 'json',
				data: {"unit_kerja_id" : unit_kerja_id, "unit_kerja_nama" : unit_kerja_nama, "lokasi_kerja_id" : lokasi_kerja_id},
				success: function(result){
					console.log(result);
					alert('Data berhasil disimpan!');
					window.location.reload();
				}
			});
		});

		$("#update").click(function(){
			var id 					= $("#edit_id").val();
			var unit_kerja_id 		= $("#edit_unit_kerja_id").val();
			var unit_kerja_nama 	= $("#edit_unit_kerja_nama").val();
			var lokasi_kerja_id 	= $("#edit_lokasi_kerja_id").val();

			$.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				url: '/unitkerja/update',
				method: 'put',
				dataType: 'json',
				data: {"id" : id, "unit_kerja_id" : unit_kerja_id, "unit_kerja_nama" : unit_kerja_nama, "lokasi_kerja_id" : lokasi_kerja_id},
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
				url: '/unitkerja/destroy/'+id,
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