<!--
Description         : Tüm dosyaların galeri sistemini yönetmek için import edilen view
Create Author       : Volkan Arslan
Last Update Author  : Volkan Arslan
Create Date         : 14.10.2016 - Cuma 11:25
Last Update Date    : 14.10.2016 - Cuma 11:25
Version             : 1.0 
-->
<input id="input-704" name="files[]" type="file" multiple=true class="file" data-upload-url="/admin/gallery-upload"/>
<input type="hidden" class="gallery_id"/>
<script>
    $("#input-704").fileinput({
        initialPreview: [ <?=$dosya['dosyalar'];?> ],
        initialPreviewConfig: [ <?=$dosya['bilgiler'];?> ],
        initialPreviewAsData: true,
        overwriteInitial: false,
        uploadAsync: true,
        maxFileCount: 50,
        showCaption: false,
        showRemove: false,
        showUpload: true,
        showClose: false,
        elErrorContainer: "",
        showBrowse: true,
        browseOnZoneClick: true,
        browseLabel: "Dosya Seç",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        uploadClass: "btn btn-success",
        uploadExtraData: {_token: '{{ csrf_token() }}',dizin:'<?=$dosya['type'];?>',altDizin:'<?=$dosya['id'];?>'},
        deleteExtraData: {_token: '{{ csrf_token() }}',dizin:'<?=$dosya['type'];?>',altDizin:'<?=$dosya['id'];?>'},
        previewFileIconSettings: {
            'docx': '<i class="fa fa-file-word-o text-primary"></i>',
            'xls': '<i class="fa fa-file-excel-o text-success"></i>',
            'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
            'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
            'zip': '<i class="fa fa-file-archive-o text-muted"></i>'
        }      
    });
</script>
