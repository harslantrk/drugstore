@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Takvim
                <small>Kontrol panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Calendar</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Takvim İşlemleri</h3>
                            <div class="box-tools">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="bg-red-gradient"><a href="#"  title="Randevu Ekle" id="createCalendar" data-toggle="modal" data-target="#modalYeniRandevu"><i class="fa  fa-calendar-plus-o"></i> Yeni Randevu</a></li>
                            </ul>
                        </div><!-- /.box-body -->
                    </div><!-- /. box -->
                </div><!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs text-bold">
                            <li class="active"><a href="#calendar" data-toggle="tab" aria-expanded="false">Takvim</a></li>
                            <li class=""><a href="#myevents" data-toggle="tab" aria-expanded="true">Randevularım</a> <span class="badge bg-red">{{$calendars->count()}}</span></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="calendar">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                            <div class="tab-pane" id="myevents">
                                <table id="calendar_Table" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th>Sıra</th>
                                        <th>Başlangıç Tarihi</th>
                                        <th>Bitiş Tarihi</th>
                                        <th>Başlık</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1;?>
                                    @foreach($calendars as $calendar)

                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{\Carbon\Carbon::parse($calendar->start_time)->format('d/m/Y H:i')}}</td>
                                        <td>{{\Carbon\Carbon::parse($calendar->end_time)->format('d/m/Y H:i')}}</td>
                                        <td>{{$calendar->title}}</td>
                                        <td>
                                            <a href="/admin/calendar/deleteCalendar/{{$calendar->id}}" class="button btn btn-success" title="Randevu Güncelle"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php $no++;?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <!-- Randevu Ekleme Modeli -->
    <div class="modal fade" id="modalYeniRandevu" tabindex="-1" role="dialog">

    </div>
    <!-- /.modal -->
    <script type="text/javascript">
        $(document).ready(function() {
            var base_url = '{{ url('/') }}';
            $('#calendar').fullCalendar({
                weekends: true,
                lang:'tr',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: {
                    url: base_url + '/admin/calendar/api',
                    error: function() {
                        alert("cannot load json");
                    }
                }
            });
        });
        $('#createCalendar').click(function () {
            var deger = 'a';
            /*console.log($(this).attr('name'));*/
            $.ajax({
                url: '/admin/calendar/createCalendarModalShow',
                type: 'POST',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                cache: false,
                data: {deger: deger},
                success: function(data){
                    document.getElementById('modalYeniRandevu').innerHTML=data;
                },
                error: function(jqXHR, textStatus, err){}
            });
        });
        function titleBtn() {
            console.log('asd');
            var title = $('#title').val().trim();
            if(title.length >= 5){
                document.getElementById('randevuSaveBtn').removeAttribute('disabled');
            }
        }
    </script>
@endsection