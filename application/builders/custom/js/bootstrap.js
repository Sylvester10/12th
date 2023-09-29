
$(document).ready(function() {



$('select[multiple="multiple"]').each(function(index,element){// selecting all select elements with multiple and looping throught them

    //getting variables
    
    var placeHolder = $(this).attr("placeholder");
    $(this).multiselect({
         includeSelectAllOption: true,
        enableFiltering: true,
         filterPlaceholder: 'Search for something...',
        enableCaseInsensitiveFiltering: true,
        includeFilterClearBtn: true,
        enableFullValueFiltering: true,
        includeResetOption: true,
        nonSelectedText: placeHolder,
         nSelectedText: ' - Too many options selected!',
         allSelectedText: 'No option left ...',
         numberDisplayed: 10         
    });
});





//this is use to clear select multiple boxes
$('button[id="clear-all"]').on('click',function(){
    $('select[multiple="multiple"]').each(function(index,element){

        $(this).multiselect('deselectAll', false);
    });

});





$('input[is="phone-number"]').each(function(index,element){



    window.intlTelInput(element, {
      allowDropdown: true, // whether or not to allow the dropdown
      autoHideDialCode: true,// if there is just a dial code in the input: remove it on blur, and re-add it on focus
      autoPlaceholder: "aggressive",// add a placeholder in the input with an example number for the selected country
      dropdownContainer: document.body,
      //excludeCountries: ["us"],//In the dropdown, display all countries except the ones you specify here.
      formatOnDisplay: true,
      initialCountry: "auto",
      geoIpLookup: function(success, failure) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "ng";
          success(countryCode);
        });},
      hiddenInput: "full_number",
      localizedCountries: { 'de': 'Deutschland' },
      nationalMode: true,
      //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do','ng'], //In the dropdown, display only the countries you specify 
      placeholderNumberType: "MOBILE",
      preferredCountries: ['us', 'uk','ng'],
      separateDialCode: false,
      utilsScript: "builders/tell-input/js/utils.js",
    });

});






























});