IPC.InPageTesting = function() {
    this.hasNavigationElement = function() {
        return $('nav').length > 0;
    };
};