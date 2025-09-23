<?php

/**
 * @author Jeronimo Acosta
 */

return [
    'index' => [
        'no_auctions' => 'No hay subastas disponibles en este momento.',
        'auction_number' => 'Subasta #:id',
        'price_limit' => 'Límite de Precio: $:amount',
        'artwork' => 'Obra de Arte: :title',
    ],
    'show' => [
        'auction_title' => 'Subasta #:id',
        'original_price' => 'Precio Original: $:amount',
        'price_limit' => 'Límite de Precio: $:amount',
        'artwork_details' => 'Detalles de la Obra',
        'title' => 'Título: :title',
        'author' => 'Autor: :author',
        'category' => 'Categoría: :category',
        'winning_bidder' => 'Postor Ganador',
        'user_id' => 'ID de Usuario: :id',
        'auction_id' => 'ID de Subasta: :id',
        'created' => 'Creado: :date',
        'status' => [
            'won' => 'Ganada',
            'active' => 'Activa',
        ],
        'bids' => [
            'title' => 'Ofertas Disponibles',
            'no_bids' => 'No hay ofertas disponibles para esta subasta aún.',
            'bid_by' => 'por :name',
        ],
        'bid_action' => [
            'place_bid' => 'Hacer Tu Oferta',
            'login_to_bid' => 'para hacer una oferta en esta subasta.',
            'login_link' => 'Iniciar Sesión',
        ],
    ],
];
