(function() {
    tinymce.PluginManager.add('jbplugins_tc_button', function( editor, url ) {
        editor.addButton( 'jbplugins_tc_button', {
            text: 'Add Reciepe',
            icon: false,
            onclick: function() {
                
		alert("hello");
		/*editor.insertContent('Hello World!');*/
		
            }
        });
    });
})();
