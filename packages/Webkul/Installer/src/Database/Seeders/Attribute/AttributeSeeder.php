<?php

namespace Webkul\Installer\Database\Seeders\Attribute;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        DB::table('attributes')->delete();

        $now = Carbon::now();

        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');

        DB::table('attributes')->insert([
            [
                'id'              => '1',
                'code'            => 'title',
                'name'            => trans('installer::app.seeders.attributes.title', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'leads',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '1',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '2',
                'code'            => 'description',
                'name'            => trans('installer::app.seeders.attributes.description', [], $defaultLocale),
                'type'            => 'textarea',
                'entity_type'     => 'leads',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '2',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '3',
                'code'            => 'lead_value',
                'name'            => trans('installer::app.seeders.attributes.lead-value', [], $defaultLocale),
                'type'            => 'price',
                'entity_type'     => 'leads',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '3',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '4',
                'code'            => 'lead_source_id',
                'name'            => trans('installer::app.seeders.attributes.source', [], $defaultLocale),
                'type'            => 'select',
                'entity_type'     => 'leads',
                'lookup_type'     => 'lead_sources',
                'validation'      => NULL,
                'sort_order'      => '4',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '5',
                'code'            => 'lead_type_id',
                'name'            => trans('installer::app.seeders.attributes.type', [], $defaultLocale),
                'type'            => 'select',
                'entity_type'     => 'leads',
                'lookup_type'     => 'lead_types',
                'validation'      => NULL,
                'sort_order'      => '5',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '6',
                'code'            => 'user_id',
                'name'            => trans('installer::app.seeders.attributes.sales-owner', [], $defaultLocale),
                'type'            => 'select',
                'entity_type'     => 'leads',
                'lookup_type'     => 'users',
                'validation'      => NULL,
                'sort_order'      => '7',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '7',
                'code'            => 'expected_close_date',
                'name'            => trans('installer::app.seeders.attributes.expected-close-date', [], $defaultLocale),
                'type'            => 'date',
                'entity_type'     => 'leads',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '8',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '9',
                'code'            => 'name',
                'name'            => trans('installer::app.seeders.attributes.name', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'persons',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '1',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '10',
                'code'            => 'emails',
                'name'            => trans('installer::app.seeders.attributes.emails', [], $defaultLocale),
                'type'            => 'email',
                'entity_type'     => 'persons',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '2',
                'is_required'     => '1',
                'is_unique'       => '1',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '11',
                'code'            => 'contact_numbers',
                'name'            => trans('installer::app.seeders.attributes.contact-numbers', [], $defaultLocale),
                'type'            => 'phone',
                'entity_type'     => 'persons',
                'lookup_type'     => NULL,
                'validation'      => 'numeric',
                'sort_order'      => '3',
                'is_required'     => '0',
                'is_unique'       => '1',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '12',
                'code'            => 'organization_id',
                'name'            => trans('installer::app.seeders.attributes.organization', [], $defaultLocale),
                'type'            => 'lookup',
                'entity_type'     => 'persons',
                'lookup_type'     => 'organizations',
                'validation'      => NULL,
                'sort_order'      => '4',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '13',
                'code'            => 'name',
                'name'            => trans('installer::app.seeders.attributes.name', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'organizations',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '1',
                'is_required'     => '1',
                'is_unique'       => '1',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '14',
                'code'            => 'address',
                'name'            => trans('installer::app.seeders.attributes.address', [], $defaultLocale),
                'type'            => 'address',
                'entity_type'     => 'organizations',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '2',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '15',
                'code'            => 'name',
                'name'            => trans('installer::app.seeders.attributes.name', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'products',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '1',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '16',
                'code'            => 'description',
                'name'            => trans('installer::app.seeders.attributes.description', [], $defaultLocale),
                'type'            => 'textarea',
                'entity_type'     => 'products',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '2',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '17',
                'code'            => 'sku',
                'name'            => trans('installer::app.seeders.attributes.sku', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'products',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '3',
                'is_required'     => '1',
                'is_unique'       => '1',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '18',
                'code'            => 'quantity',
                'name'            => trans('installer::app.seeders.attributes.quantity', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'products',
                'lookup_type'     => NULL,
                'validation'      => 'numeric',
                'sort_order'      => '4',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '19',
                'code'            => 'price',
                'name'            => trans('installer::app.seeders.attributes.price', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'products',
                'lookup_type'     => NULL,
                'validation'      => 'decimal',
                'sort_order'      => '5',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '20',
                'code'            => 'user_id',
                'name'            => trans('installer::app.seeders.attributes.sales-owner', [], $defaultLocale),
                'type'            => 'select',
                'entity_type'     => 'quotes',
                'lookup_type'     => 'users',
                'validation'      => NULL,
                'sort_order'      => '1',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '21',
                'code'            => 'subject',
                'name'            => trans('installer::app.seeders.attributes.subject', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '2',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '22',
                'code'            => 'description',
                'name'            => trans('installer::app.seeders.attributes.description', [], $defaultLocale),
                'type'            => 'textarea',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '3',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '23',
                'code'            => 'billing_address',
                'name'            => trans('installer::app.seeders.attributes.billing-address', [], $defaultLocale),
                'type'            => 'address',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '4',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '24',
                'code'            => 'shipping_address',
                'name'            => trans('installer::app.seeders.attributes.shipping-address', [], $defaultLocale),
                'type'            => 'address',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '5',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '25',
                'code'            => 'discount_percent',
                'name'            => trans('installer::app.seeders.attributes.discount-percent', [], $defaultLocale),
                'type'            => 'text',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => 'decimal',
                'sort_order'      => '6',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '26',
                'code'            => 'discount_amount',
                'name'            => trans('installer::app.seeders.attributes.discount-amount', [], $defaultLocale),
                'type'            => 'price',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => 'decimal',
                'sort_order'      => '7',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '27',
                'code'            => 'tax_amount',
                'name'            => trans('installer::app.seeders.attributes.tax-amount', [], $defaultLocale),
                'type'            => 'price',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => 'decimal',
                'sort_order'      => '8',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '28',
                'code'            => 'adjustment_amount',
                'name'            => trans('installer::app.seeders.attributes.adjustment-amount', [], $defaultLocale),
                'type'            => 'price',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => 'decimal',
                'sort_order'      => '9',
                'is_required'     => '0',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '29',
                'code'            => 'sub_total',
                'name'            => trans('installer::app.seeders.attributes.sub-total', [], $defaultLocale),
                'type'            => 'price',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => 'decimal',
                'sort_order'      => '10',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '30',
                'code'            => 'grand_total',
                'name'            => trans('installer::app.seeders.attributes.grand-total', [], $defaultLocale),
                'type'            => 'price',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => 'decimal',
                'sort_order'      => '11',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '31',
                'code'            => 'expired_at',
                'name'            => trans('installer::app.seeders.attributes.expired-at', [], $defaultLocale),
                'type'            => 'date',
                'entity_type'     => 'quotes',
                'lookup_type'     => NULL,
                'validation'      => NULL,
                'sort_order'      => '12',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ], [
                'id'              => '32',
                'code'            => 'person_id',
                'name'            => trans('installer::app.seeders.attributes.person', [], $defaultLocale),
                'type'            => 'lookup',
                'entity_type'     => 'quotes',
                'lookup_type'     => 'persons',
                'validation'      => NULL,
                'sort_order'      => '13',
                'is_required'     => '1',
                'is_unique'       => '0',
                'quick_add'       => '1',
                'is_user_defined' => '0',
                'created_at'      => $now,
                'updated_at'      => $now,
            ]
        ]);
    }
}
