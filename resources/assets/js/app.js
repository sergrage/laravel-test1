require('./bootstrap');

import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor.js';


ClassicEditor.create( document.querySelector( '#editor' ), {
	toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
    removePlugins: [ 'Link' ],
}).catch( error => {
      console.error( error );
});

