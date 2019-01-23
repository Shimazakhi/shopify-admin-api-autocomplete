<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Data formatter
 *
 * Class ShopifyCustomerSimpleTransformer
 *
 * @package App\Transformers
 */
class ShopifyCustomerSimpleTransformer extends TransformerAbstract
{
    /**
     * Transform
     *
     * @param $customer
     * @return array
     */
    public function transform($customer)
    {
        return [
            'id' => (int) $customer->id,
            'full_name' => (string) $customer->first_name . ' ' . $customer->last_name,
            'phone' => (string) $this->getCustomerPhone($customer),
        ];
    }

    /**
     * Get Customer Phone
     *
     * @param $customer
     * @return null
     */
    private function getCustomerPhone($customer)
    {
        if(isset($customer->default_address)) {
            return $customer->default_address->phone;
        }
        return null;
    }
}
