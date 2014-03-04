
  $(document).ready(function() {
    $(document).ajaxSend(function(event, request, settings) {
      console.log("ajaxsend");
        $('#loading-indicator').show();
    });

    $(document).ajaxComplete(function(event, request, settings) {
      console.log("ajaxcomplete");
        $('#loading-indicator').hide();
    });
    $('#form1').validate({
          rules: {
              input4: {
                  required: true
              },
              input5: {
                  required: true,
                  email: true
              },
              input6: {
                  required: true,
              },
              textarea1: {
                  required: true
              }
          },
          highlight: function (element) {
              $(element).closest('.control-group')
                  .removeClass('success').addClass('error');
          },
          success: function (element) {
              element.addClass('valid').closest('.control-group')
                  .removeClass('error').addClass('success');
          }
    });
    $('#modal1 form').validate({  // initialize plugin
          rules: {
              input13: {
                  required: true
              },
              input14: {
                  required: true,
                  email: true
              },
              input15: {
                  required: true,
              },
              textarea2: {
                  required: true
              }
          },
          highlight: function (element) {
              $(element).closest('.control-group')
                  .removeClass('success').addClass('error');
          },
          success: function (element) {
              element.addClass('valid').closest('.control-group')
                  .removeClass('error').addClass('success');
          },
          submitHandler: function (form) {
              $.ajax({
                  type: $(form).attr('method'),
                  url: "ajax.php",
                  data: $(form).serialize(),
                  success: function (data, status, xhr) {
                      console.log("success");
                      $("#alert2").text(xhr.statusText).show();
                      window.setTimeout(function(){
                       $('#modal1').modal('hide');
                      }, 1000);
                  },
                  error: function(data, status, xhr){
                    console.log("error");
                    $("#alert2").text(data.statusText).show();
                  },
              });
              return false; // ajax used, block the normal submit
          }
    });
	});