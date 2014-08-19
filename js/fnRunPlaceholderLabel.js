(function() {

    var placeholderNotEmpty = function(valText, placeholderText) {
        return (valText != '' && valText != placeholderText);
    };

    window.fnRunPlaceholderLabel = function(elem) {

        var $this = $(elem);
        var $label = $this.siblings('label.formlabel');
        var placeholderText = $this.attr('placeholder');

        if (placeholderNotEmpty($this.val(), placeholderText)) {
            $label.fadeTo(200, 1);
        }

        var fnKeyup = function() {
            if (placeholderNotEmpty($this.val(), placeholderText)) {
                $label.fadeTo(200, 1);
            } else {
                $label.fadeTo(200, 0);
            }
        };

        $this.on('keyup', fnKeyup);
    };


})();
