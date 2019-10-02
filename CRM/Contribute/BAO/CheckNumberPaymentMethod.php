<?php

class CRM_Contribute_BAO_CheckNumberPaymentMethod {

  public static function getPaymentInstrument() {
    return CRM_Contribute_BAO_Contribution::buildOptions('payment_instrument_id');
  }

}
