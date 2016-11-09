@extends('admin.master')
@section('content')
<style>
    .content-wrapper, .right-side{
            background-color: #e0e0e0 !important;
    }
</style>
<div class="content-wrapper">
<section class="content-header">
  <h1>Tüm Dosyalar</h1>
</section>
<section class="content">
	<div class="row">
            <iframe  frameborder="0" style="display: block;  background: #000; border: none; height: 81vh; width: 100%;" src="/finder"></iframe>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection