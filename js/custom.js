function toggle($toBeHidden, $toBeShown) {
  $toBeHidden.hide().prop('disabled', true);
  $toBeShown.show().prop('disabled', false).focus();
}

function showOptions(inputName) {
  var $select = $(`select[name=${inputName}]`);
  toggle($(`input[name=${inputName}]`), $select);
  $select.val(null);
}


function showCustomInput(inputName) {
  toggle($(`select[name=${inputName}]`), $(`input[name=${inputName}]`));
}