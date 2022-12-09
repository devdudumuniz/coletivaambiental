$( window ).bind( "create.xrayhtml", function( e ) {
	var prism = !!~e.target.getAttribute( "class" ).indexOf( "prism" ),
	zeroclip = !!~e.target.getAttribute( "class" ).indexOf( "zeroclip" ),
	flash = !!( navigator.mimeTypes[ "application/x-shockwave-flash" ] || "ActiveXObject" in window );

	if( prism && "Prism" in window ) {
		$( ".prism" ).find( "code" ).addClass( "language-markup" );
		Prism.highlightAll();
	}

	if( zeroclip && "ZeroClipboard" in window && flash ) {

		ZeroClipboard.config({ 
			moviePath: 'http://seattle-bootstrap3-website-template.little-neko.com/v1/js-plugin/x-rayHtml/libs/ZeroClipboard.swf', 
			forceHandCursor: true 
		});
		
		console.log(ZeroClipboard.config());
		var client = new Array();
		$( e.target ).each(function(i) {
			var copy = $( "<a/>", {
				"class" : "btnXr btnXr-copy",
				"href" : "#",
				"text" : "Copy"

			}),

			code = $( this ).find( "code" ).text();

			client[i] = new ZeroClipboard( copy );

			client[i].on('mousedown', function () {
				client[i].setText(code);
			});
			client[i].on('complete', function () {
				alert('copy successful');
			});

			$( this ).find( ".source-panel" ).prepend( copy );
		});
	}

});