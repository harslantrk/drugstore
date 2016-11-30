@if(isset($reports[0]))
    <div class="modal-dialog" role="document">
        <form role="form" action="{{URL::to('/admin/bez/reports/ReceiptSave')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="patient_id" value="{{ $reports[0]->patient_id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Yeni Reçete</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputKonu">Rapor</label>
                            <select class="form-control select2" style="width:100%;" name="report_id">
                                <option disabled selected>Lütfen Seçiniz</option>
                                @foreach($reports as $report)
                                    <option value="{{$report->id}}">{{$report->report_no}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Başlangıç Tarihi</label>
                            <input class="form-control" type="date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="finish_date">Bitiş Tarihi</label>
                            <input class="form-control" type="date" name="finish_date">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Miktar</label>
                            <input class="form-control" type="number" name="quantity" id="quantity">
                        </div>
                        <div class="form-group">
                            <label for="unitPrice">Birim Fiyat</label>
                            <input class="form-control" type="number" name="unit_price" id="unit_price" onkeyup="hesaplama()">
                        </div>
                        <div class="form-group">
                            <label for="sum">Tutar</label>
                            <input class="form-control" type="number" name="sum" id="sum">
                        </div>
                        <div class="form-group">
                            <label for="total">Genel Toplam (KDV %18)</label>
                            <input class="form-control" type="number" name="total" id="total">
                        </div>
                        <div class="form-group">
                            <label for="detail">Açıklama</label>
                            <input class="form-control" type="text" name="detail">
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Reçeteyi Ekle</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
    @endif

@if(isset($receipts[0]))
    <!-- Ödeme Yapma Modeli -->
    <div class="modal-dialog" role="document">
        <form role="form" action="{{URL::to('/admin/bez/reports/Paymentsave')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="patient_id" id="patient_id" value="{{ $receipts[0]->patient_id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Yeni Ödeme</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="start_date">Reçete Seç</label>
                            <select class="form-control select2" style="width: 100%;" name="receipt_id">
                                <option disabled selected>Reçete Seçiniz</option>
                                @foreach($receipts as $receipt)
                                    <option value="{{$receipt->id}}">{{$receipt->detail}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="finish_date">Ödeme Tarihi</label>
                            <input class="form-control" type="date" name="payment_date">
                        </div>
                        <div class="form-group">
                            <label for="reportNo">Ödeme Yapan</label>
                            <input class="form-control" type="text" name="payment_person">
                        </div>
                        <div class="form-group">
                            <label for="reportNo">Ödeme Tutarı</label>
                            <input class="form-control" type="number" name="payment">
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Ödemeyi Yap</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
@endif
