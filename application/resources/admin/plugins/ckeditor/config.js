/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

//CKEDITOR.editorConfig = function( config ) {
//	config.extraPlugins = 'imageuploader';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
//};


CKEDITOR.editorConfig = function( config ) {
 	config.extraPlugins = 'imageuploader';
  config.enterMode = CKEDITOR.ENTER_BR; // <p></p> to <br />
  config.entities = false;
  config.basicEntities = false;
};
