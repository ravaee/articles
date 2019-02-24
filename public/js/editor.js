var oDoc, sDefTxt;

function initDoc() {
  oDoc = document.getElementById("editor");
  sDefTxt = oDoc.innerHTML;
  if (document.compForm.switchMode.checked) { setDocMode(true); }
}

function formatDoc(sCmd, sValue) {

  if (validateMode()) {
    document.execCommand(sCmd, false, sValue); oDoc.focus(); 

    if(sValue == 'j'){
      var listId = window.getSelection().focusNode.parentNode;
      $(listId).addClass("editor_p");
    }
  } 
}


function getPlainText(){

  if (validateMode()) {
    oDoc.focus(); 

    document.html($(document).text());
  }   
}

function makeImageFull(img){

    var id = "rand" + Math.random();
    img = "<img src='" + img + "' id=" + id + ">";
    
    if (validateMode()) {
      document.execCommand("insertHTML", false, img);
    }

    var newImg = document.getElementById(id);
    newImg.className += " editor_img "
}

function makeImageHalf(img){
  
    var id = "rand" + Math.random();
    img = "<img src='" + img + "' id=" + id + ">";
    
    if (validateMode()) {
      document.execCommand("insertHTML", false, img);
    }

    var newImg = document.getElementById(id);
    newImg.className += " editor_img_half "
}

function validateMode() {
  if (!document.compForm.switchMode.checked) { return true ; }
  alert("Uncheck \"Show HTML\".");
  oDoc.focus();
  return false;
}

function setDocMode(bToSource) {
  var oContent;
  if (bToSource) {
    oContent = document.createTextNode(oDoc.innerHTML);
    oDoc.innerHTML = "";
    var oPre = document.createElement("pre");
    oDoc.contentEditable = false;
    oPre.id = "sourceText";
    oPre.contentEditable = true;
    oPre.appendChild(oContent);
    oDoc.appendChild(oPre);
    document.execCommand("defaultParagraphSeparator", false, "div");
  } else {
    if (document.all) {
      oDoc.innerHTML = oDoc.innerText;
    } else {
      oContent = document.createRange();
      oContent.selectNodeContents(oDoc.firstChild);
      oDoc.innerHTML = oContent.toString();
    }
    oDoc.contentEditable = true;
  }
  oDoc.focus();
}

function printDoc() {
  if (!validateMode()) { return; }
  var oPrntWin = window.open("","_blank","width=450,height=470,left=400,top=100,menubar=yes,toolbar=no,location=no,scrollbars=yes");
  oPrntWin.document.open();
  oPrntWin.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + oDoc.innerHTML + "<\/body><\/html>");
  oPrntWin.document.close();
}

function getContent(){
  document.getElementById("txtarea").value = document.getElementById("editor").innerHTML;
}

// cover picture


$(document).ready(function() {
  var brand = document.getElementById('logo-id');
  brand.className = 'attachment_upload';
  brand.onchange = function() {
      document.getElementById('fakeUploadLogo').value = this.value.substring(12);
  };

  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
              $('.img-preview').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
  $("#logo-id").change(function() {
      readURL(this);
  });
});


$(document).ready(function() {
  var brand2 = document.getElementById('logo-id2');
  brand2.className = 'attachment_upload';
  brand2.onchange = function() {
      document.getElementById('fakeUploadLogo2').value = this.value.substring(12);
  };

  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
              $('#priv').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
  $("#logo-id2").change(function() {
      readURL(this);
  });
});

$(document).ready(function() {
  initDoc();
});





