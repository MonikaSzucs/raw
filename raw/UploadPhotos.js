var files = document.getElementById("files");



function handleFileSelect(evt) {
	
	
	//
    var files = evt.target.files;
		console.log(files.value)
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = 
          [
            '<img style="height: 120px; border: 1px solid #000; margin: 5px"; src="', 
            e.target.result,
            '" title="', escape(theFile.name), 
            '"/>'
          ].join('');
          
          document.getElementById('list').insertBefore(span, null);
		  
		  console.log(document.getElementById('list'));
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
  
  
 /* 
$('#contactForm').submit(function () {
 console.log("submitting");
		var form_data = new FormData();                  
		form_data.append('file', files.value);
		console.log($(this).serialize());
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: form_data,
            success: function (data) {
                $("#form_output").html(data);
				console.log("SUCCESS: " + data);
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
				console.log("FAIL: " + errorThrown);
            }
        });
		console.log("submitted");
		return false;
});
*/

/*function submitForm() {
 console.log("submitting");
		var form_data = new FormData();                  
		form_data.append('file', files.value);
		console.log($(this).serialize());
        $.ajax({
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: form_data,
            success: function (data) {
                $("#form_output").html(data);
				console.log("SUCCESS: " + data);
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
				console.log("FAIL: " + errorThrown);
            }
        });
		console.log("submitted");
		return false;
}*/

function sendContactForm(){
    $("#messageSent").slideDown("slow");
    setTimeout('$("#messageSent").slideUp();$("#contactForm").slideUp("slow")', 2000);
}