<?php

namespace Drupal\eth_purchase_button\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'eth_purchase_button_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "eth_purchase_button_formatter",
 *   module = "eth_purchase_button",
 *   label = @Translation("Turns a field into an Eth Purchase Button"),
 *   field_types = {
 *     "eth_price"
 *   }
 * )
 */
class EthPurchaseFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#markup' => $item->value,
      ];
    }

    return $elements;
  }

}
