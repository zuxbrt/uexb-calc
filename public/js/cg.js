var generated = [];
var possible  = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

function generateCodes(number, length) {
  for ( var i=0; i < number; i++ ) {
    generateCode(length);
  }
}

function generateCode() {
  var text = "";

  for ( var i=0; i < 25; i++ ) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }

  if ( generated.indexOf(text) == -1 ) {
    document.getElementById('code').value = text;
  }else {
    generateCode();
  }
}