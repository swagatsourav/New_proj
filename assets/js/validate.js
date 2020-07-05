jQuery(document).ready(function($) {
  "use strict";
  
  var input = $('#customFile');
  var span = $('.custom-file-label span');

  const fileTypes = [
  "jpg","jpeg","png","gif","tiff","bmp","pdf","doc","docx","xlsx",
  "xls","xlsm","pptx","pptm","ppt","zip","rar","7z"
  ];


  $(".custom-file").on('click', 'p#remove' , function () { 
          
          input.siblings(".custom-file-label").removeClass("selected");
          $(".custom-file-label").html('<span>Choose a file here</span>');
          $(this).slideUp();
          $(this).detach();
          input.val('');
    });

  
  function returnFileSize(number) {
      if(number > 2097152){
        return false;
      }
      else
        return true;            
  }

  function validFileType(type) {
    
    return fileTypes.includes(type.toLowerCase());
  }

  function getSrc(file){
    
    let image_arr = ["jpg","jpeg","png","gif","tiff","bmp"];
    let word_arr = ["doc","docx"];
    let xl_arr = ["xlsx","xls","xlsm"];
    let ppt_arr = ["pptx","pptm","ppt"];
    let compress_arr = ["zip","rar","7z"]
    let file_type = file.name.split(".").pop().toLowerCase();
    
    if ( image_arr.includes(file_type) ) {          
      return URL.createObjectURL(file);          
    }    
    else if ( word_arr.includes(file_type) ){
      return './assets/img/file_upload_icon/word.png';
    }
    else if ( xl_arr.includes(file_type) ){
      return "./assets/img/file_upload_icon/xl.png";
    }
    else if  ( ppt_arr.includes(file_type) ) {
      return "./assets/img/file_upload_icon/ppt.png";
    }
    else if  ( compress_arr.includes(file_type) ) {
      return "./assets/img/file_upload_icon/comp.png";
    }
    else if ( file_type === 'pdf'  ) {
      return "assets/img/file_upload_icon/pdf.png";
    }       
    else 
      return "./assets/img/file_upload_icon/other.svg";
  }

  function updateImageDisplay() {
    
    var fileName = input.val().split("\\").pop();
    
    if (fileName){
      
        const file = input.prop('files')[0];
          

        if(validFileType(fileName.split('.').pop())) {
          
          if (returnFileSize(file.size)){              
              input.siblings(".custom-file-label").addClass("selected");
              let src = getSrc(file); 
              
              input.siblings(".custom-file-label").html('<img src="'+ src +'" alt="">' +'<span>'+ fileName +'</span>')
              if ( $(".custom-file p#remove").length == 0 ) {
                input.siblings(".custom-file-label").after('<p id="remove">Remove file</p>');
                $('p#remove').slideDown();
              }
              $('.custom-file-label.selected img').slideDown();

          }
          else{
              input.siblings(".custom-file-label").removeClass("selected");
              $(".custom-file-label").html('<span style="color:red;" id="invalid">Selected file size:'+ (file.size/1048576).toFixed(2) + 'MB'+', exceeds max allowed file size. </span>');
              $('p#remove').slideUp();
              $(".custom-file p#remove").detach();
              input.val('');
          }
        }

        else {
          input.siblings(".custom-file-label").removeClass("selected");
          $(".custom-file-label").html('<span style="color:red;" id="invalid">Invalid file type.Please see the allowed file types below.</span>');
          $('p#remove').slideUp();
          $(".custom-file p#remove").detach();
          input.val('');
        }       
      }

    else{
        input.siblings(".custom-file-label").removeClass("selected");
        $(".custom-file-label").html('<span>No file choosen</span>');
        $('p#remove').slideUp();
        $(".custom-file p#remove").detach();
        input.val('');
    }
  }
       
  $(".custom-file-input").on("change", function() {
        
        updateImageDisplay();
    });

  //Contact form
  $('form.submit-email-form').submit(function() {
  
    var f = $(this).find('.form-group'),
      ferror = false,
      emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

    f.children('input').each(function() { // run all inputs
     
      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;

          case 'email':
            if (!emailExp.test(i.val())) {
              ferror = ierror = true;
            }
            break;

          case 'checked':
            if (! i.is(':checked')) {
              ferror = ierror = true;
            }
            break;

          case 'regexp':
            exp = new RegExp(exp);
            if (!exp.test(i.val())) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    f.children('textarea').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validate').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    if (ferror) return false;
    else var str = $(this).serialize();

    var this_form = $(this);
    var action = $(this).attr('action');

    if( ! action ) {
      this_form.find('.loading').slideUp();
      this_form.find('.error-message').slideDown().html('The form action property is not set!');
      
      return false;
    }
    
    this_form.find('.sent-message').slideUp();
    this_form.find('.error-message').slideUp();
    this_form.find('.loading').slideDown();
    var form_data = new FormData(this);
    // console.log(form_data);
    // console.log(str);
    $.ajax({
      type: "POST",
      url: action,
      data: form_data,
      // dataType: 'json',
      contentType: false,
      cache: false,
      processData:false,
      success: function(msg) {
        if (msg == 'OK') {
          this_form.find('.loading').slideUp();
          this_form.find('.sent-message').slideDown();
          this_form.find("input:not(input[type=submit]), textarea").val('');
          input.siblings(".custom-file-label").removeClass("selected");
          $(".custom-file-label").html('<span>Choose a file here</span>');
          $('p#remove').slideUp();
          $(".custom-file p#remove").detach();
          
        } else {
          this_form.find('.loading').slideUp();
          this_form.find('.error-message').slideDown().html(msg);
        }
      }
    });
    return false;
  });

});
