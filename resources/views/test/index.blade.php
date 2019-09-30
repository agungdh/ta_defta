@extends('template.template')

@section('title')
Test
@endsection

@section('nav')
@include('calondpd.nav')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box animated slideInLeft box-primary" style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
            <div class="box-header">
              <h3 class="box-title">Data Test</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default" @@click="changeFormState(true, 'Tambah Data')">
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </button><br><br>
                <input required type="number" v-model="tableParam.perPage" min="1" @@keyup="recall" @@change="recall" placeholder="Jumlah Per Halaman">
                <input type="text" v-model="tableParam.search" @@keyup="recall" @@change="recall" placeholder="Cari">
              <table class="table table-bordered table-hover table-responsive" style="width: 100%">
                <thead>
                    <tr>
                      <th @@click="sort(1)">Text 1 @{{tableSorting.colNo == 1 ? tableSorting.asc ? 'V' : '^' : ''}}</th>
                      <th @@click="sort(2)">Text 2 @{{tableSorting.colNo == 2 ? tableSorting.asc ? 'V' : '^' : ''}}</th>
                      <th @@click="sort(3)">Text 3 @{{tableSorting.colNo == 3 ? tableSorting.asc ? 'V' : '^' : ''}}</th>
                      <th>Proses</th>
                    </tr>
                </thead>
                <tbody>
                  <tr v-for="item in tableData">
                    <td>@{{ item.text1 }}</td>
                    <td>@{{ item.text2 }}</td>
                    <td>@{{ item.text3 }}</td>
                    <td>
                      <button data-toggle="modal" data-target="#modal-default" @@click="changeFormState(false, 'Ubah Data')">Ubah</button>
                      <button>Hapus</button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div>
                Menampilkan @{{tableInfo.from}} sampai @{{tableInfo.to}} dari @{{tableInfo.total}} data
                <button @@click="firstPage" v-bind:disabled="!tableNav.first"><<</button>
                <button @@click="prevPage" v-bind:disabled="!tableNav.prev"><</button>
                <input required type="number" min="1" @@keyup="recall" @@change="recall" v-bind:max="tableParam.maxPage" v-model="tableParam.page">
                Of @{{tableParam.maxPage}}
                <button @@click="nextPage" v-bind:disabled="!tableNav.next">></button>
                <button @@click="lastPage" v-bind:disabled="!tableNav.last">>></button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">@{{formState}}</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">

          <div :class="{'form-group': true, 'has-error': formDataErrors.text1 != ''}">
            <div data-toggle="tooltip" v-bind:title="formDataErrors.text1">
              <label>Text 1</label>
            </div>
            <div data-toggle="tooltip" v-bind:title="formDataErrors.text1">
              <div v-bind:title="formDataErrors.text1">
                <input type="text" class="form-control" v-model="formData.text1" placeholder="Isi Text 1">
              </div>
            </div>
          </div>

          <div :class="{'form-group': true, 'has-error': formDataErrors.text2 != ''}">
            <div data-toggle="tooltip" v-bind:title="formDataErrors.text2">
              <label>Text 2</label>
            </div>
            <div data-toggle="tooltip" v-bind:title="formDataErrors.text2">
              <div v-bind:title="formDataErrors.text2">
                <input type="text" class="form-control" v-model="formData.text2" placeholder="Isi Text 2">
              </div>
            </div>
          </div>

          <div :class="{'form-group': true, 'has-error': formDataErrors.text3 != ''}">
            <div data-toggle="tooltip" v-bind:title="formDataErrors.text3">
              <label>Text 3</label>
            </div>
            <div data-toggle="tooltip" v-bind:title="formDataErrors.text3">
              <div v-bind:title="formDataErrors.text3">
                <input type="text" class="form-control" v-model="formData.text3" placeholder="Isi Text 3">
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @@click="save">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function hapus(id) {
    swal({
      title: "Yakin Hapus ???",
      text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !!!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Hapus",
    }, function(){
      $("#formHapus" + id).submit();
    });
}
</script>
@endsection

@section('jsvue')
<script src="{{ADHhelper::mix('compiled/js/test.js')}}"></script>
@endsection