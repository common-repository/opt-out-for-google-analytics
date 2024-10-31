jQuery(function ($) {

    var $wp_privacy_page = $('#gaoo-wp-privacy-page');
    var $privacy_page = $('#gaoo-privacy-page');
    var $wp_admin_mail = $('#gaoo-status-mails-sync');

    $wp_admin_mail.click(function (e) {
        var $this = $(this),
            $mail_input = $('#gaoo-status-mails'),
            admin_mail = $this.data('mail'),
            is_checked = $this.is(':checked');

        if (is_checked) {
            $this.data('old', $mail_input.val());
        } else {
            admin_mail = $this.data('old');
        }

        $mail_input
            .val(admin_mail)
            .prop('readonly', is_checked);
    });

    if (typeof $wp_privacy_page !== 'undefined' && $wp_privacy_page.length) {
        var old_page_id = 0;

        if ($wp_privacy_page.is(':checked')) {
            $privacy_page.prop('disabled', 'disabled');
        }

        $wp_privacy_page.click(function () {
            if ($(this).is(':checked')) {
                var page_id = $wp_privacy_page.data('id');

                $privacy_page.prop('disabled', 'disabled');

                if (page_id) {
                    old_page_id = $('option:selected', $privacy_page).val();
                    $($privacy_page).val(page_id);
                }
            } else {
                $privacy_page.prop('disabled', false);

                if (old_page_id) {
                    $('option[value="' + old_page_id + '"]', $privacy_page).attr("selected", "selected");
                }
            }
        });
    }

    $privacy_page.change(function () {
        var val = $('option:selected', this).val(),
            $edit_link = $('#gaoo .gaoo-edit-link');

        if (val == 0 && !$edit_link.hasClass('hide'))
            $edit_link.addClass('hide');
        else
            $edit_link.removeClass('hide').attr('href', gaoo.edit_link.replace('%d', val));
    });

    $('input[name="gaoo[ga_plugin]"]').change(function () {
        var $this = $(this),
            $textarea_tracking_code = $('#ga-plugin-tracking-code').parent();

        if ($this.val() != 'manual') {
            $textarea_tracking_code.slideUp();
        } else {
            $textarea_tracking_code.slideDown();
        }
    });

    $('#ga-plugin-tracking-code').on('focusout keyup paste', function () {
        var val = $(this).val(),
            $input_ua = $('#gaoo-ua-code');

        if (val.length && !$input_ua.val().trim().length) {
            var matches = val.toString().match(/(G|UA|YT|MO)-[a-zA-Z0-9-]+/gmi);

            if (matches != null) {
                $input_ua.val(matches.shift());
            }
        }
    });

    $('.gaoo-empty-popup').click(function () {
        var $this = $(this);

        $this.prev('input[type="text"').val('');
        $this.hide();
    });

    $('.gaoo-clipboard').click(function () {
        var $this = $(this);

        if (copyTextToClipboard($this.data('copy'))) {
            $this.text(gaoo.text.copied);
        } else {
            $this.text(gaoo.text.notcopied);
        }

        // Delayed text unset
        setTimeout(function () {
            $this.text('');
        }, 600);
    });

    $('code').click(function () {
        $('.gaoo-clipboard').trigger('click');
    });
});

function copyTextToClipboard(text) {
    if (!navigator.clipboard) {
        var textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Fallback: Copying text command was ' + msg);
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
            return false;
        }

        document.body.removeChild(textArea);
        return true;
    }

    var $successfull = true;

    navigator.clipboard.writeText(text).then(function () {
        $successfull = true;
    }, function (err) {
        $successfull = false;
    });

    return $successfull;
}