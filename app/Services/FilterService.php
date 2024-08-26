<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Cargo;
use Illuminate\Database\Eloquent\Builder;

class FilterService {

    public function filter(Builder $query, array $filters) {

        if($query->getModel() instanceof Cargo) {

            if ($search = $filters['search'] ?? null) {
                $query->where('name', 'LIKE', "%{$search}%");
            }

            if ($weightFrom = $filters['weight_from'] ?? null) {
                $query->where('weight', '>=', $weightFrom);
            }
            if ($weightTo = $filters['weight_to'] ?? null) {
                $query->where('weight', '<=', $weightTo);
            }

            if ($distanceFrom = $filters['distance_from'] ?? null) {
                $query->where('distance', '>=', $distanceFrom);
            }
            if ($distanceTo = $filters['distance_to'] ?? null) {
                $query->where('distance', '<=', $distanceTo);
            }

            if ($priceFrom = $filters['price_from'] ?? null) {
                $query->where('price', '>=', $priceFrom);
            }
            if ($priceTo = $filters['price_to'] ?? null) {
                $query->where('price', '<=', $priceTo);
            }

            if ($pay_method = $filters['payment_type'] ?? null) {
                $query->where('pay_method', $pay_method);
            }

            if ($pay_method = $filters['body_type'] ?? null) {
                $query->where('body', $pay_method);
            }

            if (!empty($filters['urgent'])) {
                $query->where('urgent', true);
            }

        }

        return $query->paginate(4);

    }

}