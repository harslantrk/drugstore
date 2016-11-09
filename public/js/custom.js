  function deleteCheckedMessages()
  {
    var val = 0 ;
    var deletedItems='';
    var count=0;
    $("input[name='items[]']").each(function() {
      if ($(this).parent().attr("aria-checked") == "true")
      {
        val=$(this).val();
        if(count==0)
          deletedItems=val;
        else
          deletedItems=deletedItems+'_'+val;
        count++;
      } 
    });
    $('#supportPage').load("/admin/supports/deleteMessage/"+deletedItems,
      function() 
      {}); 
      loading = true;
      //location.reload();
  }

  function deleteCheckedSentMessages()
  {
    var val = 0 ;
    var deletedItems='';
    var count=0;
    $("input[name='items[]']").each(function() {
      if ($(this).parent().attr("aria-checked") == "true")
      {
        val=$(this).val();
        if(count==0)
          deletedItems=val;
        else
          deletedItems=deletedItems+'_'+val;
        count++;
      } 
    });
    $('#supportPage').load("/admin/supports/deleteSentMessage/"+deletedItems,
      function() 
      {}); 
      loading = true;
      location.reload();
  }

  function junkCheckedMessages()
  {
    var val = 0 ;
    var junkItems='';
    var count=0;
    $("input[name='items[]']").each(function() {
      if ($(this).parent().attr("aria-checked") == "true")
      {
        val=$(this).val();
        if(count==0)
          junkItems=val;
        else
          junkItems=junkItems+'_'+val;
        count++;
      } 
    });
    $('#supportPage').load("/admin/supports/junkMessage/"+junkItems,
      function() 
      {}); 
      loading = true;
      location.reload();
  }

  function draftCheckedMessages()
  {
    var val = 0 ;
    var draftItems='';
    var count=0;
    $("input[name='items[]']").each(function() {
      if ($(this).parent().attr("aria-checked") == "true")
      {
        val=$(this).val();
        if(count==0)
          draftItems=val;
        else
          draftItems=draftItems+'_'+val;
        count++;
      } 
    });
    $('#supportPage').load("/admin/supports/draftMessage/"+draftItems,
      function() 
      {}); 
      loading = true;
      //location.reload();
  }

  function undoJunkCheckedMessages()
  {
    var val = 0 ;
    var junkItems='';
    var count=0;
    $("input[name='items[]']").each(function() {
      if ($(this).parent().attr("aria-checked") == "true")
      {
        val=$(this).val();
        if(count==0)
          junkItems=val;
        else
          junkItems=junkItems+'_'+val;
        count++;
      } 
    });
    $('#supportPage').load("/admin/supports/undoJunkMessage/"+junkItems,
      function() 
      {}); 
      loading = true;
      location.reload();
  }

  function undoDeleteCheckedMessages()
  {
    var val = 0 ;
    var junkItems='';
    var count=0;
    $("input[name='items[]']").each(function() {
      if ($(this).parent().attr("aria-checked") == "true")
      {
        val=$(this).val();
        if(count==0)
          junkItems=val;
        else
          junkItems=junkItems+'_'+val;
        count++;
      } 
    });
    $('#supportPage').load("/admin/supports/undoDeleteMessage/"+junkItems,
      function() 
      {}); 
      loading = true;
      location.reload();
  }

  function getSearchedMails(keyword="")
  {
    keyword= $("#searchedKeyword").val();
    $('#tableContent').load("/admin/supports/searchedMail/"+keyword, 
      function() 
      {}
    ); 
  }


/*PAGE LOAD*/
  
  function loadSupportPage(page)
  {
    /******* SUPPORTS ELEMENTS *******/
    $('#supportPage').load("/admin/supports/"+page+"/",
      {
        'group_no':page
      }, 
      function() 
      {}
    ); 
    loading = true;
  }

  function loadMessagePage(id)
  {
    /******* SUPPORTS ELEMENTS *******/
    $('#supportPage').load("/admin/supports/show-message/"+id+"/",
      {'group_no':id}, function() {}); 
      loading = true;
  }

  function replyMessage(id)
  {
    /******* SUPPORTS ELEMENTS *******/
    $('#supportPage').load("/admin/supports/replyMessage/"+id+"/",
      {'group_no':id}, function() {}); 
      loading = true;
  }

  function loadSentMessagePage(id)
  {
    /******* SUPPORTS ELEMENTS *******/
    $('#supportPage').load("/admin/supports/show-sentMessage/"+id+"/",
      {'group_no':id}, function() {}); 
      loading = true;
  }