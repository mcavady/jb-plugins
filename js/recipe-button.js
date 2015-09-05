/***********************/
/*@author James Mcavady*/
/***********************/

/*For the tinyMCE button too load the recipe input*/

(function() {
    tinymce.PluginManager.add('jbplugins_tc_button', function( editor, url ) {
        editor.addButton( 'jbplugins_tc_button', {
            text: 'Add Reciepe',
            icon: false,
            onclick: function() {
                
		/*alert("hello");*/

		/* Popup for recipe input -- needs a whole lot of work */
		document.getElementById('messagepop').style.display ="inline";
		
		/*editor.insertContent('Hello World!');*/
		
            }
        });
    });

})();
