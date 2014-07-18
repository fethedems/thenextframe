<?php

add_filter( 'rwmb_meta_boxes', 'portada_register_meta_boxes' );

function portada_register_meta_boxes( $meta_boxes )
{

$prefix = 'portada_';

$meta_boxes[] = array(
'title' => __( 'Imagen en portada', 'rwmb' ),

'fields' => array(
// HEADING
array(
'type' => 'heading',
'name' => __( 'Seleccionar la <em>categoría</em> portada y subir una imagen. Tamaño <em>necesario</em> de 1000x250px.', 'rwmb' ),
'id' => 'fake_id', // Not used but needed for plugin
),
// IMAGE UPLOAD
array(
'name' => __( 'Image Upload', 'rwmb' ),
'id' => "{$prefix}image",
'type' => 'image',
),
)
);

return $meta_boxes;
}
