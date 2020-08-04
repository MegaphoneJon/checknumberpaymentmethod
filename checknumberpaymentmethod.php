<?php

require_once 'checknumberpaymentmethod.civix.php';
use CRM_Checknumberpaymentmethod_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function checknumberpaymentmethod_civicrm_config(&$config) {
  _checknumberpaymentmethod_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function checknumberpaymentmethod_civicrm_xmlMenu(&$files) {
  _checknumberpaymentmethod_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function checknumberpaymentmethod_civicrm_install() {
  _checknumberpaymentmethod_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function checknumberpaymentmethod_civicrm_postInstall() {
  _checknumberpaymentmethod_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function checknumberpaymentmethod_civicrm_uninstall() {
  _checknumberpaymentmethod_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function checknumberpaymentmethod_civicrm_enable() {
  _checknumberpaymentmethod_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function checknumberpaymentmethod_civicrm_disable() {
  _checknumberpaymentmethod_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function checknumberpaymentmethod_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _checknumberpaymentmethod_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function checknumberpaymentmethod_civicrm_managed(&$entities) {
  _checknumberpaymentmethod_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function checknumberpaymentmethod_civicrm_caseTypes(&$caseTypes) {
  _checknumberpaymentmethod_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function checknumberpaymentmethod_civicrm_angularModules(&$angularModules) {
  _checknumberpaymentmethod_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function checknumberpaymentmethod_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _checknumberpaymentmethod_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function checknumberpaymentmethod_civicrm_entityTypes(&$entityTypes) {
  _checknumberpaymentmethod_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_alterSettingsMetaData().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsMetaData
 *
 */
function checknumberpaymentmethod_civicrm_alterSettingsMetaData(&$settingsMetadata, $domainID, $profile) {
  $settingsMetadata['check_payment_instrument_ids'] = [
    'group_name' => CRM_Core_BAO_Setting::CONTRIBUTE_PREFERENCES_NAME,
    'group' => 'contribute',
    'name' => 'check_payment_instrument_ids',
    'type' => 'Array',
    'html_type' => 'Select',
    'quick_form_type' => 'Select',
    'html_attributes' => array(
      'multiple' => 1,
      'class' => 'crm-select2',
    ),
    'pseudoconstant' => array(
      'callback' => 'CRM_Contribute_BAO_CheckNumberPaymentMethod::getPaymentInstrument',
    ),
    'default' => NULL,
    'add' => '5.5',
    'title' => ts('Check-Payment Instruments'),
    'is_domain' => '1',
    'is_contact' => 0,
    'description' => NULL,
    'help_text' => NULL,
  ];
}

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 */
function checknumberpaymentmethod_civicrm_preProcess($formName, &$form) {
  if ('CRM_Admin_Form_Preferences_Contribute' == $formName) {
    $vars = $form->getVar('_settings');
    $vars['check_payment_instrument_ids'] = CRM_Core_BAO_Setting::CONTRIBUTE_PREFERENCES_NAME;
    $form->setVar('_settings', $vars);
    $form->setVar('settingsMetadata', '');
  }
}

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 */
function checknumberpaymentmethod_civicrm_buildForm($formName, &$form) {
  if (in_array($formName, array(
    "CRM_Contribute_Form_Contribution",
    "CRM_Member_Form_Membership",
    "CRM_Event_Form_Participant",
    "CRM_Contribute_Form_AdditionalPayment",
    "CRM_Member_Form_MembershipRenewal",
  ))) {
    if ($form->getVar('_action') & CRM_Core_Action::DELETE) {
      return;
    }
    if ($formName == 'CRM_Contribute_Form_AdditionalPayment'
      && $form->getVar('_view') == 'transaction'
      && ($form->getVar('_action') & CRM_Core_Action::BROWSE)
    ) {
      return;
    }
    // Don't load payment fields if this is "Record Credit Card Contributions".
    if ($form->_mode == 'live') {
      return;
    }
    if (!empty($form->_defaultValues['payment_instrument_id'])) {
      _checknumberpaymentmethod_add_payment_fields(
        $form,
        $form->_defaultValues['payment_instrument_id']
      );
    }
  }

  if (('CRM_Contribute_Form_AdditionalPayment' == $formName
    && $form->getVar('_view') == 'transaction'
    && ($form->getVar('_action') & CRM_Core_Action::BROWSE))
    || 'CRM_Contribute_Form_Contribution' == $formName
    || 'CRM_Contribute_Form_ContributionView' == $formName
  ) {
    $payments = $form->get_template_vars('payments');
    if ($payments) {
      _checknumberpaymentmethod_alterpayments($payments);
    }
    $form->assign('payments', $payments);
  }

  if ('CRM_Admin_Form_Preferences_Contribute' == $formName) {
    $form->addElement(
      'select',
      'check_payment_instrument_ids',
      ts('Check-Payment Instruments'),
      CRM_Contribute_BAO_CheckNumberPaymentMethod::getPaymentInstrument(),
      [
        'multiple' => 1,
        'class' => 'crm-select2',
      ]
    );
    $form->assign('fields', $form->getVar('settingsMetadata'));
  }

  if ($formName == 'CRM_Financial_Form_Payment' && !empty($form->paymentInstrumentID)) {
    _checknumberpaymentmethod_add_payment_fields($form, $form->paymentInstrumentID);
  }

  if ('CRM_Financial_Form_PaymentEdit' == $formName) {
    $paymentInstrumentsFromSettings = civicrm_api3('Setting', 'getvalue', [
      'name' => 'check_payment_instrument_ids',
    ]);

    if ($form->_flagSubmitted && isset($form->_submitValues['check_number'])
      && in_array($form->_submitValues['payment_instrument_id'], $paymentInstrumentsFromSettings)
    ) {
      $values = $form->getVar('_values');
      $numberOfCalls = 1;
      if ($form->_submitValues['payment_instrument_id'] != $values['payment_instrument_id']) {
        $numberOfCalls = 2;
      }

      CRM_Core_Smarty::singleton()->assign('payment_instrument_check_number_numberOfCalls', $numberOfCalls);
      CRM_Core_Smarty::singleton()->assign('payment_instrument_check_number', $form->_submitValues['check_number']);
    }

    $paymentInstrumentsFromSettings[] = (string) CRM_Core_PseudoConstant::getKey(
      'CRM_Contribute_BAO_Contribution',
      'payment_instrument_id',
      'Check'
    );
    $form->assign('paymentInstrumentsFromSettings', json_encode($paymentInstrumentsFromSettings));
  }
}

/**
 * Add payment fields to form.
 *
 * @param object $form
 * @param int $paymentInstrumentID
 */
function _checknumberpaymentmethod_add_payment_fields(&$form, $paymentInstrumentID) {
  $paymentInstrumentsFromSettings = civicrm_api3('Setting', 'getvalue', [
    'name' => 'check_payment_instrument_ids',
  ]);
  if (in_array($paymentInstrumentID, $paymentInstrumentsFromSettings)) {
    $form->assign('paymentFields', array('check_number'));
    $form->add('text', 'check_number', ts('Check Number'));
    $form->assign('paymentTypeLabel', ts('Check Information'));
  }
}

/**
 * Implements hook_civicrm_pre().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_pre
 */
function checknumberpaymentmethod_civicrm_pre($op, $objectName, $id, &$params) {
  if ($objectName == 'Contribution' && in_array($op, ['create', 'edit'])) {
    if (isset($params['check_number']) && !CRM_Utils_System::isNull($params['check_number'])
      || !empty($_POST['check_number'])
      || !empty($params['payment_instrument_check_number'])
    ) {
      $paymentInstrumentId = !empty($params['payment_instrument_id']) ? $params['payment_instrument_id'] : $params['prevContribution']->payment_instrument_id;
      $paymentInstrumentsFromSettings = civicrm_api3('Setting', 'getvalue', [
        'name' => 'check_payment_instrument_ids',
      ]);
      if (!in_array($paymentInstrumentId, $paymentInstrumentsFromSettings)) {
        return;
      }
      if (!CRM_Utils_System::isNull($params['check_number'])) {
        $params['check_number'] = $params['check_number'];
      }
      elseif (!empty($params['payment_instrument_check_number'])) {
        $params['check_number'] = $params['payment_instrument_check_number'];
      }
      else {
        $params['check_number'] = $_POST['check_number'];
      }
    }
  }
}

function _checknumberpaymentmethod_alterpayments(&$payments) {
  $paymentInstrumentsFromSettings = civicrm_api3('Setting', 'getvalue', [
    'name' => 'check_payment_instrument_ids',
  ]);
  foreach ($payments as &$payment) {
    try {
      $checkNumber = civicrm_api3('FinancialTrxn', 'getvalue', [
        'return' => "check_number",
        'id' => $payment['id'],
        'payment_instrument_id' => ['IN' => $paymentInstrumentsFromSettings],
      ]);
      if (!empty($checkNumber)) {
        $payment['payment_instrument'] .= " (#{$checkNumber})";
      }
    }
    catch (Exception $e) {
      // Ignore
    }
  }
}

/**
 * Implements hook_civicrm_pre().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_pre
 */
function checknumberpaymentmethod_civicrm_apiWrappers(&$wrappers, $apiRequest) {
  if (in_array($apiRequest['entity'], ['Contribution', 'FinancialTrxn']) && $apiRequest['action'] == 'create') {
    $wrappers[] = new CRM_Contribute_CheckAPIWrapper();
  }
}
