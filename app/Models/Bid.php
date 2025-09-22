<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bid extends Model
{
    /**
     * AUCTION ATTRIBUTES
     * $this->attributes['id'] - int - contains the bid's primary key (id)
     * $this->attributes['created_at'] - timestamp - contains the time when the bid was created
     * $this->attributes['updated_at'] - timestamp - contains the time when the bid was last updated
     * $this->attributes['price_offering'] - int - contains the price offering of the bid made by the user
     * $this->attributes['user_id'] - int - contains the referenced user id
     */
}