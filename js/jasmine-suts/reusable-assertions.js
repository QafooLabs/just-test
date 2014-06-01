IPC.ReusableAssertions = function() {
    var __tracking = null;

    this.setTracking = function(tracking) {
        __tracking = tracking;
    }

    this.loadUser = function(user) {
        __tracking.sendInfo(123456);
    };
};