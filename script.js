//Using 'newOL' and 'newUL' as last parameter of ordered and unordered list.
function func(command){
	document.execCommand(command,false,null);
}

function link(){
	var linkURL = prompt('Enter the URL for this link:', 'https://www.'); 
	if(linkURL.trim() != 'https://www.' && linkURL.trim() != ''){
		document.execCommand('CreateLink', false, linkURL);
	}
}

function color(){
	var color = prompt('Add a colorname or a hexadecimal color code:', ''); 
	document.execCommand('ForeColor',false,color);
}

function setImage(){
	document.execCommand('formatblock', false, 'figure');
	var imgSrc = prompt('Enter image location', ''); 
	if(imgSrc != null){
		document.execCommand('insertimage', false, imgSrc);
	}
}

function setTag(tagName){
	document.execCommand('formatblock', false, tagName);
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            input.nextElementSibling.setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

var inputFiles = document.getElementById('image');
inputFiles.addEventListener('change', function(){
	readURL(this);
});


document.getElementById('description').addEventListener('keydown',function(e) {
    if (e.key === "Enter") {
      document.execCommand('insertHTML', false, '<br>');
      return false;
    }
  });

