$( document ).ready(function() {
    
    $('#delegations_create_Btn').click(function(e){
      e.preventDefault();
      var form = $('#delegation_create_form').serialize();

      $.ajax({
              url: '/admin/delegations/ajaxDelegationAdd',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: form,
              prcessData:false,
              success: function(data){

                if(data==1){
                  alert('Ekleme Başarılı');
                }
                if(data==2){
                  alert('İsim Eklemeyi Unutmayın');
                }
                if(data>2 || data<1){
                  alert('belirlenemeyen Hata');
                }
              },
              error: function(jqXHR, textStatus, err){}
            });
    });

    $('#delegations_update_Btn').click(function(e){
      e.preventDefault();
      var form=$('#delegation_update_form').serialize();

      $.ajax({
              url: '/admin/delegations/ajaxDelegationEdit',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: form,
              prcessData:false,
              success: function(data){
                if(data==1){
                  alert('İşlem Tamam');
                }
              },
              error: function(jqXHR, textStatus, err){}
            });

    });

    $('#customers_create_Btn').click(function(e){
      e.preventDefault();
       for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
      var form=$('#customers_create_form').serialize();

      $.ajax({
              url: '/admin/customers/ajaxCustomersCreate',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: form,
              prcessData:false,
              success: function(data){
                if(data==1){
                  alert('İşlem Tamam');
                }
              },
              error: function(jqXHR, textStatus, err){}
            });
    });

    $('#customers_edit_Btn').click(function(e){
      e.preventDefault();
       for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
      var form=$('#customers_edit_form').serialize();

      $.ajax({
              url: '/admin/customers/ajaxCustomersEdit',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: form,
              prcessData:false,
              success: function(data){
                console.log(data);
                if(data==1){
                  alert('İşlem Tamam');
                }
              },
              error: function(jqXHR, textStatus, err){}
            });
    });

    $('#createParentModul').click(function(e){
      e.preventDefault();

     $div='<div class="col-lg-12"><div class="col-lg-3">';
      $div+=' <label>Modül Adı</label></div>';
      $div+=" <div class='col-lg-9'><label><input type='text' class='form-control' name='name' /></label>";
      $div+='  </div></div>';
      $div+='<div class="col-lg-12"><div class="col-lg-3">';      
      $div+='  <label>Modül URL</label></div><div class="col-lg-9">';
      $div+="  <label><input type='text' class='form-control' name='url'  /></label>";
      $div+='  </div></div>';
      $div+='<input type="hidden" name="parent_id" value="1">';
      $div+='<hr color="#ddd" size="1" width:"100%">';

      $('.parentModulDiv').append($div);
    });

    $('#modules_create_Btn').click(function(e){
      e.preventDefault();

      var form=$('#modules_create_form').serializeArray();


      $.ajax({
              dataType: "json",
              url: '/admin/modules/ajaxModulesCreate',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: {0:JSON.stringify(form)},
              prcessData:false,
              success: function(data){
                console.log(data);
                
              },
              error: function(jqXHR, textStatus, err){}
            });
    });

    $('#modules_update_Btn').click(function(e){
      e.preventDefault();

      var form=$('#modules_update_form').serializeArray();


      $.ajax({
              dataType: "json",
              url: '/admin/modules/ajaxModulesEdit',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: {0:JSON.stringify(form)},
              prcessData:false,
              success: function(data){
                console.log(data);
                
              },
              error: function(jqXHR, textStatus, err){}
            });
    })
});
