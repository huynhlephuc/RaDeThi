/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	// config.uiColor = '#AADC6E';
	config.pasteFromWordPromptCleanup = true;
	config.pasteFromWordRemoveFontStyles = false;
	config.pasteFromWordRemoveStyles = false;
	config.htmlEncodeOutput = false;
	config.ProcessHTMLEntities = false;
	config.entities = false;
	config.entities_latin = false;
	config.ForceSimpleAmpersand = true;
};
