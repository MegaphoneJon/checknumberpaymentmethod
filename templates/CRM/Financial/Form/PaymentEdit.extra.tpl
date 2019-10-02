{literal}
<script type="text/javascript">
  CRM.$(function ($) {
    var $paymentInstrumentsFromSettings = {/literal}{$paymentInstrumentsFromSettings}{literal};
    $('#payment_instrument_id').change(showHidePI);
    showHidePI();
    function showHidePI() {
      var $paymentInstrumentID = $('#payment_instrument_id').val();
      if ($.inArray($paymentInstrumentID, $paymentInstrumentsFromSettings) > -1) {
        $('div.check_number-section').show();
      }
      else {
        $('div.check_number-section').hide();
      }
    }
  });
</script>
{/literal}
