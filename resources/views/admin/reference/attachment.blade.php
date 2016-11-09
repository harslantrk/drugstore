<input id="input-704" name="files[]" type="file" multiple=true class="file" data-upload-url="/admin/attachment-upload"/>
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
        showBrowse: false,
        browseOnZoneClick: true,
        previewFileType: "image",
        browseLabel: "Resim Seç",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        uploadClass: "btn btn-success",
        uploadExtraData: {_token: '{{ csrf_token() }}',dizin:'<?=$dosya['type'];?>',altDizin:'<?=$dosya['id'];?>'},
        deleteExtraData: {_token: '{{ csrf_token() }}',dizin:'<?=$dosya['type'];?>',altDizin:'<?=$dosya['id'];?>'}
    });
</script>
