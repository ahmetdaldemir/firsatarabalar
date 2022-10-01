(function(){

	'use strict';

	// Check for the various File API support.
	if (window.File && window.FileReader && window.FileList && window.Blob){

	} else {
		alert('The File APIs are not fully supported in this browser.');
		return false;
	}

	var reader, files;
    var dropZone    = document.querySelector('.photo-drop');
    var outputTag   = document.querySelector('.selected-photos');

    /**
	 * Event handlers for ReadFile.
	 */

	// Stop reading files.
	function abortRead(){
		reader.abort();
	}

    // FileReader abort Handler
	function abortHandler(e){
		alert('File read Canceled');
	}

    // FileReader Error Handler
	function errorHandler(e){
		switch(e.target.error.code) {
			case e.target.error.NOT_FOUND_ERR:
				alert('File Not Found!');
				break;
			case e.target.error.NOT_READABLE_ERR:
				alert('File is not readable');
				break;
			case e.target.error.ABORT_ERR:
				break; // noop
			default:
				alert('An error occurred reading this file.');
		}
	}

    // Display the progress of FileReading.
	function progressHandler(e){
		if (e.lengthComputable){
			var loaded = Math.round((e.loaded / e.total) * 100);
			var zeros = '';

			// Percent Loaded in string
			if (loaded >= 0 && loaded < 10) zeros = '00';
			else if (loaded < 100) zeros = '0';

			// Display progress in 3-digit and increase the bar length.
			progress.textContent = zeros + loaded.toString();
			progressBar.style.width = loaded + '%';

		}
	}

	function FileListItems(files){
		var b = new DataTransfer()
		for (var i = 0, len = files.length; i<len; i++) b.items.add(files[i])
		return b.files
	}

    // Event after loading a file completed (Append thumbnail.)
	function loadHandler( i, theFile ) {

		let selected, f;
			selected = ( i < 1 ) ? "true" : "false";

		return function(e){

			if( $(".selected-photos .file").not('.appended').length > 0 ){

				var item = $(".selected-photos .file").not('.appended')[0];
				$(item).css("background-image", "url("+e.target.result+")").addClass("appended");

				let f = $("<input />", {
					id: "file" + i,
					type: "file",
					name: "im[]",
					class: "file_input",
					accept: "image/*",
					hidden: ''
				}).appendTo(item);

				var files = [theFile];

				if( $("#file" + i) ){
					$("#file" + i)[0].files = new FileListItems(files)
					$("#file" + i).attr("data-selected", selected)
				}

				if( selected == "false" ){
					$(item).children("a.vitrin").removeClass("btn-success").addClass("btn-secondary");
				}

			}

		}
	}

	// Main function for ReadFile and appending thumbnails.
	function appendThumbnail( i, f ){

		reader = new FileReader();
		reader.onerror = errorHandler;
		// reader.onabort = abortHandler;
		// reader.onprogress = progressHandler;
		reader.onload = loadHandler( i, f );
		reader.readAsDataURL(f);

	}

    /**
     * Main Event Handler to deal with
     * the whole drop & upload process.
     */
    function handleFileSelect(e){

    	e.stopPropagation();
    	e.preventDefault();

    	dropZone.classList.remove('dragover');

    	files = e.dataTransfer.files;

    	for (var i=0, f; f=files[i]; i++) {
    		if ( !f.type.match('image.*') ) continue;
            appendThumbnail( i, f );
    	}

    }

	/**
	 * functions associating "drag" event.
	 */
	function handleDragEnter(e){
		e.stopPropagation();
		e.preventDefault();
		this.classList.add('dragover');
	}

	function handleDragLeave(e){
		e.stopPropagation();
		e.preventDefault();
		this.classList.remove('dragover');
	}

	function handleDragOver(e){
		e.stopPropagation();
		e.preventDefault();
		e.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
	}

	/**
	 * Setup the event listeners.
	 */
	dropZone.addEventListener('dragenter', handleDragEnter, false)
	dropZone.addEventListener('dragleave', handleDragLeave, false)
	dropZone.addEventListener('dragover', handleDragOver, false);
	dropZone.addEventListener('drop', handleFileSelect, false);

	$(function(){

		$(document).on("click", ".selected-photos .file.appended a.rmv", function(e){

			if( e.target.dataset.photoid ){
				$.post("/car-photoremove", { photoid:e.target.dataset.photoid }, function(){});
			}

			$(this).parent().css("background-image", "url(/Public/web/img/noimage.jpg)").removeClass("appended");
			$(this).next("input[type='hidden']").remove();

		});

		$(document).on("click", ".selected-photos .file.appended a.vitrin", function(){

			$(".selected-photos .file.appended").each(function( i, item ){
				$(this).children("input.file_input").attr("data-selected", "false");
				$(this).children("a.vitrin").removeClass("btn-success").addClass("btn-secondary");
			});

			$(this).removeClass("btn-secondary").addClass("btn-success");
			$(this).next("input.file_input").attr("data-selected", "true");

		});

		$("#fakeFiles").on("input", function(){
			for (var i=0, f; f=$(this)[0].files[i]; i++) {
	    		if ( !f.type.match('image.*') ) continue;
	            appendThumbnail( i, f );
	    	}
		});

		$("#photo-select").on("submit", function(e){

	        e.preventDefault();

	        let error = 0;

	        if( $(".selected-photos input").length == 0 ){
	            error = 1;
	            $("#photos-area .alert").prop("hidden", false);
	        } else {
	            error = 0;
	            $("#photos-area .alert").prop("hidden", true);
	        }

	        if( !error ){
	            var parent = $(this).parents(".accordion-item");
	            $(parent).next(".accordion-item").find(".accordion-button").click();
	        }

	    });

		// Video files check, duration and file size.

		function filesize( bytes ) {
			const sizes = ['B', 'KB', 'MB', 'GB', 'TB']
			if (bytes === 0) return 0
			const i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)), 10)
			if (i === 0) return {'size':bytes, 'type':sizes[i] }
			return {'size':(bytes / (1024 ** i)).toFixed(1), 'type':sizes[i] }
		}

		function formatDuration(seconds) {
		    var seconds = Math.round(seconds);
		    var minutes = Math.floor(seconds / 60);
		    minutes = (minutes >= 10) ? minutes : "0" + minutes;
		    seconds = Math.floor(seconds % 60);
		    seconds = (seconds >= 10) ? seconds : "0" + seconds;
		    return "<strong>" + minutes + "</strong> Dk. <strong>" + seconds + "</strong> Sn.";
		}

		$("input[type=file].video").on("change", function(e){

			$(this).next(".file-warn").remove();

			if( this.files.length ){

				var elm = this;
				var file = this.files[0];
				let fs   = filesize( file.size );

				if( fs.size > 21 && fs.type == 'MB' ){
					$(this).after('<div class="alert alert-warning file-warn"><i class="fad fa-file-exclamation me-1"></i> DİKKAT : Dosya büyüklüğü en fazla 20MB olabilir!</div>').val('');
					setTimeout(()=>{
						$(".file-warn").fadeOut('fast', ()=>{ $(".file-warn").remove(); });
					}, 3000);
					return;
				}

				else {
					var video = document.createElement('video')
					video.preload = 'metadata';
					video.onloadedmetadata = function() {
						window.URL.revokeObjectURL(video.src);

						let duration = formatDuration( video.duration );

						$(elm).after('<div class="alert alert-success file-warn"><i class="fad fa-check-square me-2"></i> Bu video yüklemek için uygun görünüyor. Video Uzunluğu : '+ duration +' - Boyutu : <strong>'+ fs.size +' '+fs.type+'</strong> </div>');
						video = null;
					}
					video.src = URL.createObjectURL(file);
				}

			}

		})

	});

})();
