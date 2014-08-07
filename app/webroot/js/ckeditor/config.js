/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
        //
        config.uiColor = '#D96777';
        config.language = "pt-br";
        config.filebrowserImageBrowseUrl = 'http://localhost/site.casando.com/public/assets/js/ckeditor/kcfinder/browse.php?type=images';
        config.filebrowserImageUploadUrl = 'http://localhost/site.casando.com/public/assets/js/ckeditor/kcfinder/upload.php?type=images'; 
     // config.filebrowserBrowseUrl = window.location.origin+'/site.casando.com/public/assets/js/ckeditor/kcfinder/browse.php?type=files';
     // config.filebrowserFlashBrowseUrl = window.location.origin+'/site.casando.com/public/assets/js/ckeditor/kcfinder/browse.php?type=flash';
     // config.filebrowserUploadUrl = window.location.origin+'/site.casando.com/public/assets/js/ckeditor/kcfinder/upload.php?type=files';
     // config.filebrowserFlashUploadUrl = window.location.origin+'/site.casando.com/public/assets/js/ckeditor/kcfinder/upload.php?type=flash';

CKEDITOR.config.toolbar = [
 ["Source"],
 ["Bold","Italic","Underline","StrikeThrough","-","Undo","Redo","-","Cut", "Copy","Find","Replace","-","NumberedList","BulletedList"],
 ["Image","-","TextColor","BGColor"],
 ];
 
};
