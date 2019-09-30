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
                <a class="btn btn-success btn-sm">
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </a><br><br>
                <input required type="number" v-model="tableParam.perPage" min="1" @@keyup="recall" @@change="recall" placeholder="Jumlah Per Halaman">
                <input type="text" v-model="tableParam.search" @@keyup="recall" @@change="recall" placeholder="Cari">
              <table class="table table-bordered table-hover" style="width: 100%">
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