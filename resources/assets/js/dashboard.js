import Card from 'card';

var card = new Card({
    // a selector or DOM element for the form where users will
    // be entering their information
    form: '#update-card', // *required*
    // a selector or DOM element for the container
    // where you want the card to appear
    container: '.card-wrapper', // *required*

    formSelectors: {
        numberInput: 'input#number', // optional — default input[name="number"]
        expiryInput: 'input#expiry', // optional — default input[name="expiry"]
        cvcInput: 'input#cvc', // optional — default input[name="cvc"]
        nameInput: 'input#name' // optional - defaults input[name="name"]
    },

    width: 320, // optional — default 350px
    formatting: true, // optional - default true

    // Strings for translation - optional
    messages: {
        validDate: 'valid\ndate', // optional - default 'valid\nthru'
        monthYear: 'mm/yy', // optional - default 'month/year'
    },

    // Default placeholders for rendered fields - optional
    placeholders: {
        number: '•••• •••• •••• ••••',
        name: 'Full Name',
        expiry: '••/••',
        cvc: '•••'
    },

    // if true, will log helpful messages for setting up Card
    debug: false // optional - default false
});

let cardUpdateForm = document.querySelector('#update-card');
let submitButton = cardUpdateForm.querySelector('.submit');
let tokenField = cardUpdateForm.querySelector('#token');
let numberField = cardUpdateForm.querySelector('#number');
let cvcField = cardUpdateForm.querySelector('#cvc');
let expiryField = cardUpdateForm.querySelector('#expiry');

cardUpdateForm.addEventListener('submit', (event) => {
    event.preventDefault()
    submitButton.disabled = true
    let expiryArray = expiryField.value.replace(/\s/g,'').split('/');

    let month = expiryArray[0];
    let year = expiryArray[1];

    let cardData = {
        number: numberField.value,
        cvc: cvcField.value,
        exp_month: month,
        exp_year: year,
    }

    Stripe.card.createToken(cardData, (status, response) => {
        if (response.error) { // Problem!

        } else { // Token was created!

            // Get the token ID:
            var token = response.id;
            console.log(token)
            tokenField.value = token

            cardUpdateForm.submit()
        }

    });
});

const onetimeDonateForm = document.querySelector('#onetime-donation')
const onetimeSubmitButton = onetimeDonateForm.querySelector('#onetime-donate-button')

onetimeDonateForm.addEventListener('submit', (event) => {
    onetimeSubmitButton.disabled = true
    onetimeSubmitButton.value = 'Submitting...'
})

$('#edit-name-btn').on('click', function (evt) {
    $('#current-name').addClass('hidden')
    $('#update-name').removeClass('hidden')
})

$('#cancel-name-btn').on('click', function (evt) {
    evt.preventDefault()
    $('#update-name').addClass('hidden')
    $('#current-name').removeClass('hidden')
})

$('#submit-name-btn').on('click', function (evt) {
    evt.preventDefault()
    var button = $('#submit-name-btn');
    button.append('<i class="fa fa-spinner fa-spin fa-fw"></i>')
    button.prop('disabled', true);
    $('#update-name-form').submit();
})

$('#address-state').val($('#address-state').data('val'))
$('#edit-address-btn').on('click', function (evt) {
    $('#current-address').addClass('hidden')
    $('#update-address').removeClass('hidden')
})

$('#add-address-btn').on('click', function (evt) {
    $('#current-address').addClass('hidden')
    $('#update-address').removeClass('hidden')
})

$('#cancel-address-btn').on('click', function (evt) {
    evt.preventDefault()
    $('#update-address').addClass('hidden')
    $('#current-address').removeClass('hidden')
})

$('#submit-address-btn').on('click', function (evt) {
    evt.preventDefault()
    var button = $('#submit-address-btn');
    button.append('<i class="fa fa-spinner fa-spin fa-fw"></i>')
    button.prop('disabled', true);
    $('#update-address-form').submit();
})
