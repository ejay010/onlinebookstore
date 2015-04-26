$(function() {
	var pop = $('.popbtn');
	var row = $('.row:not(:first):not(:last)');
    var editButton = $('#edit');
    var quantityInput = $('#quant');
    var removeButton = $('#remove');


	pop.popover({
		trigger: 'manual',
		html: true,
		container: 'body',
		placement: 'bottom',
		animation: false,
		content: function() {
			return $('#popover').html();
		}
	});


	pop.on('click', function(e) {
		pop.popover('toggle');
		pop.not(this).popover('hide');
	});

	$(window).on('resize', function() {
		pop.popover('hide');
	});

	row.on('touchend', function(e) {
		$(this).find('.popbtn').popover('toggle');
		row.not(this).find('.popbtn').popover('hide');
		return false;
	});

    editButton.click(function(e) {
        quantityInput.css("display", "inline").fadeIn().delay(5000);
    });

    var StripeBilling = {
        init: function() {
            this.form = $('#billing-form');
            this.submitButton = this.form.find('input[type=submit]');
            this.submitButtonValue = this.submitButton.val();

            var stripeKey = $('meta[name="publishableKey"]').attr('content');
            Stripe.setPublishableKey(stripeKey);

            this.bindEvents();
        },

        bindEvents: function(){
            this.form.on('submit', $.proxy(this.sendToken, this));
        },

        sendToken: function(){
            this.submitButton.val('One Moment Please').prop('disabled', true);

            Stripe.createToken(this.form, $.proxy(this.stripeResponseHandler, this));
            event.preventDefault();
        },

        stripeResponseHandler: function(status, response) {

            if(response.error){
                this.form.find('.payment-errors').show().text(response.error.message);
                return this.submitButton.val(this.submitButtonValue).prop('disabled', false).val(this.submitButtonValue);
            }

            $('<input>',{
                type: 'hidden',
                name: 'stripeToken',
                value: response.id
            }).appendTo(this.form);

            this.form[0].submit();
        }
    };

    StripeBilling.init();

});