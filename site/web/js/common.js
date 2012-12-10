$.fn.raty.defaults.hintList = ['Hated It', 'Didn\'t Like It', 'Liked It', 'Really Liked It', 'Loved It'];

function do_binding(scope)
{
  
}

/**
 * Submit form remotely via ajax call.
 * @param form (the form element object)
 * @param updateID (the element ID to update)
 */
function submit_remotely(form, updateID)
{
  $('#'+updateID).find('.ajax-loader').show();

  jQuery.ajax({
    type: 'POST',
    url: form.action,
    processData: false,
    data: $(form).serialize(),
    cache: false,
    success: function(html){
      $('#'+updateID).replaceWith(html);
      do_binding('#'+updateID);
    }
  });
  
  return false;
}
