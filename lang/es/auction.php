<?php

/**
 * @author Jeronimo Acosta
 */

return [
    'index' => [
        'no_auctions' => 'No hay subastas disponibles en este momento.',
        'auction_number' => 'Subasta #:id',
        'artwork' => 'Obra de Arte: :title',
    ],
    'show' => [
        'auction_title' => 'Subasta #:id',
        'original_price' => 'Precio Original: $:amount',
        'artwork_details' => 'Detalles de la Obra',
        'title' => 'Título: :title',
        'author' => 'Autor: :author',
        'category' => 'Categoría: :category',
        'winning_bidder' => 'Postor Ganador',
        'user_name' => 'Nombre de Usuario: :name',
        'user_id' => 'ID de Usuario: :id',
        'auction_id' => 'ID de Subasta: :id',
        'created' => 'Creado: :date',
        'timeline' => [
            'title' => 'Línea de Tiempo de la Subasta',
            'starts' => 'Comienza',
            'ends' => 'Termina',
        ],
        'status' => [
            'won' => 'Ganada',
            'active' => 'Subasta en Vivo',
            'not_started' => 'La subasta aún no ha comenzado',
            'ended' => 'La subasta ha terminado',
        ],
        'countdown' => [
            'starts_in' => 'Comienza en',
            'ends_in' => 'Termina en',
            'ended' => 'Terminó',
            'remaining' => 'restantes',
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
            'not_started' => 'Las ofertas se abrirán cuando comience la subasta.',
            'ended' => 'Esta subasta ha terminado. Las ofertas están cerradas.',
        ],
    ],
];
