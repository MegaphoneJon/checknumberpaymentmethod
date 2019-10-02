<?php

class CRM_Contribute_CheckAPIWrapper implements API_Wrapper {

  /**
   * the wrapper contains a method that allows you to alter the parameters of the api request (including the action and the entity)
   */
  public function fromApiInput($apiRequest) {
    if ($apiRequest['entity'] == 'Contribution' && !empty($apiRequest['params']['check_number'])) {
      $apiRequest['params']['payment_instrument_check_number'] = $apiRequest['params']['check_number'];
    }
    if ($apiRequest['entity'] == 'FinancialTrxn' && empty($apiRequest['params']['check_number'])) {
      $numberOfCalls = CRM_Core_Smarty::singleton()->get_template_vars('payment_instrument_check_number_numberOfCalls');
      if ($numberOfCalls) {
        if ($numberOfCalls == 1) {
          $apiRequest['params']['check_number'] = CRM_Core_Smarty::singleton()->get_template_vars('payment_instrument_check_number');
        }
        $numberOfCalls--;
        CRM_Core_Smarty::singleton()->assign('payment_instrument_check_number_numberOfCalls', $numberOfCalls);
      }
    }
    return $apiRequest;
  }

  /**
   * alter the result before returning it to the caller.
   */
  public function toApiOutput($apiRequest, $result) {
    return $result;
  }

}
