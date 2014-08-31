(function() {

    var CloudAnimator = function($CloudContainer) {

        var that = this;

        var cloudNo = Math.floor(Math.random() * 5 + 1);
        var zIndex = Math.floor(Math.random() * 10 + 1);

        this.$element = $(document.createElement('div')).addClass('cloud').addClass('cloud' + cloudNo);
        this.$element.append('<img src="../img/clouds/cloud' + cloudNo + '.trim.50.8a.png" />');
        // this.$element.css({ top: this.getRandomTop(), zIndex: zIndex });
        this.$element.css({ top: this.getRandomTop() });

        $CloudContainer.append(this.$element);

        // this.startLeft = (Math.random() * 40) - 120; // -120 -> -80

        this.startPosition = 101;
        this.endPosition = -100;

        var moveWidth = Math.abs(this.startPosition - this.endPosition);

        var percent = Math.random();
        var firstLeft = this.startPosition - (moveWidth * percent);
        var firstDuration = this.getDuration() * (1 - percent);

        this.animate(firstLeft, this.endPosition, firstDuration, 0);
    };


    CloudAnimator.prototype.getRandomTop = function() {
        return (Math.random() * 120 - 10) + "%";
    };

    CloudAnimator.prototype.getDuration = function() {
        var fullSpeedWidth = 960;
        var pageWidth = window.innerWidth;
        var durationWidthModifier = pageWidth / fullSpeedWidth;
        var duration = (Math.random() * 15000) + (25000 * durationWidthModifier);

        return duration;
    };

    CloudAnimator.prototype.getDelay = function() {
        return Math.random() * 5000;
    };

    CloudAnimator.prototype.startAnimate = function() {
        var that = this;
        this.$element.css('top', this.getRandomTop());
        this.animate(this.startPosition, this.endPosition, this.getDuration(), this.getDelay());
    };

    CloudAnimator.prototype.animate = function(startPosition, endPosition, duration, delay) {
        var that = this;
        this.$element.velocity({ left: [endPosition + '%', startPosition + '%'] }, { duration: duration, easing: 'linear', delay: delay, complete: function() {
            that.startAnimate();
        } });
    };

    window.CloudAnimator = CloudAnimator;

})();