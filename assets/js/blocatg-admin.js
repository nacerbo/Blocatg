jQuery( document ).ready( function($){
    // Starts by hiding the "Video Options" meta box
    $( "#gallery_settings" ).addClass( "hidden" );
    $( "#quote_settings" ).addClass( "hidden" );
    $( "#audio_settings" ).addClass( "hidden" );

    if( $( "input#post-format-gallery" ).is(':checked') ){
        $( "#gallery_settings" ).removeClass( "hidden" );
        $( "#quote_settings" ).addClass( "hidden" );
        $( "#audio_settings" ).addClass( "hidden" );
    }
    // If "Video" post format is selected, show the "Video Options" meta box
    $( "input#post-format-gallery" ).change( function() {
        if( $(this).is(':checked') ){
            $( "#gallery_settings" ).removeClass( "hidden" );
            $( "#quote_settings" ).addClass( "hidden" );
            $( "#audio_settings" ).addClass( "hidden" );
        }
      });
    // audio_settings
    if( $( "input#post-format-audio" ).is(':checked') ){
        $( "#audio_settings" ).removeClass( "hidden" );
        $( "#gallery_settings" ).addClass( "hidden" );
        $( "#quote_settings" ).addClass( "hidden" );
    }
    // If "Video" post format is selected, show the "Video Options" meta box
    $( "input#post-format-audio" ).change( function() {
        if( $(this).is(':checked') ){
            $( "#audio_settings" ).removeClass( "hidden" );
            $( "#quote_settings" ).addClass( "hidden" );
            $( "#gallery_settings" ).addClass( "hidden" );
        }
      });
    //quote_settings
    if( $( "input#post-format-quote" ).is(':checked') ){
        $( "#quote_settings" ).removeClass( "hidden" );
        $( "#gallery_settings" ).addClass( "hidden" );
        $( "#audio_settings" ).addClass( "hidden" );
    }
    // If "Video" post format is selected, show the "Video Options" meta box
    $( "input#post-format-quote" ).change( function() {
        if( $(this).is(':checked') ){
            $( "#quote_settings" ).removeClass( "hidden" );
            $( "#gallery_settings" ).addClass( "hidden" );
            $( "#audio_settings" ).addClass( "hidden" );
        }
      });
});

