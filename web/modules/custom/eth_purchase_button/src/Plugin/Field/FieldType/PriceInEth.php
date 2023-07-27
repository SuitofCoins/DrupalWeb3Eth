<?php

namespace Drupal\eth_purchase_button\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'eth_price' field type.
 *
 * @FieldType(
 *   id = "eth_price",
 *   label = @Translation("Purchase price in USD/ETH"),
 *   module = "eth_purchase_button",
 *   description = @Translation("Creates a Eth button purchase using price in USD."),
 *   default_widget = "eth_purchase_widget",
 *   default_formatter = "eth_purchase_button_formatter"
 * )
 */
class PriceInEth extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'numeric',
          'precision' => 5,
          'scale' => 2,
          'unsigned' => TRUE,
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('float')
      ->setLabel(t('Dollar Amount in USD'));

    return $properties;
  }

}
