// WordPress dependencies.
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

// Internal dependencies.
import edit from './edit.js';

registerBlockType( 'gbg/myguten', {
	title: __( 'My Gutenberg Example', 'wpse-366881' ),
	category: 'widgets',
	edit,
} );
